<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Habilidade> $habilidades
 */
?>
<div class="habilidades index content">
    <?= $this->Html->link(__('New Habilidade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Habilidades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habilidades as $habilidade): ?>
                <tr>
                    <td><?= $this->Number->format($habilidade->id) ?></td>
                    <td><?= h($habilidade->nome) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $habilidade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $habilidade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $habilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $habilidade->id)]) ?>
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