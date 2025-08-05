<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Projeto'), ['action' => 'edit', $projeto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Projeto'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projetos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Projeto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projetos view content">
            <h3><?= h($projeto->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($projeto->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projeto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($projeto->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($projeto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($projeto->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($projeto->descricao)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Objetvo') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($projeto->objetvo)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Documentos') ?></h4>
                <?php if (!empty($projeto->documentos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Projeto Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($projeto->documentos as $documento) : ?>
                        <tr>
                            <td><?= h($documento->id) ?></td>
                            <td><?= h($documento->nome) ?></td>
                            <td><?= h($documento->projeto_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Documentos', 'action' => 'view', $documento->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Documentos', 'action' => 'edit', $documento->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Documentos', 'action' => 'delete', $documento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documento->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Imagens') ?></h4>
                <?php if (!empty($projeto->imagens)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Projeto Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($projeto->imagens as $imagen) : ?>
                        <tr>
                            <td><?= h($imagen->id) ?></td>
                            <td><?= h($imagen->nome) ?></td>
                            <td><?= h($imagen->projeto_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Imagens', 'action' => 'view', $imagen->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Imagens', 'action' => 'edit', $imagen->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Imagens', 'action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Usuarios Projetos Funcoes') ?></h4>
                <?php if (!empty($projeto->usuarios_projetos_funcoes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Usuario Id') ?></th>
                            <th><?= __('Funcoes Id') ?></th>
                            <th><?= __('Projeto Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($projeto->usuarios_projetos_funcoes as $usuariosProjetosFunco) : ?>
                        <tr>
                            <td><?= h($usuariosProjetosFunco->id) ?></td>
                            <td><?= h($usuariosProjetosFunco->usuario_id) ?></td>
                            <td><?= h($usuariosProjetosFunco->funcoes_id) ?></td>
                            <td><?= h($usuariosProjetosFunco->projeto_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UsuariosProjetosFuncoes', 'action' => 'view', $usuariosProjetosFunco->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UsuariosProjetosFuncoes', 'action' => 'edit', $usuariosProjetosFunco->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsuariosProjetosFuncoes', 'action' => 'delete', $usuariosProjetosFunco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosProjetosFunco->id)]) ?>
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