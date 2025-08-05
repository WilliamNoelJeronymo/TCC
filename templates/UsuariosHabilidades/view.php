<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosHabilidade $usuariosHabilidade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usuarios Habilidade'), ['action' => 'edit', $usuariosHabilidade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuarios Habilidade'), ['action' => 'delete', $usuariosHabilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosHabilidade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuarios Habilidade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosHabilidades view content">
            <h3><?= h($usuariosHabilidade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuario') ?></th>
                    <td><?= $usuariosHabilidade->hasValue('usuario') ? $this->Html->link($usuariosHabilidade->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosHabilidade->usuario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Habilidade') ?></th>
                    <td><?= $usuariosHabilidade->hasValue('habilidade') ? $this->Html->link($usuariosHabilidade->habilidade->nome, ['controller' => 'Habilidades', 'action' => 'view', $usuariosHabilidade->habilidade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usuariosHabilidade->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>