<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
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
    public function index()
    {
        $query = $this->Funcoes->find()
            ->contain(['Projetos']);
        $funcoes = $this->paginate($query);

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
}
