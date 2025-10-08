<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Projetos Controller
 *
 * @property \App\Model\Table\ProjetosTable $Projetos
 */
class ProjetosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $usuarioLogado = $this->request->getAttribute('identity');

        $categoriaId = $this->request->getQuery('categoria_id');
        $funcaoId = $this->request->getQuery('vaga_funcao_id');
        $nome = $this->request->getQuery('nome');

        $query = $this->Projetos->find()
            ->contain(['Funcoes.Usuarios', 'Categorias'])
            ->where(['Projetos.status' => 2]);

        // Filtro por categoria
        if (!empty($categoriaId)) {
            $query->matching('Categorias', function ($q) use ($categoriaId) {
                return $q->where(['Categorias.id' => $categoriaId]);
            });
        }

        // Filtro por nome do projeto
        if (!empty($nome)) {
            $query->where(function ($exp, $q) use ($nome) {
                return $exp->like('Projetos.nome', '%' . $nome . '%');
            });
        }

        // Filtro por vaga disponível (exclui líder e orientador)
        if (!empty($funcaoId)) {
            $query->matching('Funcoes', function ($q) use ($funcaoId) {
                return $q->where([
                    'Funcoes.id' => $funcaoId,
                    'LOWER(Funcoes.nome) NOT IN' => ['líder', 'lider', 'orientador']
                ]);
            });
        }

        $query = $query->distinct(['Projetos.id']); // evita duplicados

        $projetos = $this->paginate($query);

        // processa orientador e vagas (como você já faz)
        foreach ($projetos as $projeto) {
            $projeto->orientador = null;
            foreach ($projeto->funcoes as $funcao) {
                if (strcasecmp($funcao->nome, 'Orientador') === 0) {
                    $projeto->orientador = $funcao->usuarios[0]->nome ?? null;
                    break;
                }
            }
            $projeto->todasFuncoes = $projeto->funcoes;
            // remove funções Líder e Orientador
            $projeto->funcoes = array_values(array_filter($projeto->funcoes, function ($funcao) {
                return !in_array(strtolower($funcao->nome), ['líder', 'lider', 'orientador']);
            }));

            // calcula vagas
            $projeto->total_vagas_disponiveis = 0;
            foreach ($projeto->funcoes as $funcao) {
                $funcao->vagas_disponiveis = max(0, $funcao->quantidade - count($funcao->usuarios));
                $projeto->total_vagas_disponiveis += $funcao->vagas_disponiveis;
            }
        }

        $categorias = $this->Projetos->Categorias->find('list')->orderBy(['nome' => 'ASC'])->all();
        $funcoes = $this->Projetos->Funcoes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])
            ->where(function ($exp, $q) {
                return $exp->notIn('LOWER(Funcoes.nome)', ['líder', 'lider', 'orientador']);
            })
            ->orderBy(['nome' => 'ASC'])
            ->all();

        $this->set(compact('projetos', 'categorias', 'funcoes', 'usuarioLogado'));
    }

    /**
     * View method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projeto = $this->Projetos->get($id, contain: ['Documentos', 'Imagens', 'Funcoes' => ['Usuarios']]);
        $usuarioLogado = $this->request->getAttribute('identity');

        foreach ($projeto->funcoes as $funcao) {
            foreach ($funcao->usuarios as $usuario) {
                // Se o usuário ainda não foi adicionado, inicializa com um array de funções
                if (!isset($membros[$usuario->id])) {
                    $membros[$usuario->id] = [
                        'id' => $usuario->id,
                        'nome' => $usuario->nome,
                        'funcoes' => []
                    ];
                }
                // Adiciona a função ao array de funções do usuário
                $membros[$usuario->id]['funcoes'][] = $funcao->nome;
            }
        }
        if (isset($membros[$usuarioLogado->id])) {
            $ehMembro = true;
        } else {
            $ehMembro = false;
        }
        $funcoes = $this->Projetos->Funcoes->find()
            ->select([
                'Funcoes.id',
                'Funcoes.nome',
                'Funcoes.quantidade',
                'total_usuarios' => $this->Projetos->Funcoes->find()
                    ->func()
                    ->count('DISTINCT Usuarios.id') // Conta apenas usuários únicos
            ])
            ->leftJoinWith('Usuarios') // Junta corretamente os usuários à função
            ->where(['Funcoes.projetos_id' => $id]) // Filtra funções do projeto específico
            ->groupBy(['Funcoes.id', 'Funcoes.nome']) // Agrupa corretamente
            ->toArray();

        $this->set(compact('projeto', 'membros', 'funcoes', 'ehMembro', 'usuarioLogado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projeto = $this->Projetos->newEmptyEntity();
        if ($this->request->is('post')) {
            $projeto = $this->Projetos->patchEntity($projeto, $this->request->getData());
            $projeto->status = 2;

            $banner = $this->request->getData('imagem');
            $documentos = $this->request->getData('documentos');

            // --- Banner ---
            if ($banner && $banner->getError() === UPLOAD_ERR_OK) {
                $banner_name = $banner->getClientFilename();
                $banner_extension = pathinfo($banner_name, PATHINFO_EXTENSION);

                // Gera nome único pro banner (pra evitar sobrescrita)
                $banner_name = md5($banner_name . time()) . '.' . $banner_extension;
                $projeto->banner = $banner_name;
            }

            if ($this->Projetos->save($projeto)) {
                // Salvar o banner
                if ($banner && $banner->getError() === UPLOAD_ERR_OK) {
                    $uploadsPath = UPLOAD_PROJETOS . '/' . $projeto->id . '/imagens';
                    if (!is_dir($uploadsPath)) {
                        mkdir($uploadsPath, 0755, true);
                    }
                    $banner_target_path = $uploadsPath . '/' . $banner_name;
                    $banner->moveTo($banner_target_path);
                }

                // --- Documentos ---
                if (!empty($documentos)) {
                    foreach ($documentos as $documento) {
                        if ($documento && $documento->getError() === UPLOAD_ERR_OK) {
                            $documento_name = $documento->getClientFilename();

                            // Mantém o nome original
                            $documentoEntity = $this->Projetos->Documentos->newEntity([
                                'nome' => $documento_name,
                                'projeto_id' => $projeto->id,
                            ]);

                            if ($this->Projetos->Documentos->save($documentoEntity)) {
                                $uploadsPath = UPLOAD_PROJETOS . '/' . $projeto->id . '/documentos';
                                if (!is_dir($uploadsPath)) {
                                    mkdir($uploadsPath, 0755, true);
                                }
                                $doc_target_path = $uploadsPath . '/' . $documento_name;
                                $documento->moveTo($doc_target_path);
                            }
                        }
                    }
                }

                $this->Flash->success(__('Projeto criado com sucesso'));
                return $this->redirect(['controller' => 'Funcoes', 'action' => 'primeiroCadastro', $projeto->id]);
            }

            $this->Flash->error(__('Ocorreu um erro ao criar o projeto. Por favor, tente novamente.'));
        }

        $categorias = $this->Projetos->Categorias->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->all();

        $this->set(compact('projeto', 'categorias'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projeto = $this->Projetos->get($id, contain: ['Categorias', 'Documentos']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $file = $data['imagem'] ?? null;
            $documentos = $data['documentos'] ?? [];

            // Preserva o banner se nenhum novo for enviado
            if (!$file || $file->getError() !== UPLOAD_ERR_OK) {
                unset($data['imagem']);
            }

            $projeto = $this->Projetos->patchEntity($projeto, $data);

            // Se houver novo upload de banner
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $file_name = $file->getClientFilename();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                $file_name = md5($file_name . time()) . '.' . $file_extension;
                $projeto->banner = $file_name;
            }

            if ($this->Projetos->save($projeto)) {
                // Salvar o banner novo
                if ($file && $file->getError() === UPLOAD_ERR_OK) {
                    $uploadsPath = UPLOAD_PROJETOS . '/' . $projeto->id . '/imagens';
                    if (!is_dir($uploadsPath)) {
                        mkdir($uploadsPath, 0755, true);
                    }
                    $file_target_path = $uploadsPath . '/' . $file_name;
                    $file->moveTo($file_target_path);
                }

                // Salvar novos documentos (se enviados)
                if (!empty($documentos)) {
                    foreach ($documentos as $documento) {
                        if ($documento && $documento->getError() === UPLOAD_ERR_OK) {
                            $documento_name = $documento->getClientFilename();

                            // Mantém o nome original
                            $documentoEntity = $this->Projetos->Documentos->newEntity([
                                'nome' => $documento_name,
                                'projeto_id' => $projeto->id,
                            ]);

                            if ($this->Projetos->Documentos->save($documentoEntity)) {
                                $uploadsPath = UPLOAD_PROJETOS . '/' . $projeto->id . '/documentos';
                                if (!is_dir($uploadsPath)) {
                                    mkdir($uploadsPath, 0755, true);
                                }
                                $doc_target_path = $uploadsPath . '/' . $documento_name;
                                $documento->moveTo($doc_target_path);
                            }
                        }
                    }
                }

                $this->Flash->success(__('Projeto atualizado com sucesso.'));
                return $this->redirect(['action' => 'view', $projeto->id]);
            }

            $this->Flash->error(__('Erro ao atualizar o projeto.'));
        }

        $categorias = $this->Projetos->Categorias->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ])->orderBy(['nome' => 'ASC'])->all();

        $this->set(compact('projeto', 'categorias'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Projeto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projeto = $this->Projetos->get($id);
        if ($this->Projetos->delete($projeto)) {
            $this->Flash->success(__('The projeto has been deleted.'));
        } else {
            $this->Flash->error(__('The projeto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function validar($id)
    {
        $projeto = $this->Projetos->get($id);
        $projeto->status = 1;
        if ($this->Projetos->save($projeto)) {
            $this->Flash->success(__('Projeto Validado e concluido com sucesso!'));
        } else {
            $this->Flash->error(__('Houve um erro ao validadr e concluir o projeto. Por favor tente novamente.'));
        }
        return $this->redirect(['action' => 'view', $id]);

    }

}
