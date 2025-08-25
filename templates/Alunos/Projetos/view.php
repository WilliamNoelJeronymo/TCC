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
                <div class="d-flex justify-content-end">
                    <div class="text-right mx-2">
                        <?= $this->Html->link(' <i class="fas fa-edit"></i> Editar Projeto', ['controller' => 'Projetos', 'action' => 'edit', $projeto->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
                    </div>
                    <?php if ($usuarioLogado->grupo_id == 2): ?>
                        <div class="text-right mx-2">
                            <?= $this->Html->link('<i class="fas fa-signature"></i> validar e concluir Projeto', ['controller' => 'Projetos', 'action' => 'validar', $projeto->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <?php if ($usuarioLogado->grupo_id == 2): ?>
                    <div class="text-right">
                        <?= $this->Html->link(' <i class="fas fa-edit"></i> Orientar Projeto', ['controller' => 'Funcoes', 'action' => 'orientar', $projeto->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-right">
                <div class="btn btn-success">
                    <span>Projeto Conlcuido!</span> <i class="fas fa-check"></i>
                </div>
            </div>
        <?php endif; ?>
        <h2><?= $projeto->nome ?></h2>
        <div class="row">
            <div class="col-md-6">
                <label>Descrição</label>
                <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                    <span><?= $projeto->descricao ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <label>Objetivo</label>
                <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                    <span><?= $projeto->objetvo ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header text-center m-0 p-0">
                <?php if ($ehMembro && $projeto->status != 1): ?>
                    <?= $this->Html->link('Gerenciar Membros', ['controller' => 'Usuarios', 'action' => 'membros', $projeto->id], ['class' => 'btn btn-primary w-100']) ?>
                <?php else: ?>
                    <span class="btn btn-primary w-100">Lista de membros</span>
                <?php endif; ?>
            </div>
            <div class="card-body pt-0 pb-0">
                <?php foreach ($membros as $membro): ?>
                    <small class="text-secondary"><i>
                            <?= implode(' / ', $membro['funcoes']) ?>
                        </i></small>
                    <p class="mb-0 pb-0"><?= $membro['nome'] ?></p>
                    <hr class="mb-2 mt-2">

                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <?php if ($projeto->status != 1): ?>
            <div class="card">
                <div class="card-header text-center m-0 p-0">
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

                        // Conteúdo base (sem link)
                        $conteudo = sprintf(
                            '<div class="d-flex justify-content-between">
            <span class="mb-0 pb-0">%s</span>
            <span class="%s"><i class="fas fa-users"></i> %d / %d</span>
        </div>',
                            h($funcao->nome),
                            $classeTexto,
                            $funcao->total_usuarios,
                            $funcao->quantidade
                        );

                        // Se não for membro, houver vaga e usuário não for 2 → vira link
                        if (!$ehMembro && !$completa && $usuarioLogado->grupo_id != 2) {
                            $conteudo = $this->Html->link($conteudo,
                                ['controller' => 'Funcoes', 'action' => 'candidatar', $funcao->id], ['escape' => false,
                                    'title' => 'Visualizar',
                                    'data-tooltip' => 'tooltip',
                                    'data-toggle' => 'modal',
                                    'data-target' => '.view']
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
<div class="row">
    <div class="col-md-12">
        <label>Documentação do Projeto</label>
        <div class="mb-2 p-2 bg-light border rounded shadow-sm">
            <span><?= $projeto->texto ?></span>
        </div>
    </div>
</div>
