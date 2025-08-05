<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosHabilidade $usuariosHabilidade
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 * @var string[]|\Cake\Collection\CollectionInterface $habilidades
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuariosHabilidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosHabilidade->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usuarios Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuariosHabilidades form content">
            <?= $this->Form->create($usuariosHabilidade) ?>
            <fieldset>
                <legend><?= __('Edit Usuarios Habilidade') ?></legend>
                <?php
                    echo $this->Form->control('usuario_id', ['options' => $usuarios]);
                    echo $this->Form->control('habilidade_id', ['options' => $habilidades]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
