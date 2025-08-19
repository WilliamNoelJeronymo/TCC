<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Funcoes Controller
 *
 * @property \App\Model\Table\FuncoesTable $Funcoes
 */
class FuncoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($projeto_id)
    {
        $funcoes = $this->Funcoes->find()
            ->select([
                'Funcoes.id',
                'Funcoes.nome',
                'Funcoes.quantidade',
                'total_usuarios' => $this->Funcoes->find()
                    ->func()
                    ->count('DISTINCT Usuarios.id') // Conta apenas usuários únicos
            ])
            ->leftJoinWith('Usuarios') // Junta corretamente os usuários à função
            ->where(['Funcoes.projetos_id' => $projeto_id]) // Filtra funções do projeto específico
            ->groupBy(['Funcoes.id', 'Funcoes.nome']) // Agrupa corretamente
            ->toArray();

        $this->set(compact('funcoes', 'projeto_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Funco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funco = $this->Funcoes->get($id, contain: ['Projetos']);
        $this->set(compact('funco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($projeto_id)
    {
        $funco = $this->Funcoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $funco = $this->Funcoes->patchEntity($funco, $this->request->getData());
            $funco->projetos_id = $projeto_id;
            if ($this->Funcoes->save($funco)) {
                $this->Flash->success(__('Função criada com sucesso!'));

                return $this->redirect(['action' => 'index', $projeto_id]);
            }
            $this->Flash->error(__('Houve um erro ao criar a função. Por favor, tente novamente'));
        }
        $habilidades = $this->Funcoes->Habilidades
            ->find('list', [
                'keyField' => 'id',   // índice do array
                'valueField' => 'nome'    // valor exibido
            ])
            ->limit(200)
            ->all();
        $this->set(compact('funco', 'projeto_id', 'habilidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funco = $this->Funcoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funco = $this->Funcoes->patchEntity($funco, $this->request->getData());
            if ($this->Funcoes->save($funco)) {
                $this->Flash->success(__('The funco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funco could not be saved. Please, try again.'));
        }
        $projetos = $this->Funcoes->Projetos->find('list', limit: 200)->all();
        $this->set(compact('funco', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funco = $this->Funcoes->get($id);
        if ($this->Funcoes->delete($funco)) {
            $this->Flash->success(__('The funco has been deleted.'));
        } else {
            $this->Flash->error(__('The funco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function primeiroCadastro($projeto_id)
    {
        $usuario = $this->request->getAttribute('identity');
        $criadorFuncao = $this->Funcoes->newEntity([
            'nome' => 'Lider',
            'quantidade' => 1,
            'descricao' => 'Lider do projeto, propor a ideia e gerenciar suas vagas',
            'projetos_id' => $projeto_id,
            'usuarios' => [ // Relacionamento com o usuário logado
                ['id' => $usuario->id,
                    '_joinData' => [ // Dados da tabela de junção
                        'editor' => true
                    ]]
            ]
        ], [
            'associated' => ['Usuarios'] // Garantindo que o relacionamento seja salvo
        ]);

        if ($this->Funcoes->save($criadorFuncao)) {
            $this->Flash->success(__('Função criada e associada ao usuário com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao salvar a função.'));
        }

        return $this->redirect(['controller' => 'Projetos', 'action' => 'view', $projeto_id]);
    }

    public function candidatar($id)
    {
        $this->viewBuilder()->disableAutoLayout();
        $Notificacoes = $this->fetchTable('Notificacoes');
        $usuarioLogado = $this->request->getAttribute('identity');

        $habilidadesUsuario = $this->Funcoes->Habilidades->find()->select(['habilidades.id'])
            ->matching('Usuarios', function ($q) use ($usuarioLogado) {
                return $q->where(['Usuarios.id' => $usuarioLogado->id]);
            })
            ->toArray();

        $habilidadesUsuario = array_map(function ($h) {
            return $h->habilidades['id'];
        }, $habilidadesUsuario);

        $funcao = $this->Funcoes->find()->where(['funcoes.id' => $id])->contain(['Habilidades', 'Usuarios', 'Projetos'])->first();

        $projetoId = $funcao->projeto->id;
        $lider = null;
        $jaAplicou = $Notificacoes
            ->exists(['usuario_id_emissor' => $usuarioLogado->id, 'funcoes_id' => $id]);

        if ($projetoId) {
            $lider = $this->Funcoes->find()
                ->contain(['Usuarios'])
                ->where([
                    'Funcoes.projetos_id' => $projetoId,
                    'Funcoes.nome' => 'Lider'
                ])
                ->first()?->usuarios[0];
        }
        $this->set(compact('funcao', 'habilidadesUsuario', 'lider', 'jaAplicou'));
    }

    public function aprovar($funcao_id, $usuario_id, $notificacao_id)
    {
        $usuarioLogado = $this->request->getAttribute('identity');
        $UsuariosFuncoes = $this->fetchTable('UsuariosFuncoes');

        $vinculo = $UsuariosFuncoes->newEntity([
            'usuario_id' => $usuario_id,
            'funcoes_id' => $funcao_id,
            'editor' => 0
        ]);
        if ($UsuariosFuncoes->save($vinculo)) {
            $this->Flash->success('Novo membro aceito com sucesso!');
            $Notificacao = $this->fetchTable('Notificacoes');
            $notificao = $Notificacao->get($notificacao_id);
            $Notificacao->delete($notificao);

        } else {
            $this->Flash->error('Erro ao vincular usuário. Por favor, tente novamente.');
        }

        return $this->redirect(['controller' => 'Notificacoes', 'action' => 'aceitacao',$funcao_id, $usuario_id, $usuarioLogado->id]);
    }
}
