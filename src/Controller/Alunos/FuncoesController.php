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

        $this->set(compact('funcoes'));
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
    public function add()
    {
        $funco = $this->Funcoes->newEmptyEntity();
        if ($this->request->is('post')) {
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

        $usuarioLogado = $this->request->getAttribute('identity');
        $habilidadesUsuario = $this->Funcoes->Habilidades->find()->select(['habilidades.id'])
            ->matching('Usuarios', function ($q) use ($usuarioLogado) {
                return $q->where(['Usuarios.id' => $usuarioLogado->id]);
            })
            ->toArray();

        $habilidadesUsuario = array_map(function($h) {
            return $h->habilidades['id'];
        }, $habilidadesUsuario);

        $funcao = $this->Funcoes->find()->where(['funcoes.id' => $id])->contain(['Habilidades', 'Usuarios', 'Projetos'])->first();


        $this->set(compact('funcao','habilidadesUsuario'));
    }
}
