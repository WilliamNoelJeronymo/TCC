<!-- Modal -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><?= $usuario->nome ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <?= $this->Html->image('/' . UPLOAD_ALUNOS . '/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto, ['class' => '']) ?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <label>Nome</label>
                    <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                        <span><?= $usuario->nome ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>E-mail</label>
                    <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                        <span><?= $usuario->email ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Matrícula</label>
                    <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                        <span><?= $usuario->matricula ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Grupo</label>
                    <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                        <span><?= $usuario->grupo->nome ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>
