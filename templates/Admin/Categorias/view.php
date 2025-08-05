<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Categoria'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categorias view content">
            <h3><?= h($categoria->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($categoria->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Projetos') ?></h4>
                <?php if (!empty($categoria->projetos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Descricao') ?></th>
                            <th><?= __('Objetvo') ?></th>
                            <th><?= __('Texto') ?></th>
                            <th><?= __('Banner') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($categoria->projetos as $projeto) : ?>
                        <tr>
                            <td><?= h($projeto->id) ?></td>
                            <td><?= h($projeto->nome) ?></td>
                            <td><?= h($projeto->descricao) ?></td>
                            <td><?= h($projeto->objetvo) ?></td>
                            <td><?= h($projeto->texto) ?></td>
                            <td><?= h($projeto->banner) ?></td>
                            <td><?= h($projeto->status) ?></td>
                            <td><?= h($projeto->created) ?></td>
                            <td><?= h($projeto->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projeto->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projeto->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?>
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