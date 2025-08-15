<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

use App\Controller\Alunos\AppController;

/**
 * Notificacoes Controller
 *
 * @property \App\Model\Table\NotificacoesTable $Notificacoes
 */
class NotificacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Notificacoes->find()
            ->contain(['Funcoes']);
        $notificacoes = $this->paginate($query);

        $this->set(compact('notificacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificaco = $this->Notificacoes->get($id, contain: ['Funcoes']);
        $this->set(compact('notificaco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($usuario_id, $projeto_id,$funcao_id)
    {
        $usuarioLogado = $this->request->getAttribute('identity');
        $remetente = $this->Notificacoes->UsuariosRemetente
            ->find()
            ->where(['UsuariosRemetente.id' => $usuario_id])
            ->first();

        $notificacao = $this->Notificacoes->newEmptyEntity();
        $notificacao->mensagem = $this->request->getData('mensagem');
        $notificacao->funcoes_id = $funcao_id;
        $notificacao->usuario_id_emissor = $usuarioLogado->id;
        $notificacao->usuario_id_remetente = $remetente->id;
        $notificacao->aceite = 0;
        if ($this->Notificacoes->save($notificacao)) {
            $this->Flash->success(__('Notificação enviada com sucesso.'));
            return $this->redirect(['controller' => 'Projetos', 'action' => 'view', $projeto_id]);
        } else {
            $this->Flash->success(__('Houve um erro ao processar sua solicitação. Por favor, tente novamente.'));
            return $this->redirect(['controller' => 'Projetos', 'action' => 'view', $projeto_id]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificaco = $this->Notificacoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificaco = $this->Notificacoes->patchEntity($notificaco, $this->request->getData());
            if ($this->Notificacoes->save($notificaco)) {
                $this->Flash->success(__('The notificaco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificaco could not be saved. Please, try again.'));
        }
        $funcoes = $this->Notificacoes->Funcoes->find('list', limit: 200)->all();
        $this->set(compact('notificaco', 'funcoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificaco = $this->Notificacoes->get($id);
        if ($this->Notificacoes->delete($notificaco)) {
            $this->Flash->success(__('Aplicação cancelada com sucesso.'));
        } else {
            $this->Flash->error(__('Houve um erro ao cancelar a aplicação. Por favor, tente novamente.'));
        }

        return $this->redirect(['controller'=>'Projetos','action' => 'index']);
    }
}
