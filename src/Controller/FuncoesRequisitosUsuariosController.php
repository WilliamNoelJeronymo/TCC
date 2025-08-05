<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FuncoesRequisitosUsuarios Controller
 *
 * @property \App\Model\Table\FuncoesRequisitosUsuariosTable $FuncoesRequisitosUsuarios
 */
class FuncoesRequisitosUsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->FuncoesRequisitosUsuarios->find()
            ->contain(['Funcoes', 'Requisitos', 'Usuarios']);
        $funcoesRequisitosUsuarios = $this->paginate($query);

        $this->set(compact('funcoesRequisitosUsuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcoes Requisitos Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->get($id, contain: ['Funcoes', 'Requisitos', 'Usuarios']);
        $this->set(compact('funcoesRequisitosUsuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->patchEntity($funcoesRequisitosUsuario, $this->request->getData());
            if ($this->FuncoesRequisitosUsuarios->save($funcoesRequisitosUsuario)) {
                $this->Flash->success(__('The funcoes requisitos usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcoes requisitos usuario could not be saved. Please, try again.'));
        }
        $funcoes = $this->FuncoesRequisitosUsuarios->Funcoes->find('list', limit: 200)->all();
        $requisitos = $this->FuncoesRequisitosUsuarios->Requisitos->find('list', limit: 200)->all();
        $usuarios = $this->FuncoesRequisitosUsuarios->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('funcoesRequisitosUsuario', 'funcoes', 'requisitos', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcoes Requisitos Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->patchEntity($funcoesRequisitosUsuario, $this->request->getData());
            if ($this->FuncoesRequisitosUsuarios->save($funcoesRequisitosUsuario)) {
                $this->Flash->success(__('The funcoes requisitos usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcoes requisitos usuario could not be saved. Please, try again.'));
        }
        $funcoes = $this->FuncoesRequisitosUsuarios->Funcoes->find('list', limit: 200)->all();
        $requisitos = $this->FuncoesRequisitosUsuarios->Requisitos->find('list', limit: 200)->all();
        $usuarios = $this->FuncoesRequisitosUsuarios->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('funcoesRequisitosUsuario', 'funcoes', 'requisitos', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcoes Requisitos Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcoesRequisitosUsuario = $this->FuncoesRequisitosUsuarios->get($id);
        if ($this->FuncoesRequisitosUsuarios->delete($funcoesRequisitosUsuario)) {
            $this->Flash->success(__('The funcoes requisitos usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The funcoes requisitos usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
