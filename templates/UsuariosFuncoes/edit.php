<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosFunco $usuariosFunco
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuariosFunco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosFunco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usuarios Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosFuncoes form content">
            <?= $this->Form->create($usuariosFunco) ?>
            <fieldset>
                <legend><?= __('Edit Usuarios Funco') ?></legend>
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
