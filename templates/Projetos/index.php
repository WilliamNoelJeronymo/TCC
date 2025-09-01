<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Projeto> $projetos
 */
?>
<div class="d-flex justify-content-center align-items-center flex-column bg-gradient-faeterj text-white">
    <h1 class="text-center mt-4">Descubra Projetos <br>Inovadores</h1>
    <h4 class="w-50 mt-4 text-center">Explore projetos extracurriculares desenvolvidos pelos alunos da FAETERJ.
        Tecnologia,
        inovação e conhecimento em ação.</h4>
    <div class="mt-4">
        <?= $this->Html->link('Explorar Projetos <i class="fas fa-arrow-right"></i>', ['controller' => '', 'action' => ''], ['escape' => false, 'class' => 'btn btn-home']) ?>
        <?= $this->Html->link('Cadastrar Projetos', ['controller' => '', 'action' => ''], ['class' => 'btn btn-home']) ?>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="p-5 text-center">
            <i class="numeros-home p-3 fas fa-code"></i>
            <h5>150</h5>
            <p>Projetos Ativos</p>
        </div>
        <div class="p-5 text-center">
            <i class="numeros-home p-3 fas fa-users"></i>
            <h5>150</h5>
            <p>Alunos participantes</p>
        </div>
        <div class="p-5 text-center">
            <i class="numeros-home p-3 fas fa-medal"></i>
            <h5>150</h5>
            <p>Projetos concluidos</p>
        </div>
    </div>
</div>
<div class="row">
    <?php foreach ($projetos as $projeto): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm card-projetos">
                <?php
                $urlBanner = !empty($projeto->banner)
                    ? $this->Url->build('/uploads/projetos/' . $projeto->id . '/imagens/' . $projeto->banner)
                    : '/img/default-project.jpg';
                ?>
                <div class="card-img p-3">
                    <div class="project-banner p-3" style="
                        background-image: url('<?= h($urlBanner) ?>');
                        ">
                        <?php if ($projeto->status == 2): ?>
                            <span class="text-concluido-bg-orange">Em andamento</span>
                        <?php elseif ($projeto->status == 1): ?>
                            <span class="text-confirmado-bg-green">Concluído</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <h5 style="font-weight: 500"><?= h($projeto->nome) ?></h5>
                    </div>
                    <p class="text-secondary texto-menor">
                        <?= h($this->Text->truncate($projeto->descricao, 200, [
                            'ellipsis' => '…',
                            'exact' => false // não corta no meio da palavra
                        ])) ?>
                    </p>
                    <p class="texto-menor text-secondary">
                        <i class="fa-fw fas fa-map-pin texto-azul-claro"></i> Faeterj - Petrópolis
                    </p>
                    <p class="texto-menor text-secondary">
                        <i class="fa-fw far fa-calendar texto-azul-claro"></i>
                        início: <?= h($projeto->created->format('d/m/Y')) ?>
                    </p>
                    <p class="texto-menor text-secondary">
                        <i class="fa-fw far fa-user texto-azul-claro"></i> <?= $projeto->orientador ? 'Prof. ' . $projeto->orientador : 'Sem Orientador' ?>
                    </p>
                    <div>
                        <?php foreach ($projeto->categorias as $categoria): ?>
                            <p style="display: inline-block" class="text-categorias-bg-grey"><?= $categoria->nome ?></p>
                        <?php endforeach; ?>
                    </div>
                    <?= $this->Html->link(
                        'Ver detalhes <i class="fas fa-arrow-right"></i>',
                        ['controller' => 'Projetos', 'action' => 'view', $projeto->id],
                        ['escape' => false, 'class' => 'btn btn-projeto-home']
                    ) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

