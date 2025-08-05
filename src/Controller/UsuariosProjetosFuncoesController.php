<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UsuariosProjetosFuncoes Controller
 *
 * @property \App\Model\Table\UsuariosProjetosFuncoesTable $UsuariosProjetosFuncoes
 */
class UsuariosProjetosFuncoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->UsuariosProjetosFuncoes->find()
            ->contain(['Usuarios', 'Funcoes', 'Projetos']);
        $usuariosProjetosFuncoes = $this->paginate($query);

        $this->set(compact('usuariosProjetosFuncoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Projetos Funco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->get($id, contain: ['Usuarios', 'Funcoes', 'Projetos']);
        $this->set(compact('usuariosProjetosFunco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->patchEntity($usuariosProjetosFunco, $this->request->getData());
            if ($this->UsuariosProjetosFuncoes->save($usuariosProjetosFunco)) {
                $this->Flash->success(__('The usuarios projetos funco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios projetos funco could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosProjetosFuncoes->Usuarios->find('list', limit: 200)->all();
        $funcoes = $this->UsuariosProjetosFuncoes->Funcoes->find('list', limit: 200)->all();
        $projetos = $this->UsuariosProjetosFuncoes->Projetos->find('list', limit: 200)->all();
        $this->set(compact('usuariosProjetosFunco', 'usuarios', 'funcoes', 'projetos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Projetos Funco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->patchEntity($usuariosProjetosFunco, $this->request->getData());
            if ($this->UsuariosProjetosFuncoes->save($usuariosProjetosFunco)) {
                $this->Flash->success(__('The usuarios projetos funco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios projetos funco could not be saved. Please, try again.'));
        }
        $usuarios = $this->UsuariosProjetosFuncoes->Usuarios->find('list', limit: 200)->all();
        $funcoes = $this->UsuariosProjetosFuncoes->Funcoes->find('list', limit: 200)->all();
        $projetos = $this->UsuariosProjetosFuncoes->Projetos->find('list', limit: 200)->all();
        $this->set(compact('usuariosProjetosFunco', 'usuarios', 'funcoes', 'projetos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Projetos Funco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuariosProjetosFunco = $this->UsuariosProjetosFuncoes->get($id);
        if ($this->UsuariosProjetosFuncoes->delete($usuariosProjetosFunco)) {
            $this->Flash->success(__('The usuarios projetos funco has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios projetos funco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
