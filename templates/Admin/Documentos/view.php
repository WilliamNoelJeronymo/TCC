<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento $documento
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Documento'), ['action' => 'edit', $documento->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Documento'), ['action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Documentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Documento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="documentos view content">
            <h3><?= h($documento->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($documento->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $documento->hasValue('projeto') ? $this->Html->link($documento->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $documento->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($documento->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>