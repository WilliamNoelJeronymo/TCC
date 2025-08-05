<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FuncoesHabilidades Controller
 *
 * @property \App\Model\Table\FuncoesHabilidadesTable $FuncoesHabilidades
 */
class FuncoesHabilidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->FuncoesHabilidades->find()
            ->contain(['Funcoes', 'Habilidades']);
        $funcoesHabilidades = $this->paginate($query);

        $this->set(compact('funcoesHabilidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcoes Habilidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcoesHabilidade = $this->FuncoesHabilidades->get($id, contain: ['Funcoes', 'Habilidades']);
        $this->set(compact('funcoesHabilidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcoesHabilidade = $this->FuncoesHabilidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $funcoesHabilidade = $this->FuncoesHabilidades->patchEntity($funcoesHabilidade, $this->request->getData());
            if ($this->FuncoesHabilidades->save($funcoesHabilidade)) {
                $this->Flash->success(__('The funcoes habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcoes habilidade could not be saved. Please, try again.'));
        }
        $funcoes = $this->FuncoesHabilidades->Funcoes->find('list', limit: 200)->all();
        $habilidades = $this->FuncoesHabilidades->Habilidades->find('list', limit: 200)->all();
        $this->set(compact('funcoesHabilidade', 'funcoes', 'habilidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcoes Habilidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcoesHabilidade = $this->FuncoesHabilidades->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcoesHabilidade = $this->FuncoesHabilidades->patchEntity($funcoesHabilidade, $this->request->getData());
            if ($this->FuncoesHabilidades->save($funcoesHabilidade)) {
                $this->Flash->success(__('The funcoes habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcoes habilidade could not be saved. Please, try again.'));
        }
        $funcoes = $this->FuncoesHabilidades->Funcoes->find('list', limit: 200)->all();
        $habilidades = $this->FuncoesHabilidades->Habilidades->find('list', limit: 200)->all();
        $this->set(compact('funcoesHabilidade', 'funcoes', 'habilidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcoes Habilidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcoesHabilidade = $this->FuncoesHabilidades->get($id);
        if ($this->FuncoesHabilidades->delete($funcoesHabilidade)) {
            $this->Flash->success(__('The funcoes habilidade has been deleted.'));
        } else {
            $this->Flash->error(__('The funcoes habilidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
