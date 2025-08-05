<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FuncoesRequisitosUsuario> $funcoesRequisitosUsuarios
 */
?>
<div class="funcoesRequisitosUsuarios index content">
    <?= $this->Html->link(__('New Funcoes Requisitos Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Funcoes Requisitos Usuarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('funcoe_id') ?></th>
                    <th><?= $this->Paginator->sort('requisito_id') ?></th>
                    <th><?= $this->Paginator->sort('usuarios_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcoesRequisitosUsuarios as $funcoesRequisitosUsuario): ?>
                <tr>
                    <td><?= $this->Number->format($funcoesRequisitosUsuario->id) ?></td>
                    <td><?= $funcoesRequisitosUsuario->hasValue('funco') ? $this->Html->link($funcoesRequisitosUsuario->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $funcoesRequisitosUsuario->funco->id]) : '' ?></td>
                    <td><?= $funcoesRequisitosUsuario->hasValue('requisito') ? $this->Html->link($funcoesRequisitosUsuario->requisito->nome, ['controller' => 'Requisitos', 'action' => 'view', $funcoesRequisitosUsuario->requisito->id]) : '' ?></td>
                    <td><?= $funcoesRequisitosUsuario->hasValue('usuario') ? $this->Html->link($funcoesRequisitosUsuario->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $funcoesRequisitosUsuario->usuario->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $funcoesRequisitosUsuario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcoesRequisitosUsuario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcoesRequisitosUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesRequisitosUsuario->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>