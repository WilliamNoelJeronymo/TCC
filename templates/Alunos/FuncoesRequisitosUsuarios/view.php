<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncoesRequisitosUsuario $funcoesRequisitosUsuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Funcoes Requisitos Usuario'), ['action' => 'edit', $funcoesRequisitosUsuario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Funcoes Requisitos Usuario'), ['action' => 'delete', $funcoesRequisitosUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesRequisitosUsuario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Funcoes Requisitos Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Funcoes Requisitos Usuario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoesRequisitosUsuarios view content">
            <h3><?= h($funcoesRequisitosUsuario->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Funco') ?></th>
                    <td><?= $funcoesRequisitosUsuario->hasValue('funco') ? $this->Html->link($funcoesRequisitosUsuario->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $funcoesRequisitosUsuario->funco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Requisito') ?></th>
                    <td><?= $funcoesRequisitosUsuario->hasValue('requisito') ? $this->Html->link($funcoesRequisitosUsuario->requisito->nome, ['controller' => 'Requisitos', 'action' => 'view', $funcoesRequisitosUsuario->requisito->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $funcoesRequisitosUsuario->hasValue('usuario') ? $this->Html->link($funcoesRequisitosUsuario->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $funcoesRequisitosUsuario->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($funcoesRequisitosUsuario->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>