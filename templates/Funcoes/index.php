<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Funco> $funcoes
 */
?>
<div class="funcoes index content">
    <?= $this->Html->link(__('New Funco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Funcoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('projetos_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcoes as $funco): ?>
                <tr>
                    <td><?= $this->Number->format($funco->id) ?></td>
                    <td><?= h($funco->nome) ?></td>
                    <td><?= $this->Number->format($funco->quantidade) ?></td>
                    <td><?= $funco->hasValue('projeto') ? $this->Html->link($funco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $funco->projeto->id]) : '' ?></td>
                    <td><?= h($funco->created) ?></td>
                    <td><?= h($funco->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $funco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funco->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funco->id)]) ?>
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