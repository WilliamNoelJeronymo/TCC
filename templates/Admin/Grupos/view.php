<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo $grupo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Grupo'), ['action' => 'edit', $grupo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Grupo'), ['action' => 'delete', $grupo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grupo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Grupos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Grupo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="grupos view content">
            <h3><?= h($grupo->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($grupo->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($grupo->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Usuarios') ?></h4>
                <?php if (!empty($grupo->usuarios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Matricula') ?></th>
                            <th><?= __('Senha') ?></th>
                            <th><?= __('Foto') ?></th>
                            <th><?= __('Grupo Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($grupo->usuarios as $usuario) : ?>
                        <tr>
                            <td><?= h($usuario->id) ?></td>
                            <td><?= h($usuario->nome) ?></td>
                            <td><?= h($usuario->matricula) ?></td>
                            <td><?= h($usuario->senha) ?></td>
                            <td><?= h($usuario->foto) ?></td>
                            <td><?= h($usuario->grupo_id) ?></td>
                            <td><?= h($usuario->created) ?></td>
                            <td><?= h($usuario->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuario->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuario->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>