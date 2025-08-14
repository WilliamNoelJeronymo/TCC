<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificaco $notificaco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Notificaco'), ['action' => 'edit', $notificaco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Notificaco'), ['action' => 'delete', $notificaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificaco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Notificacoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Notificaco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="notificacoes view content">
            <h3><?= h($notificaco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Funco') ?></th>
                    <td><?= $notificaco->hasValue('funco') ? $this->Html->link($notificaco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $notificaco->funco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($notificaco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario Id Emissor') ?></th>
                    <td><?= $this->Number->format($notificaco->usuario_id_emissor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuario Id Remetente') ?></th>
                    <td><?= $this->Number->format($notificaco->usuario_id_remetente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Aceite') ?></th>
                    <td><?= $this->Number->format($notificaco->aceite) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($notificaco->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($notificaco->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>