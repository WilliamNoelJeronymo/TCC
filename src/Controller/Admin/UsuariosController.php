<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Usuarios->find()
            ->contain(['Grupos']);
        $usuarios = $this->paginate($query);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->disableAutoLayout();
        $usuario = $this->Usuarios->get($id, contain: ['Grupos']);
        $this->set(compact('usuario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {

            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            $uploadsPath = UPLOAD_ALUNOS . '/' . $this->request->getData('matricula') . '/imagem_perfil';

            if (!is_dir($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }
            $file = $this->request->getData('imagem');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $file_name = $file->getClientFilename();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = md5($file_name) . time() . '.' . $file_extension;
                $file_target_path = $uploadsPath . '/' . $file_name;
                $file->moveTo($file_target_path);
                $usuario->foto = $file_name;
            }
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Houve um erro ao salvar o usuário.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->all();
        $this->set(compact('usuario', 'grupos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            $uploadsPath = UPLOAD_ALUNOS . '/' . $this->request->getData('matricula') . '/imagem_perfil';

            if (!is_dir($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }
            $file = $this->request->getData('imagem');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                // Exclua a imagem antiga, se existir
                if (!empty($usuario->foto)) {
                    $oldFilePath = $uploadsPath . '/' . $usuario->foto;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Faça o upload da nova imagem
                $file_name = $file->getClientFilename();
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = md5($file_name) . time() . '.' . $file_extension;
                $file_target_path = $uploadsPath . '/' . $file_name;
                $file->moveTo($file_target_path);
                $usuario->foto = $file_name;
            }

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->all();
        $this->set(compact('usuario', 'grupos'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // 1. Verifica se o usuário foi autenticado com sucesso
        if ($result && $result->isValid()) {

            // Obtém a identidade do usuário
            $identity = $this->Authentication->getIdentity();

            // 2. VERIFICAÇÃO DE AUTORIZAÇÃO: Checa se o grupo_id é 1
            if ($identity->get('grupo_id') !== 1) {

                // 3. Ação de Bloqueio: Desloga o usuário imediatamente
                $this->Authentication->logout();

                $this->Flash->error(__('Você não tem permissão de administrador.'));

                // Redireciona para a página de login ou para a home (sem acesso)
                return $this->redirect(['controller' => 'Usuarios', 'action' => 'login']);
            }

            // SE CHEGOU AQUI: Usuário logou E tem grupo_id = 1 (ou outro grupo permitido)
            $this->Flash->success(__('Logado com sucesso!'));

            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Usuarios',
                'action' => 'view',
            ]);

            return $this->redirect($redirect);
        }

        // Trata falha de login (usuário ou senha incorretos)
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuário ou senha incorretos.'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Usuarios', 'action' => 'login']);
        }
    }
}
