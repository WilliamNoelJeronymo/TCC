<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UsuariosProjetosFunco> $usuariosProjetosFuncoes
 */
?>
<div class="usuariosProjetosFuncoes index content">
    <?= $this->Html->link(__('New Usuarios Projetos Funco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios Projetos Funcoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('funcoes_id') ?></th>
                    <th><?= $this->Paginator->sort('projeto_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuariosProjetosFuncoes as $usuariosProjetosFunco): ?>
                <tr>
                    <td><?= $this->Number->format($usuariosProjetosFunco->id) ?></td>
                    <td><?= $usuariosProjetosFunco->hasValue('usuario') ? $this->Html->link($usuariosProjetosFunco->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $usuariosProjetosFunco->usuario->id]) : '' ?></td>
                    <td><?= $usuariosProjetosFunco->hasValue('funco') ? $this->Html->link($usuariosProjetosFunco->funco->nome, ['controller' => 'Funcoes', 'action' => 'view', $usuariosProjetosFunco->funco->id]) : '' ?></td>
                    <td><?= $usuariosProjetosFunco->hasValue('projeto') ? $this->Html->link($usuariosProjetosFunco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $usuariosProjetosFunco->projeto->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuariosProjetosFunco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuariosProjetosFunco->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuariosProjetosFunco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosProjetosFunco->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>