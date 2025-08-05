<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisito $requisito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requisito->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Requisitos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requisitos form content">
            <?= $this->Form->create($requisito) ?>
            <fieldset>
                <legend><?= __('Edit Requisito') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
