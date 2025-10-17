<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="row">
    <div class="col-md-9">
        <?php if ($projeto->status != 1): ?>
            <?php if ($ehMembro): ?>
                <div class="d-flex justify-content-end flex-wrap gap-2 mb-3">
                    <?= $this->Html->link('<i class="fas fa-edit"></i> Editar Projeto', ['controller' => 'Projetos', 'action' => 'edit', $projeto->id], ['escape' => false, 'class' => 'btn btn-info mx-1 mb-1']) ?>
                    <?php if ($usuarioLogado->grupo_id == 2): ?>
                        <?= $this->Html->link('<i class="fas fa-signature"></i> Validar e Concluir Projeto', ['controller' => 'Projetos', 'action' => 'validar', $projeto->id], ['escape' => false, 'class' => 'btn btn-success mx-1 mb-1']) ?>
                    <?php endif; ?>
                </div>
            <?php elseif ($usuarioLogado->grupo_id == 2): ?>
                <div class="text-right mb-3">
                    <?= $this->Html->link('<i class="fas fa-edit"></i> Orientar Projeto', ['controller' => 'Funcoes', 'action' => 'orientar', $projeto->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-right mb-3">
                <div class="btn btn-success">
                    <span>Projeto Concluído!</span> <i class="fas fa-check"></i>
                </div>
            </div>
        <?php endif; ?>

        <h2><?= h($projeto->nome) ?></h2>

        <div class="row">
            <div class="col-md-6">
                <label>Descrição</label>
                <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                    <?= h($projeto->descricao) ?>
                </div>
            </div>
            <div class="col-md-6">
                <label>Objetivo</label>
                <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                    <?= h($projeto->objetivo ?? $projeto->objetvo) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- COLUNA LATERAL -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header text-center p-0">
                <?php if ($ehMembro && $projeto->status != 1): ?>
                    <?= $this->Html->link('Gerenciar Membros', ['controller' => 'Usuarios', 'action' => 'membros', $projeto->id], ['class' => 'btn btn-primary w-100']) ?>
                <?php else: ?>
                    <span class="btn btn-primary w-100">Lista de Membros</span>
                <?php endif; ?>
            </div>
            <div class="card-body pt-0 pb-0">
                <?php foreach ($membros as $membro): ?>
                    <small class="text-secondary"><i><?= implode(' / ', $membro['funcoes']) ?></i></small>
                    <p class="mb-0 pb-0"><?= h($membro['nome']) ?></p>
                    <hr class="mb-2 mt-2">
                <?php endforeach; ?>
            </div>
        </div>

        <hr>

        <?php if ($projeto->status != 1): ?>
            <div class="card">
                <div class="card-header text-center p-0">
                    <?php if ($ehMembro): ?>
                        <?= $this->Html->link('Gerenciar Funções', ['controller' => 'Funcoes', 'action' => 'index', $projeto->id], ['class' => 'btn btn-primary w-100']) ?>
                    <?php else: ?>
                        <span class="btn btn-primary w-100">Vagas Disponíveis</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <?php foreach ($funcoes as $funcao): ?>
                        <?php
                        $completa = $funcao->total_usuarios == $funcao->quantidade;
                        $classeTexto = $completa ? 'text-success' : 'text-primary';
                        $conteudo = sprintf(
                            '<div class="d-flex justify-content-between">
                                <span>%s</span>
                                <span class="%s"><i class="fas fa-users"></i> %d / %d</span>
                             </div>',
                            h($funcao->nome),
                            $classeTexto,
                            $funcao->total_usuarios,
                            $funcao->quantidade
                        );
                        if (!$ehMembro && !$completa && $usuarioLogado->grupo_id != 2) {
                            $conteudo = $this->Html->link($conteudo,
                                ['controller' => 'Funcoes', 'action' => 'candidatar', $funcao->id],
                                ['escape' => false, 'title' => 'Visualizar', 'data-toggle' => 'modal', 'data-target' => '.view']
                            );
                        }
                        ?>
                        <?= $conteudo ?>
                        <hr class="mb-2 mt-2">
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- DESCRIÇÃO GERAL -->
<div class="row mt-4">
    <div class="col-md-12">
        <label>Documentação do Projeto</label>
        <div class="mb-2 p-2 bg-light border rounded shadow-sm">
            <?= $this->Text->autoParagraph(h($projeto->texto)) ?>
        </div>
    </div>
</div>

<!-- GALERIA DE IMAGENS COM FANCYBOX -->
<?php if (!empty($projeto->imagens)): ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Galeria de Imagens</h5>
            <div class="d-flex flex-wrap gap-3">
                <?php foreach ($projeto->imagens as $imagem): ?>
                    <?php
                    // Certifique-se de que $urlImagem está gerando o caminho completo e correto
                    $urlImagem = $this->Url->build('/uploads/projetos/' . $projeto->id . '/galeria/' . $imagem->nome, ['fullBase' => true]);
                    ?>
                    <div class="position-relative border rounded shadow-sm"
                         style="width:180px; height:120px; overflow:hidden;">
                        <a data-fancybox="galeria"
                           href="<?= $urlImagem ?>">
                            <img src="<?= $urlImagem ?>"
                                 alt="Imagem do Projeto"
                                 class="img-fluid w-100 h-100"
                                 style="object-fit:cover;">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- DOCUMENTOS -->
<?php if (!empty($projeto->documentos)): ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Documentos Anexados</h5>
            <ul class="list-group">
                <?php foreach ($projeto->documentos as $doc): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-file-alt text-secondary"></i>
                            <?= h($doc->nome) ?>
                        </div>
                        <div>
                            <?= $this->Html->link('<i class="fas fa-download"></i>',
                                '/files/documentos/' . h($doc->arquivo),
                                ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary', 'download' => true]
                            ) ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<script>
    // Usa um listener para garantir que o Fancybox só seja executado
    // DEPOIS que todos os elementos HTML (como a galeria) foram carregados.
    document.addEventListener("DOMContentLoaded", function() {
        Fancybox.bind('[data-fancybox="galeria"]', {
            Thumbs: { autoStart: true },
            Toolbar: { display: ["zoom", "close"] },
            hideScrollbar: false,
            animated: true,
            trapFocus: true,
            groupAll: true,
            // type: "image", // Recomendado remover, pois deduz do href
        });
    });
</script>
