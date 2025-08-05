<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funco $funco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Funco'), ['action' => 'edit', $funco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Funco'), ['action' => 'delete', $funco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Funcoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Funco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="funcoes view content">
            <h3><?= h($funco->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($funco->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $funco->hasValue('projeto') ? $this->Html->link($funco->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $funco->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($funco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($funco->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($funco->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($funco->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($funco->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Habilidades') ?></h4>
                <?php if (!empty($funco->habilidades)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($funco->habilidades as $habilidade) : ?>
                        <tr>
                            <td><?= h($habilidade->id) ?></td>
                            <td><?= h($habilidade->nome) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Habilidades', 'action' => 'view', $habilidade->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Habilidades', 'action' => 'edit', $habilidade->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Habilidades', 'action' => 'delete', $habilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $habilidade->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Usuarios') ?></h4>
                <?php if (!empty($funco->usuarios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Matricula') ?></th>
                            <th><?= __('Senha') ?></th>
                            <th><?= __('Foto') ?></th>
                            <th><?= __('Grupo Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($funco->usuarios as $usuario) : ?>
                        <tr>
                            <td><?= h($usuario->id) ?></td>
                            <td><?= h($usuario->nome) ?></td>
                            <td><?= h($usuario->email) ?></td>
                            <td><?= h($usuario->matricula) ?></td>
                            <td><?= h($usuario->senha) ?></td>
                            <td><?= h($usuario->foto) ?></td>
                            <td><?= h($usuario->grupo_id) ?></td>
                            <td><?= h($usuario->created) ?></td>
                            <td><?= h($usuario->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuario->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuario->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>