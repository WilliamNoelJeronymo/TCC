<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Funco> $funcoes
 */
?>
<div class="funcoes index content">
    <?= $this->Html->link(__('Criar Nova Função'), ['action' => 'add', $projeto_id], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Funcoes') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>nome</th>
                <th>quantidade</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funcoes as $funco): ?>
                <tr>
                    <td><?= h($funco->nome) ?></td>
                    <td> <span
                            class="<?= $funco->total_usuarios == $funco->quantidade ? 'text-success' : 'text-primary' ?>"><i
                                class="fas fa-users"></i> <?= $funco->total_usuarios ?> / <?= $funco->quantidade ?></span>
                    </td>
                    <td class="actions">
                        <div class="btn-group btn-group-sm" role="group">
                            <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $funco->id], [
                                'escape' => false,
                                'class' => 'btn btn-outline-primary',
                                'title' => 'Visualizar',
                                'data-tooltip' => 'tooltip',
                                'data-toggle' => 'modal',
                                'data-target' => '.view'
                            ]) ?>
                            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $funco->id], [
                                'escape' => false,
                                'class' => 'btn btn-outline-secondary',
                                'title' => 'Editar',
                                'data-toggle' => 'tooltip',
                            ]) ?>
                            <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $funco->id], [
                                'escape' => false,
                                'class' => 'btn btn-outline-danger',
                                'confirm' => __('Deseja realmente excluir # {0}?', $funco->id),
                                'title' => 'Excluir',
                                'data-toggle' => 'tooltip',
                            ]) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
