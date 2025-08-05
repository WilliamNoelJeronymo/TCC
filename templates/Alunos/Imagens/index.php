<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Imagen> $imagens
 */
?>
<div class="imagens index content">
    <?= $this->Html->link(__('New Imagen'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Imagens') ?></h3>
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
                <?php foreach ($imagens as $imagen): ?>
                <tr>
                    <td><?= $this->Number->format($imagen->id) ?></td>
                    <td><?= h($imagen->nome) ?></td>
                    <td><?= $imagen->hasValue('projeto') ? $this->Html->link($imagen->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $imagen->projeto->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imagen->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagen->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?>
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