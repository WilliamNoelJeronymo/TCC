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

        $query = $this->Projetos->find()
            ->contain(['Funcoes.Usuarios', 'Categorias'])
            ->where(['Projetos.status' => 2]);

        if (!empty($categoriaId)) {
            $query = $query->matching('Categorias', function ($q) use ($categoriaId) {
                return $q->where(['Categorias.id' => $categoriaId]);
            });
        }

        $projetos = $this->paginate($query);

        foreach ($projetos as $projeto) {
            $projeto->orientador = null;
            foreach ($projeto->funcoes as $funcao) {
                if (strcasecmp($funcao->nome, 'Orientador') === 0) {
                    $projeto->orientador = $funcao->usuarios[0]->nome;
                    break;
                }
            }
            // Remove funções 'Líder' e 'Orientador'
            $projeto->funcoes = array_values(array_filter($projeto->funcoes, function ($funcao) {
                return !in_array(strtolower($funcao->nome), ['líder', 'lider', 'orientador']);
            }));

            // Calcula vagas disponíveis
            $projeto->total_vagas_disponiveis = 0;
            foreach ($projeto->funcoes as $funcao) {
                $funcao->vagas_disponiveis = max(0, $funcao->quantidade - count($funcao->usuarios));
                $projeto->total_vagas_disponiveis += $funcao->vagas_disponiveis;
            }
        }
        $categorias = $this->Projetos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->all();
        $this->set(compact('projetos', 'categorias','usuarioLogado'));
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

        $this->set(compact('projeto', 'membros', 'funcoes', 'ehMembro','usuarioLogado'));
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

            $file = $this->request->getData('imagem');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $file_name = $file->getClientFilename();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = md5($file_name) . time() . '.' . $file_extension;
                $projeto->banner = $file_name;
            }
            if ($this->Projetos->save($projeto)) {
                if ($file && $file->getError() === UPLOAD_ERR_OK) {
                    $uploadsPath = UPLOAD_PROJETOS . '' . $projeto->id . '/imagens';
                    if (!is_dir($uploadsPath)) {
                        mkdir($uploadsPath, 0755, true);
                    }
                    $file_target_path = $uploadsPath . '/' . $file_name;
                    $file->moveTo($file_target_path);
                }
                $this->Flash->success(__('The projeto has been saved.'));

                return $this->redirect(['controller' => 'Funcoes', 'action' => 'primeiroCadastro', $projeto->id]);
            }
            $this->Flash->error(__('Ocorreu um erro ao criar o projeto. Por favor tente novamente mais tarde.'));
        }

        $categorias = $this->Projetos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->all();
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
        $projeto = $this->Projetos->get($id, contain: ['Categorias']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $file = $data['imagem'] ?? null;

            // Preserva o nome do banner antigo se nenhum novo arquivo for enviado
            if (!$file || $file->getError() !== UPLOAD_ERR_OK) {
                unset($data['imagem']); // não sobrescreve o banner
            }

            $projeto = $this->Projetos->patchEntity($projeto, $data);

            // Se houver novo upload de imagem
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $file_name = $file->getClientFilename();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = md5($file_name) . time() . '.' . $file_extension;
                $projeto->banner = $file_name;
            }

            if ($this->Projetos->save($projeto)) {
                // Salva a nova imagem se necessário
                if ($file && $file->getError() === UPLOAD_ERR_OK) {
                    $uploadsPath = UPLOAD_PROJETOS . $projeto->id . '/imagens';
                    if (!is_dir($uploadsPath)) {
                        mkdir($uploadsPath, 0755, true);
                    }
                    $file_target_path = $uploadsPath . '/' . $file_name;
                    $file->moveTo($file_target_path);
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

}
