<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FuncoesHabilidade> $funcoesHabilidades
 */
?>
<div class="funcoesHabilidades index content">
    <?= $this->Html->link(__('New Funcoes Habilidade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Funcoes Habilidades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('funcoes_id') ?></th>
                    <th><?= $this->Paginator->sort('habilidade_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcoesHabilidades as $funcoesHabilidade): ?>
                <tr>
                    <td><?= $this->Number->format($funcoesHabilidade->id) ?></td>
                    <td><?= $funcoesHabilidade->hasValue('funco') ? $this->Html->link($funcoesHabilidade->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $funcoesHabilidade->funco->id]) : '' ?></td>
                    <td><?= $funcoesHabilidade->hasValue('habilidade') ? $this->Html->link($funcoesHabilidade->habilidade->nome, ['controller' => 'Habilidades', 'action' => 'view', $funcoesHabilidade->habilidade->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $funcoesHabilidade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcoesHabilidade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcoesHabilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesHabilidade->id)]) ?>
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