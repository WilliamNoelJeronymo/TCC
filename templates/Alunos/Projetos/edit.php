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
            <?= $this->Form->control('objetvo', [
                'label' => 'Objetivo a ser alcançado com o projeto',
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= $this->Form->control('descricao', [
                'label' => 'Uma breve descrição do projeto',
                'class' => 'form-control'
            ]); ?>
        </div>
    </div>

    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            Não é necessário a documentação do projeto para a criação, pois deverá ser preenchida conforme o avanço do projeto
        </div>
        <div class="form-group">
            <?= $this->Form->control('texto', [
                'label' => 'Documentação do projeto',
                'class' => 'form-control tiny'
            ]); ?>
        </div>
    </div>

    <div class="col-md-12">
        <label>Documentos do Projeto</label>
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
                        <?= h($doc->nome) ?>
                        <span>
                            <?= $this->Html->link('Baixar', '/uploads/projetos/' . $projeto->id . '/documentos/' . $doc->nome, [
                                'class' => 'btn btn-sm btn-primary',
                                'target' => '_blank'
                            ]) ?>
                            <?= $this->Form->postLink('Excluir', [
                                'controller' => 'Documentos',
                                'action' => 'delete',
                                $doc->id
                            ], [
                                'confirm' => 'Tem certeza que deseja excluir este documento?',
                                'class' => 'btn btn-sm btn-danger'
                            ]) ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
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
        <?php if($projeto->banner): ?>
        initialPreview: [
            <?= json_encode($this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)) ?>
        ],
        initialPreviewConfig: [
            { caption: <?= json_encode($projeto->banner) ?>, key: 1, showRemove: false }
        ],
        <?php else:?>
        initialPreview: [
            <?= json_encode($this->Url->build('/img/default-project.jpg')) ?>
        ],
        <?php endif; ?>
        overwriteInitial: true,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif']
    });
</script>
