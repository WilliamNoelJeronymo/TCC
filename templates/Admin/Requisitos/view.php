<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisito $requisito
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Requisito'), ['action' => 'edit', $requisito->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Requisito'), ['action' => 'delete', $requisito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requisitos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Requisito'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requisitos view content">
            <h3><?= h($requisito->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($requisito->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($requisito->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($requisito->descricao)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Funcoes Requisitos Usuarios') ?></h4>
                <?php if (!empty($requisito->funcoes_requisitos_usuarios)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Funcoe Id') ?></th>
                            <th><?= __('Requisito Id') ?></th>
                            <th><?= __('Usuarios Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($requisito->funcoes_requisitos_usuarios as $funcoesRequisitosUsuario) : ?>
                        <tr>
                            <td><?= h($funcoesRequisitosUsuario->id) ?></td>
                            <td><?= h($funcoesRequisitosUsuario->funcoe_id) ?></td>
                            <td><?= h($funcoesRequisitosUsuario->requisito_id) ?></td>
                            <td><?= h($funcoesRequisitosUsuario->usuarios_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FuncoesRequisitosUsuarios', 'action' => 'view', $funcoesRequisitosUsuario->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FuncoesRequisitosUsuarios', 'action' => 'edit', $funcoesRequisitosUsuario->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FuncoesRequisitosUsuarios', 'action' => 'delete', $funcoesRequisitosUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcoesRequisitosUsuario->id)]) ?>
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