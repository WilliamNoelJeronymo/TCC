<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Documentos Controller
 *
 * @property \App\Model\Table\DocumentosTable $Documentos
 */
class DocumentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Documentos->find()
            ->contain(['Projetos']);
        $documentos = $this->paginate($query);

        $this->set(compact('documentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documento = $this->Documentos->get($id, contain: ['Projetos']);
        $this->set(compact('documento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documento = $this->Documentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->getData());
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The documento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documento could not be saved. Please, try again.'));
        }
        $projetos = $this->Documentos->Projetos->find('list', limit: 200)->all();
        $this->set(compact('documento', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documento = $this->Documentos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documento = $this->Documentos->patchEntity($documento, $this->request->getData());
            if ($this->Documentos->save($documento)) {
                $this->Flash->success(__('The documento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The documento could not be saved. Please, try again.'));
        }
        $projetos = $this->Documentos->Projetos->find('list', limit: 200)->all();
        $this->set(compact('documento', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documento = $this->Documentos->get($id);
        if ($this->Documentos->delete($documento)) {
            $this->Flash->success(__('The documento has been deleted.'));
        } else {
            $this->Flash->error(__('The documento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
