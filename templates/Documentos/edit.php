<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Documento $documento
 * @var string[]|\Cake\Collection\CollectionInterface $projetos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $documento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Documentos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="documentos form content">
            <?= $this->Form->create($documento) ?>
            <fieldset>
                <legend><?= __('Edit Documento') ?></legend>
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
