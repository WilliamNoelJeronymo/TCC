<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Projeto> $projetos
 */
?>
<div class="row">
    <?php foreach ($projetos as $projeto): ?>
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
                    </p>
                    <p class="text-secondary text-info-projetos"><span class="icone-fixo"><i
                                class="fas fa-map-marker-alt"></i></span> Faeterj-Petrópolis</p>
                    <p class="text-secondary text-info-projetos"><span class="icone-fixo"><i
                                class="far fa-calendar-alt"></i> </span>
                        Início <?= $projeto->created->format('d/m/Y') ?>
                    </p>
                    <p class="text-secondary text-info-projetos">
                        <span class="icone-fixo"><i class="fas fa-users"></i> </span>
                        <?= $projeto->total_vagas_disponiveis ?> vaga(s) disponível(is)
                    </p>
                    <?php foreach ($projeto->funcoes as $funcao): ?>
                        <div class="d-flex bg-light-rounded justify-content-between p-2 mb-2">
                            <p class="m-0 texto-menor"><?= $funcao->nome ?></p>
                            <span
                                class="<?= count($funcao->usuarios) == $funcao->quantidade ? 'text-primary' : 'text-success' ?>"><i
                                    class="fas fa-users"></i> <?= count($funcao->usuarios) ?> / <?= $funcao->quantidade ?></span>
                        </div>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-between">
                        <p class="texto-menor text-blue"><?=$projeto->orientador ?'Prof. '.$projeto->orientador:'Sem Orientador'?></p>
                        <?= $this->Html->link(
                            'Candidatar-se',
                            ['controller' => 'Projetos', 'action' => 'view', $projeto->id],
                            ['class' => 'btn btn-primary btn-sm']
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
