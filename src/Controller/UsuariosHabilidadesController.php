<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UsuariosHabilidades Controller
 *
 * @property \App\Model\Table\UsuariosHabilidadesTable $UsuariosHabilidades
 */
class UsuariosHabilidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->UsuariosHabilidades->find()
            ->contain(['Usuarios', 'Habilidades']);
        $usuariosHabilidades = $this->paginate($query);

        $this->set(compact('usuariosHabilidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Habilidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuariosHabilidade = $this->UsuariosHabilidades->get($id, contain: ['Usuarios', 'Habilidades']);
        $this->set(compact('usuariosHabilidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosHabilidade = $this->UsuariosHabilidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuariosHabilidade = $this->UsuariosHabilidades->patchEntity($usuariosHabilidade, $this->request->getData());
            if ($this->UsuariosHabilidades->save($usuariosHabilidade)) {
                $this->Flash->success(__('The usuarios habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios habilidade could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosHabilidades->Usuarios->find('list', limit: 200)->all();
        $habilidades = $this->UsuariosHabilidades->Habilidades->find('list', limit: 200)->all();
        $this->set(compact('usuariosHabilidade', 'usuarios', 'habilidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Habilidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuariosHabilidade = $this->UsuariosHabilidades->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuariosHabilidade = $this->UsuariosHabilidades->patchEntity($usuariosHabilidade, $this->request->getData());
            if ($this->UsuariosHabilidades->save($usuariosHabilidade)) {
                $this->Flash->success(__('The usuarios habilidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios habilidade could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosHabilidades->Usuarios->find('list', limit: 200)->all();
        $habilidades = $this->UsuariosHabilidades->Habilidades->find('list', limit: 200)->all();
        $this->set(compact('usuariosHabilidade', 'usuarios', 'habilidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Habilidade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuariosHabilidade = $this->UsuariosHabilidades->get($id);
        if ($this->UsuariosHabilidades->delete($usuariosHabilidade)) {
            $this->Flash->success(__('The usuarios habilidade has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios habilidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
