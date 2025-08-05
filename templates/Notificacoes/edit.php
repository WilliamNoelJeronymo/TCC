<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificaco $notificaco
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notificaco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notificaco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Notificacoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="notificacoes form content">
            <?= $this->Form->create($notificaco) ?>
            <fieldset>
                <legend><?= __('Edit Notificaco') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id_emissor');
                    echo $this->Form->control('usuario_id_remetente');
                    echo $this->Form->control('funcoes_id', ['options' => $funcoes]);
                    echo $this->Form->control('aceite');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
