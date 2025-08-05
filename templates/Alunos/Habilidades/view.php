<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Habilidade $habilidade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Habilidade'), ['action' => 'edit', $habilidade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Habilidade'), ['action' => 'delete', $habilidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $habilidade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Habilidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Habilidade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="habilidades view content">
            <h3><?= h($habilidade->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($habilidade->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($habilidade->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Funcoes') ?></h4>
                <?php if (!empty($habilidade->funcoes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Quantidade') ?></th>
                            <th><?= __('Projetos Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($habilidade->funcoes as $funco) : ?>
                        <tr>
                            <td><?= h($funco->id) ?></td>
                            <td><?= h($funco->nome) ?></td>
                            <td><?= h($funco->descricao) ?></td>
                            <td><?= h($funco->quantidade) ?></td>
                            <td><?= h($funco->projetos_id) ?></td>
                            <td><?= h($funco->created) ?></td>
                            <td><?= h($funco->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Funcoes', 'action' => 'view', $funco->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Funcoes', 'action' => 'edit', $funco->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Funcoes', 'action' => 'delete', $funco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funco->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Usuarios') ?></h4>
                <?php if (!empty($habilidade->usuarios)) : ?>
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
                        <?php foreach ($habilidade->usuarios as $usuario) : ?>
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