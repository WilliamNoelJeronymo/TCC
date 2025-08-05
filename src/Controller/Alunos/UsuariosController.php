<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function membros($projeto_id)
    {
        // Buscando todos os usuários com suas funções associadas ao projeto
        $usuarios = $this->Usuarios->find()
            ->contain(['Grupos', 'Funcoes' => function ($q) use ($projeto_id) {
                return $q->where(['Funcoes.projetos_id' => $projeto_id]); // Filtra as funções pelo projeto_id
            }])
            ->all(); // Retorna todos os usuários

        // Buscando o projeto específico pelo id
        $projeto = $this->Usuarios->Funcoes->Projetos->find()
            ->where(['Projetos.id' => $projeto_id])
            ->first();

        // Passando as variáveis para a view
        $this->set(compact('usuarios', 'projeto'));
    }

    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => [
                'Funcoes' => [
                    'Projetos'
                ],
                'Habilidades'
            ]
        ]);
        $funcoesPorProjeto = collection($usuario->funcoes)
            ->groupBy(function ($funcao) {

                return $funcao->projeto->id ?? 0;
            })
            ->map(function ($funcoesParaUmProjeto, $projetoId) {

                $projeto = $funcoesParaUmProjeto[0]->projeto;

                return [
                    'projeto' => $projeto,
                    'funcoes' => $funcoesParaUmProjeto
                ];
            })
            ->toList();

        $this->set(compact('usuario', 'funcoesPorProjeto'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', limit: 200)->all();
        $this->set(compact('usuario', 'grupos'));
    }

    public function login()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Usuarios',
                'action' => 'view',
            ]);
            $this->Flash->success(__('Logado com sucesso!'));

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuário ou senha incorretos.'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Usuarios', 'action' => 'login']);
        }
    }
    public function habilidades()
    {
        $user = $this->request->getAttribute('identity');
        $habilidades = $this->Usuarios->Habilidades
            ->find()
            ->matching('Usuarios', function ($q) use ($user) {
                return $q->where(['Usuarios.id' => $user->id]);
            });
        $habilidades = $this->paginate($habilidades);
        $this->set(compact('habilidades'));
    }

    public function habilidadesAdd()
    {
        $user = $this->request->getAttribute('identity');
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => ['Habilidades'], // importante para carregar habilidades existentes
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData(), [
                'associated' => ['Habilidades']
            ]);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Usuário atualizado com sucesso.');
                return $this->redirect(['action' => 'view', $usuario->id]);
            }
            $this->Flash->error('Erro ao salvar usuário.');
        }

        $habilidades = $this->Usuarios->Habilidades->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome',
        ])
            ->order(['nome' => 'ASC'])
            ->toArray();

        $this->set(compact('usuario', 'habilidades'));
    }

    public function habilidadesDelete($habilidadeId)
    {
        $user = $this->request->getAttribute('identity');

        // Busca o usuário com as habilidades relacionadas
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => ['Habilidades'],
        ]);

        // Busca a habilidade a ser desvinculada
        $habilidade = $this->Usuarios->Habilidades->get($habilidadeId);

        // Desvincula (remove da tabela usuarios_habilidades)
        if ($this->Usuarios->Habilidades->unlink($usuario, [$habilidade])) {
            $this->Flash->success('Habilidade desvinculada com sucesso.');
        } else {
            $this->Flash->error('Erro ao desvincular habilidade.');
        }

        return $this->redirect($this->referer());
    }
}
