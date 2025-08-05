<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncoesRequisitosUsuario $funcoesRequisitosUsuario
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 * @var string[]|\Cake\Collection\CollectionInterface $requisitos
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcoesRequisitosUsuario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesRequisitosUsuario->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Funcoes Requisitos Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoesRequisitosUsuarios form content">
            <?= $this->Form->create($funcoesRequisitosUsuario) ?>
            <fieldset>
                <legend><?= __('Edit Funcoes Requisitos Usuario') ?></legend>
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
