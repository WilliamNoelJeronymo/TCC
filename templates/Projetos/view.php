<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="container">
    <div class="row">
        <!-- Coluna da esquerda -->
        <div class="col-md-8">
            <!-- Banner e informações principais -->
            <div class="card">
                <div class="card-header">
                    <div class="card-img">
                        <?= $this->Html->image(
                            '/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner,
                            ['class' => 'img-fluid w-100']
                        ) ?>
                    </div>
                    <div class="card-body">
                        <h2><?= h($projeto->nome) ?></h2>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="texto-menor text-secondary">
                                <i class="fa-fw fas fa-map-pin texto-azul-claro"></i> Faeterj - Petrópolis
                            </p>
                            <p class="texto-menor text-secondary">
                                <i class="fa-fw far fa-calendar texto-azul-claro"></i>
                                <?= h($projeto->created->format('d/m/Y')) ?>
                                - <?= h($projeto->modified->format('d/m/Y')) ?>
                            </p>
                        </div>
                        <?php foreach ($projeto->categorias as $categoria): ?>
                            <span class="text-categorias-bg-grey d-inline-block"><?= h($categoria->nome) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Descrição -->
            <div class="card mt-3">
                <div class="card-body">
                    <h3>Descrição do Projeto</h3>
                    <p class="text-secondary"><?= h($projeto->descricao) ?></p>
                    <hr>
                    <h5>Objetivo</h5>
                    <p class="text-secondary"><?= h($projeto->objetvo ?? '') ?></p>
                    <hr>
                    <h5>Documentação</h5>
                    <p class="text-secondary"><?= $projeto->texto ?></p>
                </div>
            </div>

            <!-- Funções e Participantes -->
            <div class="card mt-3">
                <div class="card-body">
                    <h3>Funções e Participantes</h3>
                    <?php foreach ($projeto->funcoes as $funcao): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p><strong><?= h($funcao->nome) ?></strong></p>
                                <small><?= h($funcao->descricao) ?></small>
                                <div class="mt-2">
                                    <small><strong>Participantes</strong></small>
                                </div>
                                <?php if ($funcao->usuarios): ?>
                                    <?php foreach ($funcao->usuarios as $usuario): ?>
                                        <div
                                            class="card-body text-categorias-bg-grey d-flex justify-content-between align-items-center">
                                            <div class="user-panel d-flex align-items-center">
                                                <div class="image mr-2">
                                                    <?php if ($usuario->foto): ?>
                                                        <?= $this->Html->image(
                                                            '/uploads/alunos/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto,
                                                            ['class' => 'img-circle elevation-2', 'alt' => 'user image']
                                                        ) ?>
                                                    <?php else: ?>
                                                        <?= $this->Html->image(
                                                            '/img/default-user.jpg',
                                                            ['class' => 'img-circle elevation-2', 'alt' => 'user image']
                                                        ) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="info">
                                                    <?= h($usuario->nome) ?>
                                                </div>
                                            </div>

                                            <?= $this->Html->link(
                                                'Currículo',
                                                ['controller' => 'Usuarios', 'action' => 'curriculo', $usuario->id],
                                                ['class' => 'btn btn-primary ml-auto']
                                            ) ?>
                                        </div>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Coluna da direita -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fas fa-user"></i> Orientador</h4>
                    <p><?= $projeto->orientador ? 'Prof. ' . h($projeto->orientador) : 'O projeto não possuí um orientador' ?></p>
                </div>
            </div>
            <?php if ($projeto->documentos): ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4><i class="fas fa-file-alt"></i> Documentos</h4>
                        <?php foreach ($projeto->documentos as $documento): ?>
                            <?= $this->Html->link($documento->nome . ' <i class="fas fa-download"></i>',
                                '/uploads/projetos/' . $projeto->id . '/documentos/' . h($documento->nome),
                                ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary w-100 mt-4', 'target' => '_blank']
                            ) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($projeto->imagens)): ?>
                <h4><i class="far fa-images"></i> Galeria de Imagens</h4>
                <div class="d-flex flex-wrap gap-3">
                    <?php foreach ($projeto->imagens as $imagem): ?>
                        <?php
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
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    // Usa um listener para garantir que o Fancybox só seja executado
    // DEPOIS que todos os elementos HTML (como a galeria) foram carregados.
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind('[data-fancybox="galeria"]', {
            Thumbs: {autoStart: true},
            Toolbar: {display: ["zoom", "close"]},
            hideScrollbar: false,
            animated: true,
            trapFocus: true,
            groupAll: true,
            // type: "image", // Recomendado remover, pois deduz do href
        });
    });
</script>
