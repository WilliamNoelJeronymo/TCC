<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Documento> $documentos
 */
?>
<div class="documentos index content">
    <?= $this->Html->link(__('New Documento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Documentos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('projeto_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documentos as $documento): ?>
                <tr>
                    <td><?= $this->Number->format($documento->id) ?></td>
                    <td><?= h($documento->nome) ?></td>
                    <td><?= $documento->hasValue('projeto') ? $this->Html->link($documento->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $documento->projeto->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $documento->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documento->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id)]) ?>
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