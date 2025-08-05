<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncoesHabilidade $funcoesHabilidade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Funcoes Habilidade'), ['action' => 'edit', $funcoesHabilidade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Funcoes Habilidade'), ['action' => 'delete', $funcoesHabilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesHabilidade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Funcoes Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Funcoes Habilidade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoesHabilidades view content">
            <h3><?= h($funcoesHabilidade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Funco') ?></th>
                    <td><?= $funcoesHabilidade->hasValue('funco') ? $this->Html->link($funcoesHabilidade->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $funcoesHabilidade->funco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Habilidade') ?></th>
                    <td><?= $funcoesHabilidade->hasValue('habilidade') ? $this->Html->link($funcoesHabilidade->habilidade->nome, ['controller' => 'Habilidades', 'action' => 'view', $funcoesHabilidade->habilidade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($funcoesHabilidade->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>