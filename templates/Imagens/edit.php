<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 * @var string[]|\Cake\Collection\CollectionInterface $projetos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imagen->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Imagens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagens form content">
            <?= $this->Form->create($imagen) ?>
            <fieldset>
                <legend><?= __('Edit Imagen') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('projeto_id', ['options' => $projetos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
