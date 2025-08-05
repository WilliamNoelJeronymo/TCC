<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosProjetosFunco $usuariosProjetosFunco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usuarios Projetos Funco'), ['action' => 'edit', $usuariosProjetosFunco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuarios Projetos Funco'), ['action' => 'delete', $usuariosProjetosFunco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosProjetosFunco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios Projetos Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuarios Projetos Funco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosProjetosFuncoes view content">
            <h3><?= h($usuariosProjetosFunco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $usuariosProjetosFunco->hasValue('usuario') ? $this->Html->link($usuariosProjetosFunco->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosProjetosFunco->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Funco') ?></th>
                    <td><?= $usuariosProjetosFunco->hasValue('funco') ? $this->Html->link($usuariosProjetosFunco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $usuariosProjetosFunco->funco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $usuariosProjetosFunco->hasValue('projeto') ? $this->Html->link($usuariosProjetosFunco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $usuariosProjetosFunco->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usuariosProjetosFunco->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>