<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncoesRequisitosUsuario $funcoesRequisitosUsuario
 * @var \Cake\Collection\CollectionInterface|string[] $funcoes
 * @var \Cake\Collection\CollectionInterface|string[] $requisitos
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Funcoes Requisitos Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoesRequisitosUsuarios form content">
            <?= $this->Form->create($funcoesRequisitosUsuario) ?>
            <fieldset>
                <legend><?= __('Add Funcoes Requisitos Usuario') ?></legend>
                <?php
                    echo $this->Form->control('funcoe_id', ['options' => $funcoes, 'empty' => true]);
                    echo $this->Form->control('requisito_id', ['options' => $requisitos]);
                    echo $this->Form->control('usuarios_id', ['options' => $usuarios, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
