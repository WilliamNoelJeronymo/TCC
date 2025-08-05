<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjetosCategoria> $projetosCategorias
 */
?>
<div class="projetosCategorias index content">
    <?= $this->Html->link(__('New Projetos Categoria'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projetos Categorias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('projeto_id') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projetosCategorias as $projetosCategoria): ?>
                <tr>
                    <td><?= $this->Number->format($projetosCategoria->id) ?></td>
                    <td><?= $projetosCategoria->hasValue('projeto') ? $this->Html->link($projetosCategoria->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $projetosCategoria->projeto->id]) : '' ?></td>
                    <td><?= $projetosCategoria->hasValue('categoria') ? $this->Html->link($projetosCategoria->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $projetosCategoria->categoria->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projetosCategoria->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projetosCategoria->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projetosCategoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetosCategoria->id)]) ?>
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