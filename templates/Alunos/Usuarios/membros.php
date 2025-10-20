<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<h2>Membros do projeto: <?= $projeto->nome ?></h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>nome</th>
            <th>Funções</th>
            <th class="actions"><?= __('Opções') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td>
                    <div class="user-panel d-flex">
                        <div class="image">
                            <?php if ($usuario->foto): ?>
                                <?= $this->Html->image('/uploads/alunos/' . $usuario->matricula . '/imagem_perfil/' . $usuario->foto,
                                    ['class' => 'img-circle ', 'alt' => 'user image']) ?>
                            <?php else: ?>
                                <?= $this->Html->image('/img/default-user.jpg',
                                    ['class' => 'img-circle', 'alt' => 'user image']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="info">
                            <?= h($usuario->nome) ?>
                        </div>
                    </div>
                </td>
                <td>
                    <?= implode(' / ', array_map(function ($funcao) {
                        return $funcao->nome;
                    }, $usuario->funcoes)) ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(('<i class="fas fa-user-alt-slash"></i>'), ['controller'=>'Funcoes','action' => 'removerMembro', $usuario->id, $projeto->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Remover Membro']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="">
    <?= $this->Html->link('<i class="fas fa-chevron-circle-left"></i> Voltar', ['controller' => 'Projetos', 'action' => 'view', $projeto->id], ['escape' => false, 'class' => 'btn btn-default']) ?>
</div>
