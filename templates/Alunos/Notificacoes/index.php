<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Notificaco> $notificacoes
 */
?>
<div class="notificacoes index content">
    <?= $this->Html->link(__('New Notificaco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Notificacoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id_emissor') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id_remetente') ?></th>
                    <th><?= $this->Paginator->sort('funcoes_id') ?></th>
                    <th><?= $this->Paginator->sort('aceite') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notificacoes as $notificaco): ?>
                <tr>
                    <td><?= $this->Number->format($notificaco->id) ?></td>
                    <td><?= $this->Number->format($notificaco->usuario_id_emissor) ?></td>
                    <td><?= $this->Number->format($notificaco->usuario_id_remetente) ?></td>
                    <td><?= $notificaco->hasValue('funco') ? $this->Html->link($notificaco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $notificaco->funco->id]) : '' ?></td>
                    <td><?= $this->Number->format($notificaco->aceite) ?></td>
                    <td><?= h($notificaco->created) ?></td>
                    <td><?= h($notificaco->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $notificaco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificaco->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificaco->id)]) ?>
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