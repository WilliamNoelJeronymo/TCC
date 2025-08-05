<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $grupos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Add Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('email');
                    echo $this->Form->control('matricula');
                    echo $this->Form->control('senha');
                    echo $this->Form->control('foto');
                    echo $this->Form->control('grupo_id', ['options' => $grupos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
