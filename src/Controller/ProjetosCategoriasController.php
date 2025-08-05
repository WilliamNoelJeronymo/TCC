<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjetosCategorias Controller
 *
 * @property \App\Model\Table\ProjetosCategoriasTable $ProjetosCategorias
 */
class ProjetosCategoriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjetosCategorias->find()
            ->contain(['Projetos', 'Categorias']);
        $projetosCategorias = $this->paginate($query);

        $this->set(compact('projetosCategorias'));
    }

    /**
     * View method
     *
     * @param string|null $id Projetos Categoria id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projetosCategoria = $this->ProjetosCategorias->get($id, contain: ['Projetos', 'Categorias']);
        $this->set(compact('projetosCategoria'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projetosCategoria = $this->ProjetosCategorias->newEmptyEntity();
        if ($this->request->is('post')) {
            $projetosCategoria = $this->ProjetosCategorias->patchEntity($projetosCategoria, $this->request->getData());
            if ($this->ProjetosCategorias->save($projetosCategoria)) {
                $this->Flash->success(__('The projetos categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projetos categoria could not be saved. Please, try again.'));
        }
        $projetos = $this->ProjetosCategorias->Projetos->find('list', limit: 200)->all();
        $categorias = $this->ProjetosCategorias->Categorias->find('list', limit: 200)->all();
        $this->set(compact('projetosCategoria', 'projetos', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projetos Categoria id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projetosCategoria = $this->ProjetosCategorias->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projetosCategoria = $this->ProjetosCategorias->patchEntity($projetosCategoria, $this->request->getData());
            if ($this->ProjetosCategorias->save($projetosCategoria)) {
                $this->Flash->success(__('The projetos categoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projetos categoria could not be saved. Please, try again.'));
        }
        $projetos = $this->ProjetosCategorias->Projetos->find('list', limit: 200)->all();
        $categorias = $this->ProjetosCategorias->Categorias->find('list', limit: 200)->all();
        $this->set(compact('projetosCategoria', 'projetos', 'categorias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projetos Categoria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projetosCategoria = $this->ProjetosCategorias->get($id);
        if ($this->ProjetosCategorias->delete($projetosCategoria)) {
            $this->Flash->success(__('The projetos categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The projetos categoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
