<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habilidade $habilidade
 * @var string[]|\Cake\Collection\CollectionInterface $funcoes
 * @var string[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<?= $this->Form->create($habilidade) ?>
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
