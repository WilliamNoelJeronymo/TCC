<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosFunco $usuariosFunco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usuarios Funco'), ['action' => 'edit', $usuariosFunco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuarios Funco'), ['action' => 'delete', $usuariosFunco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosFunco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuarios Funco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosFuncoes view content">
            <h3><?= h($usuariosFunco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $usuariosFunco->hasValue('usuario') ? $this->Html->link($usuariosFunco->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosFunco->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Funco') ?></th>
                    <td><?= $usuariosFunco->hasValue('funco') ? $this->Html->link($usuariosFunco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $usuariosFunco->funco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usuariosFunco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Editor') ?></th>
                    <td><?= $usuariosFunco->editor ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>