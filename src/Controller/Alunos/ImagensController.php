<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

/**
 * Imagens Controller
 *
 * @property \App\Model\Table\ImagensTable $Imagens
 */
class ImagensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Imagens->find()
            ->contain(['Projetos']);
        $imagens = $this->paginate($query);

        $this->set(compact('imagens'));
    }

    /**
     * View method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagen = $this->Imagens->get($id, contain: ['Projetos']);
        $this->set(compact('imagen'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagen = $this->Imagens->newEmptyEntity();
        if ($this->request->is('post')) {
            $imagen = $this->Imagens->patchEntity($imagen, $this->request->getData());
            if ($this->Imagens->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $projetos = $this->Imagens->Projetos->find('list', limit: 200)->all();
        $this->set(compact('imagen', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagen = $this->Imagens->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagen = $this->Imagens->patchEntity($imagen, $this->request->getData());
            if ($this->Imagens->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $projetos = $this->Imagens->Projetos->find('list', limit: 200)->all();
        $this->set(compact('imagen', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'ajax']);
        $this->viewBuilder()->setClassName('Json');

        $img = $this->Imagens->get($id);
        $success = false;
        $mensagem = '';

        if ($this->Imagens->delete($img)) {
            $success = true;
            $mensagem = 'Imagem excluída com sucesso.';
        } else {
            $mensagem = 'Erro ao excluir a imagem.';
        }

        $this->set(compact('success', 'mensagem'));
        $this->viewBuilder()->setOption('serialize', ['success', 'mensagem']);
    }
}
