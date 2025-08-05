<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funco $funco
 * @var \Cake\Collection\CollectionInterface|string[] $projetos
 * @var \Cake\Collection\CollectionInterface|string[] $habilidades
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoes form content">
            <?= $this->Form->create($funco) ?>
            <fieldset>
                <legend><?= __('Add Funco') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('quantidade');
                    echo $this->Form->control('projetos_id', ['options' => $projetos]);
                    echo $this->Form->control('habilidades._ids', ['options' => $habilidades]);
                    echo $this->Form->control('usuarios._ids', ['options' => $usuarios]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
