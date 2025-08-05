<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosHabilidade $usuariosHabilidade
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 * @var \Cake\Collection\CollectionInterface|string[] $habilidades
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosHabilidades form content">
            <?= $this->Form->create($usuariosHabilidade) ?>
            <fieldset>
                <legend><?= __('Add Usuarios Habilidade') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('habilidade_id', ['options' => $habilidades]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
