<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificaco $notificaco
 */
?>
<div class="card card-primary shadow-sm">
    <div class="card-header">
        <h2><?= $notificaco->funco->projeto->nome ?></h2>
    </div>
    <div class="card-body">
        <div class="view-detalhes">
            <h5>Vaga: <?= $notificaco->funco->nome ?></h5>
            <p><?= $notificaco->funco->descricao ?></p>
            <h5>Requisitos</h5>
            <div class="accordion">
                <?php foreach ($notificaco->funco->habilidades as $habilidade): ?>
                    <p class="d-inline-block<?= in_array($habilidade->id, $habilidadesEmissorIds) ? ' text-confirmado-bg-green' : ' text-concluido-bg-grey' ?>">
                        <?= h($habilidade->nome) ?>
                    </p>
                <?php endforeach; ?>
            </div>
            <label>Mensagem:</label>
            <div class="mb-2 p-2 bg-light border rounded shadow-sm">
                <p><?= $notificaco->mensagem ?></p>
            </div>
        </div>
        <div class="text-right">
            <?= $this->Html->link('Recusar', ['controller' => 'Notificacoes', 'action' => 'recusar', $notificaco->id,$notificaco->funco->id], ['class' => 'btn btn-outline-danger']) ?>
            <?= $this->Html->link('Aprovar', ['controller' => 'Notificacoes', 'action' => 'aprovar', $notificaco->id], ['class' => 'btn btn-outline-success']) ?>
        </div>
    </div>
</div>
