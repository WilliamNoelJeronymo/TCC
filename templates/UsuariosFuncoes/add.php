<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosFunco $usuariosFunco
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 * @var \Cake\Collection\CollectionInterface|string[] $funcoes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosFuncoes form content">
            <?= $this->Form->create($usuariosFunco) ?>
            <fieldset>
                <legend><?= __('Add Usuarios Funco') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('funcoes_id', ['options' => $funcoes]);
                    echo $this->Form->control('editor');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
