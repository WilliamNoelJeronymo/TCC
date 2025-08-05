<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Categoria> $categorias
 */
?>
<div class="form-group">
    <?= $this->Html->link(__('Adicionar Categoria'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>

            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria->id ?></td>
                <td><?= h($categoria->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fas fa-pen"></span>', ['action' => 'edit', $categoria->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Editar']); ?>
                    <?= $this->Form->postLink(('<span class="fa fa-trash"></span>'), ['action' => 'delete', $categoria->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Deletar', 'confirm' => __('Tem certeza que deseja deletar a habilidade {0}?', $categoria->nome)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($this->Paginator->total() > 1): ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}')) ?></p>
    </div>
<?php endif; ?>

