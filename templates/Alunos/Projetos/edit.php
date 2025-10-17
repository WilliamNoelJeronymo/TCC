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
        <div class="form-group">
            <?= $this->Form->control('texto', [
                'label' => 'Documentação do projeto',
                'class' => 'form-control tiny'
            ]); ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- DOCUMENTOS -->
    <div class="col-md-12">
        <h5><i class="fas fa-file-alt"></i> Documentos do Projeto</h5>

        <?= $this->Form->control('documentos[]', [
            'type' => 'file',
            'multiple' => true,
            'label' => false,
            'class' => 'form-control file-upload'
        ]); ?>

        <?php if (!empty($projeto->documentos)): ?>
            <ul class="list-group mt-3" id="lista-documentos">
                <?php foreach ($projeto->documentos as $doc): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center"
                        id="doc-<?= $doc->id ?>">
                        <span><i class="far fa-file"></i> <?= h($doc->nome) ?></span>
                        <div class="btn-group">
                            <a href="<?= $this->Url->build("/uploads/projetos/{$projeto->id}/documentos/{$doc->nome}") ?>"
                               target="_blank" class="btn btn-sm btn-primary">
                                <i class="fas fa-download"></i> Baixar
                            </a>
                            <button type="button"
                                    class="btn btn-sm btn-danger btn-delete-doc"
                                    data-id="<?= $doc->id ?>">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="alert alert-light mt-2 text-muted">Nenhum documento enviado.</div>
        <?php endif; ?>
    </div>
</div>

<hr class="my-4">

<div class="row">
    <!-- GALERIA DE IMAGENS -->
    <div class="col-md-12">
        <h5><i class="fas fa-images"></i> Galeria de Imagens</h5>

        <?= $this->Form->control('imagens[]', [
            'type' => 'file',
            'multiple' => true,
            'label' => false,
            'class' => 'form-control file-upload'
        ]); ?>

        <?php if (!empty($projeto->imagens)): ?>
            <div class="row mt-3" id="galeria-imagens">
                <?php foreach ($projeto->imagens as $img): ?>
                    <div class="col-md-3 mb-3" id="img-<?= $img->id ?>">
                        <div class="card shadow-sm">
                            <img
                                src="<?= $this->Url->build('/uploads/projetos/' . $projeto->id . '/galeria/' . $img->nome) ?>"
                                class="card-img-top img-fluid"
                                style="max-height: 150px; object-fit: cover;">
                            <div class="card-body text-center p-2">
                                <a href="<?= $this->Url->build('/uploads/projetos/' . $projeto->id . '/galeria/' . $img->nome) ?>"
                                   target="_blank"
                                   class="btn btn-sm btn-primary mb-1 w-100">
                                    <i class="fas fa-eye"></i> Visualizar
                                </a>
                                <button type="button"
                                        class="btn btn-sm btn-danger w-100 btn-delete-img"
                                        data-id="<?= $img->id ?>">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-light mt-2 text-muted">Nenhuma imagem enviada.</div>
        <?php endif; ?>
    </div>
</div>

<hr class="my-4">

<div class="text-right">
    <?= $this->Html->link('Cancelar', ['action' => 'view', $projeto->id], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Salvar
    </button>
</div>

<?= $this->Form->end() ?>


<!-- 🔻 SweetAlert + AJAX -->
<script>
    $(".file-upload-edit").fileinput({
        showUpload: false,
        showCancel: false,
        fileActionSettings: {showZoom: true, showRotate: false},
        browseLabel: 'Selecionar Imagem',
        removeLabel: 'Remover',
        initialPreviewAsData: true, <?php if ($projeto->banner): ?>
        initialPreview: [<?= json_encode($this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)) ?>],
        initialPreviewConfig: [{
            caption: <?= json_encode($projeto->banner) ?>,
            key: 1,
            showRemove: false
        }], <?php else: ?>
        initialPreview: [<?= json_encode($this->Url->build('/img/default-project.jpg')) ?>], <?php endif; ?>
        overwriteInitial: true,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif']
    });
    $(function () {
        function alertar(tipo, titulo, texto) {
            Swal.fire({
                icon: tipo,
                title: titulo,
                text: texto,
                confirmButtonColor: '#3085d6',
                timer: 2500,
                showConfirmButton: false
            });
        }

        // Excluir Documento
        $(".btn-delete-doc").on("click", function () {
            const id = $(this).data("id");

            Swal.fire({
                title: 'Excluir documento?',
                text: "Esta ação não poderá ser desfeita.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= $this->Url->build(['controller' => 'Documentos', 'action' => 'delete']) ?>/" + id,
                        method: "POST",
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')

                        },
                        success: function (res) {
                            if (res.success) {
                                $("#doc-" + id).fadeOut(400, function () {
                                    $(this).remove();
                                });
                                alertar('success', 'Sucesso!', res.mensagem || 'Documento excluído.');
                            } else {
                                alertar('error', 'Erro', res.mensagem || 'Erro ao excluir documento.');
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            alertar('error', 'Erro', 'Falha de comunicação com o servidor.');
                        }
                    });
                }
            });
        });

        // Excluir Imagem
        $(".btn-delete-img").on("click", function () {
            const id = $(this).data("id");

            Swal.fire({
                title: 'Excluir imagem?',
                text: "A imagem será removida permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= $this->Url->build(['controller' => 'Imagens', 'action' => 'delete']) ?>/" + id,
                        method: "POST",
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
                        },
                        success: function (res) {
                            if (res.success) {
                                $("#img-" + id).fadeOut(400, function () {
                                    $(this).remove();
                                });
                                alertar('success', 'Sucesso!', res.mensagem || 'Imagem excluída.');
                            } else {
                                alertar('error', 'Erro', res.mensagem || 'Erro ao excluir imagem.');
                            }
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            alertar('error', 'Erro', 'Falha de comunicação com o servidor.');
                        }
                    });
                }
            });
        });
    });
</script>


