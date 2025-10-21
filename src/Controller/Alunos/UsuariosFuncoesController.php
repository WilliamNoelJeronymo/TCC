<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

use App\Controller\Alunos\AppController;

/**
 * UsuariosFuncoes Controller
 *
 * @property \App\Model\Table\UsuariosFuncoesTable $UsuariosFuncoes
 */
class UsuariosFuncoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->UsuariosFuncoes->find()
            ->contain(['Usuarios', 'Funcoes']);
        $usuariosFuncoes = $this->paginate($query);

        $this->set(compact('usuariosFuncoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Funco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuariosFunco = $this->UsuariosFuncoes->get($id, contain: ['Usuarios', 'Funcoes']);
        $this->set(compact('usuariosFunco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosFunco = $this->UsuariosFuncoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuariosFunco = $this->UsuariosFuncoes->patchEntity($usuariosFunco, $this->request->getData());
            if ($this->UsuariosFuncoes->save($usuariosFunco)) {
                $this->Flash->success(__('The usuarios funco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios funco could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosFuncoes->Usuarios->find('list', limit: 200)->all();
        $funcoes = $this->UsuariosFuncoes->Funcoes->find('list', limit: 200)->all();
        $this->set(compact('usuariosFunco', 'usuarios', 'funcoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Funco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuariosFunco = $this->UsuariosFuncoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuariosFunco = $this->UsuariosFuncoes->patchEntity($usuariosFunco, $this->request->getData());
            if ($this->UsuariosFuncoes->save($usuariosFunco)) {
                $this->Flash->success(__('The usuarios funco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios funco could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosFuncoes->Usuarios->find('list', limit: 200)->all();
        $funcoes = $this->UsuariosFuncoes->Funcoes->find('list', limit: 200)->all();
        $this->set(compact('usuariosFunco', 'usuarios', 'funcoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Funco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuariosFunco = $this->UsuariosFuncoes->get($id);
        if ($this->UsuariosFuncoes->delete($usuariosFunco)) {
            $this->Flash->success(__('The usuarios funco has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios funco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
