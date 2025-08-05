<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funco $funco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Funco'), ['action' => 'edit', $funco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Funco'), ['action' => 'delete', $funco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Funco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoes view content">
            <h3><?= h($funco->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($funco->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $funco->hasValue('projeto') ? $this->Html->link($funco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $funco->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($funco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($funco->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($funco->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($funco->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($funco->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>