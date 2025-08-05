<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habilidade $habilidade
 * @var \Cake\Collection\CollectionInterface|string[] $funcoes
 * @var \Cake\Collection\CollectionInterface|string[] $usuarios
 */
?>

<?= $this->Form->create($usuario) ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('habilidades._ids', [
                'type' => 'select',
                'multiple' => true,
                'options' => $habilidades,
                'label' => 'Habilidades',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo $this->Html->link('Cancelar', ['action' => 'habilidades'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Adicionar</button>
</div>
<?= $this->Form->end() ?>


