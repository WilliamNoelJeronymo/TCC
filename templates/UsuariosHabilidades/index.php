<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsuariosHabilidade> $usuariosHabilidades
 */
?>
<div class="usuariosHabilidades index content">
    <?= $this->Html->link(__('New Usuarios Habilidade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios Habilidades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('habilidade_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuariosHabilidades as $usuariosHabilidade): ?>
                <tr>
                    <td><?= $this->Number->format($usuariosHabilidade->id) ?></td>
                    <td><?= $usuariosHabilidade->hasValue('usuario') ? $this->Html->link($usuariosHabilidade->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosHabilidade->usuario->id]) : '' ?></td>
                    <td><?= $usuariosHabilidade->hasValue('habilidade') ? $this->Html->link($usuariosHabilidade->habilidade->nome, ['controller' => 'Habilidades', 'action' => 'view', $usuariosHabilidade->habilidade->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuariosHabilidade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuariosHabilidade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuariosHabilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosHabilidade->id)]) ?>
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