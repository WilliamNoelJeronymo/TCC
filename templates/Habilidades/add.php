<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habilidade $habilidade
 * @var \Cake\Collection\CollectionInterface|string[] $funcoes
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="habilidades form content">
            <?= $this->Form->create($habilidade) ?>
            <fieldset>
                <legend><?= __('Add Habilidade') ?></legend>
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
