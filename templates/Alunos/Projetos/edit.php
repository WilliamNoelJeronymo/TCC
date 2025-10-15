<?= $this->Form->create($projeto, ['type' => 'file']) ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?= $this->Form->control('categorias._ids', [
                'label' => 'Categoria do Projeto',
                'options' => $categorias,
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?= $this->Form->control('nome', [
                'label' => 'Nome do projeto',
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $this->Form->control('imagem', [
            'label' => 'Banner para divulgação do projeto',
            'type' => 'file',
            'class' => 'file-upload-edit',
            'required' => false
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('objetvo', [
                'label' => 'Objetivo a ser alcançado com o projeto',
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('descricao', [
                'label' => 'Uma breve descrição do projeto',
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            Não é necessário a documentação do projeto para a criação, pois deverá ser preenchida conforme o avanço do
            projeto
        </div>
        <div class="form-group">
            <?= $this->Form->control('texto', [
                'label' => 'Documentação do projeto',
                'class' => 'form-control tiny'
            ]); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <span> <strong>Documentos do Projeto</strong></span>
        <?= $this->Form->control('documentos[]', [
            'type' => 'file',
            'multiple' => true,
            'label' => false,
            'class' => 'form-control file-upload'
        ]); ?>
        <?php if (!empty($projeto->documentos)): ?>
            <ul class="list-group mt-2">
                <?php foreach ($projeto->documentos as $doc): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?= h($doc->nome) ?></span>
                        <span>
                        <a href="<?= $this->Url->build("/uploads/projetos/" . $projeto->id . "/documentos/" . $doc->nome) ?>"
                           target="_blank" class="btn btn-sm btn-primary">
                            Baixar
                        </a>
                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Documentos', 'action' => 'delete', $doc->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('VocÊ tem certeza que quer deletar o documento: {0}?', $doc->id)]) ?>
                            </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-4">
        <label>Galeria de Imagens</label>
        <?= $this->Form->control('imagens[]', [
            'type' => 'file',
            'multiple' => true,
            'label' => false,
            'class' => 'form-control file-upload'
        ]); ?>

        <?php if (!empty($projeto->imagens)): ?>
            <div class="row mt-3">
                <?php foreach ($projeto->imagens as $img): ?>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="card">
                            <img
                                src="<?= $this->Url->build('/uploads/projetos/' . $projeto->id . '/galeria/' . $img->nome) ?>"
                                class="card-img-top img-fluid"
                                style="max-height: 150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Imagens', 'action' => 'delete', $img->id, $projeto->id], ['class' => 'btn btn-sm w-100 btn-danger', 'confirm' => __('VocÊ tem certeza que quer deletar o imagem: {0}?', $img->id)]) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="text-right mt-3">
    <?= $this->Html->link('Cancelar', ['action' => 'view', $projeto->id], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Salvar</button>
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
        initialPreviewAsData: true,
        <?php if ($projeto->banner): ?>
        initialPreview: [
            <?= json_encode($this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)) ?>
        ],
        initialPreviewConfig: [
            {caption: <?= json_encode($projeto->banner) ?>, key: 1, showRemove: false}
        ],
        <?php else: ?>
        initialPreview: [
            <?= json_encode($this->Url->build('/img/default-project.jpg')) ?>
        ],
        <?php endif; ?>
        overwriteInitial: true,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif']
    });
</script>
