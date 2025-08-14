<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="row">
    <div class="col-md-9">
        <?php if ($ehMembro): ?>
            <div class="text-right">
                <?= $this->Html->link(' <i class="fas fa-edit"></i> Editar Projeto', ['controller' => 'Projetos', 'action' => 'edit', $projeto->id], ['escape' => false, 'class' => 'btn btn-info']) ?>
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
                <?php if ($ehMembro): ?>
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

                    // Define conteúdo base
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

                    // Se não for membro e houver vaga, vira link
                    if (!$ehMembro && !$completa) {
                        $conteudo = $this->Html->link($conteudo, ['controller' => 'Funcoes', 'action' => 'candidatar', $funcao->id], [
                            'escape' => false,
                            'title' => 'Visualizar',
                            'data-tooltip' => 'tooltip',
                            'data-toggle' => 'modal',
                            'data-target' => '.view'
                        ]);
                    }
                    ?>

                    <?= $conteudo ?>
                    <hr class="mb-2 mt-2">
                <?php endforeach; ?>

            </div>
        </div>
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
