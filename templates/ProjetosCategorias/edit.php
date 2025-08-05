<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjetosCategoria $projetosCategoria
 * @var string[]|\Cake\Collection\CollectionInterface $projetos
 * @var string[]|\Cake\Collection\CollectionInterface $categorias
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projetosCategoria->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projetosCategoria->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projetos Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projetosCategorias form content">
            <?= $this->Form->create($projetosCategoria) ?>
            <fieldset>
                <legend><?= __('Edit Projetos Categoria') ?></legend>
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
