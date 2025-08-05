<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Funco> $funcoes
 */
?>
<div class="funcoes index content">
    <?= $this->Html->link(__('Nova Função'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
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
                                class="fas fa-users"></i> <?= $funco->total_usuarios ?> / <?= $funco->quantidade ?></span></td>
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
</div>
