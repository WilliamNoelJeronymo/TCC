<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsuariosFunco> $usuariosFuncoes
 */
?>
<div class="usuariosFuncoes index content">
    <?= $this->Html->link(__('New Usuarios Funco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios Funcoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('funcoes_id') ?></th>
                    <th><?= $this->Paginator->sort('editor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuariosFuncoes as $usuariosFunco): ?>
                <tr>
                    <td><?= $this->Number->format($usuariosFunco->id) ?></td>
                    <td><?= $usuariosFunco->hasValue('usuario') ? $this->Html->link($usuariosFunco->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosFunco->usuario->id]) : '' ?></td>
                    <td><?= $usuariosFunco->hasValue('funco') ? $this->Html->link($usuariosFunco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $usuariosFunco->funco->id]) : '' ?></td>
                    <td><?= h($usuariosFunco->editor) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuariosFunco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuariosFunco->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuariosFunco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosFunco->id)]) ?>
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