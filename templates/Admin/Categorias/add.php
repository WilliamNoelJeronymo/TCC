<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 * @var \Cake\Collection\CollectionInterface|string[] $projetos
 */
?>
<?= $this->Form->create($categoria) ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('nome', ['class' => 'form-control']); ?>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Adicionar</button>
</div>
<?= $this->Form->end() ?>
