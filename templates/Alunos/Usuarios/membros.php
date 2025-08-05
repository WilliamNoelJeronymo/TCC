<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<h2>Membros do projeto: <?=$projeto->nome?></h2>
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
                            <?php if($usuario->foto): ?>
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
                        return $funcao->nome; // Acessa o nome de cada função
                    }, $usuario->funcoes)) ?>
                </td>                <td class="actions">
                    <?= $this->Html->link('<span class="fas fa-user-edit"></span>', ['action' => 'view', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Visualizar', 'data-toggle' => 'modal', 'data-target' => '.view']); ?>
                    <?= $this->Form->postLink(('<span class="fa fa-trash"></span>'), ['action' => 'delete', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Deletar', 'confirm' => __('Você tem certeza que deseja deletar o animal: {0}?', $usuario->nome)]) ?>
                    <?= $this->Html->link('<i class="fas fa-lock"></i>', ['action' => 'alterar-senha', $usuario->id], ['escape' => false, 'class' => 'btn btn-default toolTipOpen', 'title' => 'Alterar senha', 'data-toggle' => 'modal', 'data-target' => '.view']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="">
    <?=$this->Html->link('<i class="fas fa-chevron-circle-left"></i> Voltar',['controller'=>'Projetos', 'action'=>'view',$projeto->id],['escape'=>false,'class'=>'btn btn-default'])?>
</div>
