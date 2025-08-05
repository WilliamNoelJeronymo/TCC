<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Notificacoes Controller
 *
 * @property \App\Model\Table\NotificacoesTable $Notificacoes
 */
class NotificacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Notificacoes->find()
            ->contain(['Funcoes']);
        $notificacoes = $this->paginate($query);

        $this->set(compact('notificacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificaco = $this->Notificacoes->get($id, contain: ['Funcoes']);
        $this->set(compact('notificaco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificaco = $this->Notificacoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $notificaco = $this->Notificacoes->patchEntity($notificaco, $this->request->getData());
            if ($this->Notificacoes->save($notificaco)) {
                $this->Flash->success(__('The notificaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificaco could not be saved. Please, try again.'));
        }
        $funcoes = $this->Notificacoes->Funcoes->find('list', limit: 200)->all();
        $this->set(compact('notificaco', 'funcoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificaco = $this->Notificacoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificaco = $this->Notificacoes->patchEntity($notificaco, $this->request->getData());
            if ($this->Notificacoes->save($notificaco)) {
                $this->Flash->success(__('The notificaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificaco could not be saved. Please, try again.'));
        }
        $funcoes = $this->Notificacoes->Funcoes->find('list', limit: 200)->all();
        $this->set(compact('notificaco', 'funcoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificaco = $this->Notificacoes->get($id);
        if ($this->Notificacoes->delete($notificaco)) {
            $this->Flash->success(__('The notificaco has been deleted.'));
        } else {
            $this->Flash->error(__('The notificaco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
