<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\ViewBuilder;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{
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
        $usuario = $this->Usuarios->get($id, contain: ['Grupos', 'UsuariosProjetosFuncoes']);
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
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', limit: 200)->all();
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
        $usuario = $this->Usuarios->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $grupos = $this->Usuarios->Grupos->find('list', limit: 200)->all();
        $this->set(compact('usuario', 'grupos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
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


    public function curriculo($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Funcoes.Projetos', 'Habilidades']
        ]);

        // Renderiza a view em string
        $this->viewBuilder()
            ->setClassName('Cake\View\View')
            ->disableAutoLayout()
            ->setTemplatePath('Usuarios')
            ->setTemplate('curriculo');

        $this->set(compact('usuario'));
        $html = $this->render()->getBody(); // aqui já pega o HTML renderizado

        // Configuração do Dompdf
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans'); // suporta acentuação
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Retorna o PDF como download
        return $this->response
            ->withType('pdf')
            ->withStringBody($dompdf->output())
            ->withDownload("curriculo_{$usuario->nome}.pdf");
    }



}
