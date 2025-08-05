<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $grupos
 */
?>
<?= $this->Form->create($usuario, ['type' => 'file', 'id' => 'cadastroUsuarioAdmin']) ?>
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->control('imagem', [
            'type' => 'file',
            'class' => 'file-upload-edit',
            'required' => false
        ]); ?>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $this->Form->control('nome', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= $this->Form->control('email', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('matricula', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('grupo_id', ['options' => $grupos, 'class' => 'form-control']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Salvar alterações</button>
</div>
<?= $this->Form->end() ?>
<script>
    $(".file-upload-edit").fileinput({
        'showUpload': false,
        'showCancel': false,
        'initialPreview': '/tcc/uploads/alunos/<?= $usuario->matricula ?>/imagem_perfil/<?= $usuario->foto ?>',
        'initialPreviewAsData': true
    });
</script>
