<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animal $animal
 * @var \Cake\Collection\CollectionInterface|string[] $especies
 */
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Projeto: <?= $funcao->projeto->nome ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body view-detalhes">

    <div class="view-detalhes">
        <h5>Vaga: <?=$funcao->nome?></h5>
        <p><?=$funcao->descricao?></p>
        <h5>Requisitos desejáveis</h5>
        <div class="accordion">
            <?php foreach ($funcao->habilidades as $habilidade): ?>
                <p class="d-inline-block<?= in_array($habilidade->id, $habilidadesUsuario) ? ' text-confirmado-bg-green' : ' text-concluido-bg-grey' ?> "><?= $habilidade->nome ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->Form->create(null, [
    'url' => ['controller' => 'Notificacoes', 'action' => 'add'],
    'class' => 'pl-4 pr-4 pb-4'
]) ?>
<div class="form-group">
    <?= $this->Form->control('mensagem', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'Porquê você se encaixa nessa vaga?']) ?>
</div>
<div class="text-right">
    <button type="submit" class="btn btn-success">Enviar Solicitação</button>
</div>
<?= $this->Form->end() ?>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>

