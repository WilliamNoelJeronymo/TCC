<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habilidade $habilidade
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $habilidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $habilidade->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="habilidades form content">
            <?= $this->Form->create($habilidade) ?>
            <fieldset>
                <legend><?= __('Edit Habilidade') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('funcoes._ids', ['options' => $funcoes]);
                    echo $this->Form->control('usuarios._ids', ['options' => $usuarios]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
