<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuncoesHabilidade $funcoesHabilidade
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 * @var string[]|\Cake\Collection\CollectionInterface $habilidades
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $funcoesHabilidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesHabilidade->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Funcoes Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoesHabilidades form content">
            <?= $this->Form->create($funcoesHabilidade) ?>
            <fieldset>
                <legend><?= __('Edit Funcoes Habilidade') ?></legend>
                <?php
                    echo $this->Form->control('funcoes_id', ['options' => $funcoes]);
                    echo $this->Form->control('habilidade_id', ['options' => $habilidades]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
