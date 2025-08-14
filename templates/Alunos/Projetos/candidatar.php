<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Animal $animal
 * @var \Cake\Collection\CollectionInterface|string[] $especies
 */
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Projeto: <?= $projeto->nome ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body view-detalhes">

    <div class="view-detalhes">
        <h5>Selecione uma vaga:</h5>
        <div class="accordion">
            <?php foreach ($projeto->funcoes as $funcao): ?>
                <div class="d-flex bg-light-rounded justify-content-between p-2 mb-2" toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <p class="m-0 texto-menor"><?= $funcao->nome ?></p>
                    <span
                        class="<?= count($funcao->usuarios) == $funcao->quantidade ? 'text-primary' : 'text-success' ?>"><i
                            class="fas fa-users"></i> <?= count($funcao->usuarios) ?> / <?= $funcao->quantidade ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>


<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>

