<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Requisitos Controller
 *
 * @property \App\Model\Table\RequisitosTable $Requisitos
 */
class RequisitosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Requisitos->find();
        $requisitos = $this->paginate($query);

        $this->set(compact('requisitos'));
    }

    /**
     * View method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requisito = $this->Requisitos->get($id, contain: ['FuncoesRequisitosUsuarios']);
        $this->set(compact('requisito'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requisito = $this->Requisitos->newEmptyEntity();
        if ($this->request->is('post')) {
            $requisito = $this->Requisitos->patchEntity($requisito, $this->request->getData());
            if ($this->Requisitos->save($requisito)) {
                $this->Flash->success(__('The requisito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisito could not be saved. Please, try again.'));
        }
        $this->set(compact('requisito'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requisito = $this->Requisitos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requisito = $this->Requisitos->patchEntity($requisito, $this->request->getData());
            if ($this->Requisitos->save($requisito)) {
                $this->Flash->success(__('The requisito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requisito could not be saved. Please, try again.'));
        }
        $this->set(compact('requisito'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requisito id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requisito = $this->Requisitos->get($id);
        if ($this->Requisitos->delete($requisito)) {
            $this->Flash->success(__('The requisito has been deleted.'));
        } else {
            $this->Flash->error(__('The requisito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
