<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="card card-primary shadow-sm">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between flex-wrap">
            <!-- Foto e nome dentro do círculo -->
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="position-relative text-center mr-4">
                    <?= $this->Html->image(
                        $usuario->foto ? '/uploads/alunos/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto :
                            '/img/default-user.jpg',
                        ['class' => 'img-fluid rounded-circle', 'alt' => 'Foto do usuário',
                            'style' => 'width:120px; height:120px; border: 4px solid rgba(65,152,255,0.6); padding: 3px; object-fit: cover;']
                    ) ?>
                </div>

                <!-- Dados do usuário -->
                <div class="ml-4">
                    <h3 class="font-weight-bold"><?= h($usuario->nome) ?></h3>
                    <div class="text-muted d-flex flex-wrap">
                        <p class="mr-4 mb-0"><i class="far fa-user mr-1"></i> Matrícula: <?= h($usuario->matricula) ?>
                        </p>
                        <p class="mr-4 mb-0"><i class="fas fa-map-marker-alt mr-1"></i> Faeterj-Petrópolis</p>
                        <p class="mb-0"><i class="far fa-calendar-alt mr-1"></i>
                            Desde <?= $usuario->created->format('m/Y') ?></p>
                    </div>
                </div>
            </div>

            <!-- Botão Currículo -->
            <?php if ($usuario->grupos_id == 2): ?>
                <div class="text-md-right">
                    <?= $this->Html->link('<i class="fas fa-download mr-1"></i> Gerar Currículo',
                        ['controller' => 'Usuarios', 'action' => 'curriculo', $usuario->id],
                        ['class' => 'btn btn-primary', 'escape' => false]) ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($usuario->grupos_id == 2): ?>
            <!-- Perfil Privado -->
            <div class="mt-4 p-3 bg-light rounded d-flex align-items-center">
                <i id="perfil-icon" class="fas fa-user-lock text-muted mr-2"></i>
                <span id="perfil-text">Perfil Privado</span>
                <label class="switch ml-3 mb-0">
                    <input type="checkbox" id="perfil-toggle" <?= $usuario->perfil_privado ? 'checked' : '' ?>>
                    <span class="slider round"></span>
                </label>
                <small class="text-muted ml-2" id="perfil-text-2">Apenas para você</small>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php if ($usuario->grupos_id == 2): ?>
    <!--Habilidades-->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4><i class="fas fa-cog"></i> Habilidades</h4>
                <?= $this->Html->link('<i class="fas fa-cogs"></i> Gerênciar habilidades',
                    ['controller' => 'Usuarios', 'action' => 'habilidades'],
                    ['class' => 'btn btn-primary', 'escape' => false]) ?>
            </div>

            <?php foreach ($usuario->habilidades as $habilidade): ?>
                <p style="display: inline-block" class="text-concluido-bg-grey"><?= $habilidade->nome ?></p>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<!--Projetos-->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h6><i class="fas fa-wrench"></i> Projetos em que participa</h6>
        </div>
    </div>
    <div class="row">
        <?php foreach ($funcoesPorProjeto as $grupo): ?>
            <?php
            $projeto = $grupo['projeto'];
            $listaDeFuncoes = $grupo['funcoes'];
            ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <?php
                    $urlBanner = !empty($projeto->banner)
                        ? $this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)
                        : '/img/default-project.jpg';
                    ?>
                    <div class="card-img p-3">
                        <div class="project-banner" style="
                            background-image: url('<?= h($urlBanner) ?>');
                            "></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 style="font-weight: 500"><?= h($projeto->nome) ?></h5>
                            <?php if ($projeto->status == 2): ?>
                                <span class="text-confirmado-bg-green">Em andamento</span>
                            <?php elseif ($projeto->status == 1): ?>
                                <p class="text-concluido-bg-grey">Concluído</p>
                            <?php endif; ?>
                        </div>
                        <p class="text-secondary">
                            <?= h($this->Text->truncate($projeto->descricao, 200, [
                                'ellipsis' => '…',
                                'exact' => false // não corta no meio da palavra
                            ])) ?>
                        </p> <?php
                        $nomes = array_map(fn($f) => $f->nome, $listaDeFuncoes);
                        ?>
                        <div class="d-flex justify-content-between">
                            <p style="color: rgb(37 99 235)"><?= h(implode(' / ', $nomes)) ?></p>
                            <p class="text-muted mt-2">
                                Desde <?= h($projeto->created->format('d/m/Y')) ?>
                            </p>
                        </div>

                        <?= $this->Html->link(
                            'Ver Projeto',
                            ['controller' => 'Projetos', 'action' => 'view', $projeto->id],
                            ['class' => 'btn btn-primary btn-sm']
                        ) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        function atualizarStatusPerfil() {
            const $icon = $('#perfil-icon');
            const $text = $('#perfil-text');
            const $text2 = $('#perfil-text-2');
            const isPublico = $('#perfil-toggle').is(':checked');

            if (isPublico) {
                $icon.removeClass('fa-user-lock text-muted').addClass('fa-globe text-success');
                $text.text('Perfil Público');
                $text2.text('Disponível para recrutadores');
            } else {
                $icon.removeClass('fa-globe text-success').addClass('fa-user-lock text-muted');
                $text.text('Perfil Privado');
                $text2.text('Apenas para você');
            }
        }

        // Atualiza ao carregar a página (caso o perfil já esteja público)
        atualizarStatusPerfil();

        // Atualiza ao alternar
        $('#perfil-toggle').on('change', atualizarStatusPerfil);
    });
</script>
