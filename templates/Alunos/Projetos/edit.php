<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>

<?= $this->Form->create($projeto, ['type' => 'file']) ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?= $this->Form->control('categorias._ids', ['Label' => 'Categoria do Projeto', 'options' => $categorias, 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?= $this->Form->control('nome', ['label' => 'Nome do projeto', 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-md-12">
        <?= $this->Form->control('imagem', [
            'label' => 'Banner para divulgação do projeto',
            'type' => 'file',
            'class' => 'file-upload-edit',
            'required' => false
        ]); ?>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('objetvo', ['label' => 'Objetivo a ser alcançado com o projeto', 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('descricao', ['label' => 'Uma breve descrição do projeto', 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            Não é necessário a documentação do projeto para a criação, pois deverá ser preenchida conforme o avanço do
            projeto
        </div>
        <div class="form-group">
            <?= $this->Form->control('texto', ['label' => 'Documentação do projeto', 'class' => 'form-control tiny']); ?>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo $this->Html->link('Cancelar', ['action' => 'view',$projeto->id], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Criar</button>
</div>
<?= $this->Form->end() ?>
<script>
    $(".file-upload-edit").fileinput({
        showUpload: false,
        showCancel: false,
        fileActionSettings: {
            showZoom: true,
            showRotate: false
        },
        browseLabel: 'Selecionar Imagem',
        removeLabel: 'Remover',
        initialPreviewAsData: true, // trata o preview como src da imagem
        <?php if($projeto->banner): ?>
        initialPreview: [
            <?= json_encode($this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)) ?>
        ],
        <?php else:?>
        initialPreview: [
            <?= json_encode($this->Url->build('/img/default-project.jpg')) ?>
        ],
        <?php endif; ?>

        initialPreviewConfig: [
            {
                caption: <?= json_encode($projeto->banner) ?>,
                key: 1,
                showRemove: false
            }
        ],
        overwriteInitial: true, // substitui a imagem ao selecionar nova
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif']
    });
</script>
