<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Imagen'), ['action' => 'edit', $imagen->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Imagen'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Imagens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Imagen'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagens view content">
            <h3><?= h($imagen->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($imagen->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $imagen->hasValue('projeto') ? $this->Html->link($imagen->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $imagen->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imagen->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>