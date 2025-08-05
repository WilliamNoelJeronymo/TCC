<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<div class="form-group">
    <?= $this->Html->link(__('Adicionar Usuário'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('matricula') ?></th>
            <th><?= $this->Paginator->sort('grupo') ?></th>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->matricula) ?></td>
                <td><?= $usuario->grupo->nome ?></td>
                <td>
                    <div class="user-panel d-flex">
                        <div class="image">
                            <?php if($usuario->foto): ?>
                            <?= $this->Html->image('/uploads/alunos/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto,
                                ['class' => 'img-circle elevation-2', 'alt' => 'user image']) ?>
                            <?php else: ?>
                                <?= $this->Html->image('/img/default-user.jpg',
                                    ['class' => 'img-circle elevation-2', 'alt' => 'user image']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="info">
                            <?= h($usuario->nome) ?>
                        </div>
                    </div>
                </td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-eye"></span>', ['action' => 'view', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Visualizar', 'data-toggle' => 'modal', 'data-target' => '.view']); ?>
                    <?= $this->Html->link('<span class="fas fa-pen"></span>', ['action' => 'edit', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Editar']); ?>
                    <?= $this->Form->postLink(('<span class="fa fa-trash"></span>'), ['action' => 'delete', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Deletar', 'confirm' => __('Você tem certeza que deseja deletar o usuário: {0}?', $usuario->nome)]) ?>
                    <?= $this->Html->link('<i class="fas fa-lock"></i>', ['action' => 'alterar-senha', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Alterar senha', 'data-toggle' => 'modal', 'data-target' => '.view']) ?>
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
