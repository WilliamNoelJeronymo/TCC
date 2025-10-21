<?php
declare(strict_types=1);

namespace App\Controller\Alunos;

use Cake\Collection\Collection;

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

    public function membros($projeto_id)
    {
        $usuarios = $this->Usuarios->find()
            ->contain(['Grupos', 'Funcoes' => function ($q) use ($projeto_id) {
                return $q->where(['Funcoes.projetos_id' => $projeto_id]);
            }])
            ->all();

        $usuarios = (new Collection($usuarios))
            ->filter(function ($usuario) {
                return !empty($usuario->funcoes);
            })
            ->toArray();

        $projeto = $this->Usuarios->Funcoes->Projetos->find()
            ->where(['Projetos.id' => $projeto_id])
            ->first();

        $this->set(compact('usuarios', 'projeto'));
    }

    public function view($id = null)
    {
        $user = $this->request->getAttribute('identity');
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => [
                'Funcoes' => [
                    'Projetos'
                ],
                'Habilidades'
            ]
        ]);

        $funcoesPorProjeto = collection($usuario->funcoes)
            ->groupBy(function ($funcao) {

                return $funcao->projeto->id ?? 0;
            })
            ->map(function ($funcoesParaUmProjeto, $projetoId) {

                $projeto = $funcoesParaUmProjeto[0]->projeto;

                return [
                    'projeto' => $projeto,
                    'funcoes' => $funcoesParaUmProjeto
                ];
            })
            ->toList();

        $this->set(compact('usuario', 'funcoesPorProjeto'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function edit($id = null)
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
            if ($identity->get('grupo_id') === 1) {

                // 3. Ação de Bloqueio: Desloga o usuário imediatamente
                $this->Authentication->logout();

                $this->Flash->error(__('Você deve logar como aluno ou professor.'));

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

    public function habilidades()
    {
        $user = $this->request->getAttribute('identity');
        $habilidades = $this->Usuarios->Habilidades
            ->find()
            ->matching('Usuarios', function ($q) use ($user) {
                return $q->where(['Usuarios.id' => $user->id]);
            });
        $habilidades = $this->paginate($habilidades);
        $this->set(compact('habilidades'));
    }

    public function habilidadesAdd()
    {
        $user = $this->request->getAttribute('identity');
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => ['Habilidades'], // importante para carregar habilidades existentes
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData(), [
                'associated' => ['Habilidades']
            ]);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success('Usuário atualizado com sucesso.');
                return $this->redirect(['action' => 'view', $usuario->id]);
            }
            $this->Flash->error('Erro ao salvar usuário.');
        }

        $habilidades = $this->Usuarios->Habilidades->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome',
        ])
            ->order(['nome' => 'ASC'])
            ->toArray();

        $this->set(compact('usuario', 'habilidades'));
    }

    public function habilidadesDelete($habilidadeId)
    {
        $user = $this->request->getAttribute('identity');

        // Busca o usuário com as habilidades relacionadas
        $usuario = $this->Usuarios->get($user->id, [
            'contain' => ['Habilidades'],
        ]);

        // Busca a habilidade a ser desvinculada
        $habilidade = $this->Usuarios->Habilidades->get($habilidadeId);

        // Desvincula (remove da tabela usuarios_habilidades)
        if ($this->Usuarios->Habilidades->unlink($usuario, [$habilidade])) {
            $this->Flash->success('Habilidade desvinculada com sucesso.');
        } else {
            $this->Flash->error('Erro ao desvincular habilidade.');
        }

        return $this->redirect($this->referer());
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
