<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funco $funco
 * @var \Cake\Collection\CollectionInterface|string[] $projetos
 */
?>

<?= $this->Form->create($funco) ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?=$this->Form->control('nome',['class'=>'form-control']);?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?=$this->Form->control('quantidade',['label'=>'Quantidade de Pessoas','class'=>'form-control']);?>
        </div>
    </div>
</div>

<div class="form-group">
    <?=$this->Form->control('descricao',['label'=>'Descrição da função','class'=>'form-control']);?>
</div>
<div class="form-group">

    <?=$this->Form->control('habilidades._ids',['options' => $habilidades,'label'=>'Seleciona as habilidades desejáveis','class'=>'form-control']);?>
</div>
<div class="text-right">
    <?=$this->Html->link('Cancelar',['controller'=>'Projetos','action'=>'index',$projeto_id],['class'=>'btn btn-default'])?>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
<?= $this->Form->end() ?>
