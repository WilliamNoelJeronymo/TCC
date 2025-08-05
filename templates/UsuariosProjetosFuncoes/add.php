<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosProjetosFunco $usuariosProjetosFunco
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 * @var \Cake\Collection\CollectionInterface|string[] $funcoes
 * @var \Cake\Collection\CollectionInterface|string[] $projetos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios Projetos Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosProjetosFuncoes form content">
            <?= $this->Form->create($usuariosProjetosFunco) ?>
            <fieldset>
                <legend><?= __('Add Usuarios Projetos Funco') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('funcoes_id', ['options' => $funcoes]);
                    echo $this->Form->control('projeto_id', ['options' => $projetos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
