<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Habilidades Controller
 *
 * @property \App\Model\Table\HabilidadesTable $Habilidades
 */
class HabilidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Habilidades->find();
        $habilidades = $this->paginate($query);

        $this->set(compact('habilidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Habilidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $habilidade = $this->Habilidades->get($id, contain: ['Funcoes', 'Usuarios']);
        $this->set(compact('habilidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $habilidade = $this->Habilidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $habilidade = $this->Habilidades->patchEntity($habilidade, $this->request->getData());
            if ($this->Habilidades->save($habilidade)) {
                $this->Flash->success(__('The habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habilidade could not be saved. Please, try again.'));
        }
        $funcoes = $this->Habilidades->Funcoes->find('list', limit: 200)->all();
        $usuarios = $this->Habilidades->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('habilidade', 'funcoes', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Habilidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $habilidade = $this->Habilidades->get($id, contain: ['Funcoes', 'Usuarios']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $habilidade = $this->Habilidades->patchEntity($habilidade, $this->request->getData());
            if ($this->Habilidades->save($habilidade)) {
                $this->Flash->success(__('The habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habilidade could not be saved. Please, try again.'));
        }
        $funcoes = $this->Habilidades->Funcoes->find('list', limit: 200)->all();
        $usuarios = $this->Habilidades->Usuarios->find('list', limit: 200)->all();
        $this->set(compact('habilidade', 'funcoes', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Habilidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $habilidade = $this->Habilidades->get($id);
        if ($this->Habilidades->delete($habilidade)) {
            $this->Flash->success(__('The habilidade has been deleted.'));
        } else {
            $this->Flash->error(__('The habilidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
