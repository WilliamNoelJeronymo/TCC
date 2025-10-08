<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Alunos;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        $this->viewBuilder()->setLayout('aluno');

    }

//    public function beforeRender(\Cake\Event\EventInterface $event)
//    {
//        parent::beforeRender($event);
//
//        $Notificacoes = $this->fetchTable('Notificacoes');
//
//        $usuarioMenu = $this->Authentication->getIdentity();
//        $minhasNotificacoes = null;
//        if ($usuarioMenu) {
//            $minhasNotificacoes = $Notificacoes
//                ->find()
//                ->where(['usuario_id_remetente' => $usuarioMenu->id])
//                ->contain(['UsuariosEmissor', 'Funcoes' => 'Projetos']);
//        }
//
//        $this->set(compact('usuarioMenu', 'minhasNotificacoes'));
//    }
    public function beforeRender(\Cake\Event\EventInterface $event)
    {
        parent::beforeRender($event);

        $usuarioMenu = $this->Authentication->getIdentity();
        $minhasNotificacoes = null;
        $meusProjetos = null;

        if ($usuarioMenu) {
            // 🔹 Tabela de notificações
            $Notificacoes = $this->fetchTable('Notificacoes');

            $minhasNotificacoes = $Notificacoes
                ->find()
                ->where(['usuario_id_remetente' => $usuarioMenu->id])
                ->contain(['UsuariosEmissor', 'Funcoes' => 'Projetos'])
                ->orderBy(['Notificacoes.created' => 'DESC']);

            // 🔹 Tabela de projetos (projetos em que o usuário participa)
            $Projetos = $this->fetchTable('Projetos');

            $meusProjetos = $Projetos->find()
                ->distinct(['Projetos.id'])
                ->matching('Funcoes.Usuarios', function ($q) use ($usuarioMenu) {
                    return $q->where(['Usuarios.id' => $usuarioMenu->id]);
                })
                ->contain(['Categorias'])
                ->orderBy(['Projetos.nome' => 'ASC'])
                ->all();
        }

        // Disponibiliza tudo para as views/layouts
        $this->set(compact('usuarioMenu', 'minhasNotificacoes', 'meusProjetos'));
    }
}
