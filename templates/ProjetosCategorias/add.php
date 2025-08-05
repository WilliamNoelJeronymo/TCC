<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjetosCategoria $projetosCategoria
 * @var \Cake\Collection\CollectionInterface|string[] $projetos
 * @var \Cake\Collection\CollectionInterface|string[] $categorias
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projetos Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projetosCategorias form content">
            <?= $this->Form->create($projetosCategoria) ?>
            <fieldset>
                <legend><?= __('Add Projetos Categoria') ?></legend>
                <?php
                    echo $this->Form->control('projeto_id', ['options' => $projetos]);
                    echo $this->Form->control('categoria_id', ['options' => $categorias]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
