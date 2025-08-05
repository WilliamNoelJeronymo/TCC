<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjetosCategoria $projetosCategoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Projetos Categoria'), ['action' => 'edit', $projetosCategoria->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Projetos Categoria'), ['action' => 'delete', $projetosCategoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetosCategoria->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projetos Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Projetos Categoria'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projetosCategorias view content">
            <h3><?= h($projetosCategoria->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Projeto') ?></th>
                    <td><?= $projetosCategoria->hasValue('projeto') ? $this->Html->link($projetosCategoria->projeto->nome, ['controller' => 'Projetos', 'action' => 'view', $projetosCategoria->projeto->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $projetosCategoria->hasValue('categoria') ? $this->Html->link($projetosCategoria->categoria->nome, ['controller' => 'Categorias', 'action' => 'view', $projetosCategoria->categoria->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projetosCategoria->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>