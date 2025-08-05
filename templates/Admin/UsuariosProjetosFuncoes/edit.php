<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosProjetosFunco $usuariosProjetosFunco
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 * @var string[]|\Cake\Collection\CollectionInterface $projetos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuariosProjetosFunco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosProjetosFunco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usuarios Projetos Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosProjetosFuncoes form content">
            <?= $this->Form->create($usuariosProjetosFunco) ?>
            <fieldset>
                <legend><?= __('Edit Usuarios Projetos Funco') ?></legend>
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
