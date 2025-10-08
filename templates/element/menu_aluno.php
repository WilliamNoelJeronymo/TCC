<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-users"></i> Buscar Projetos',
        ['controller' => 'Projetos', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<?php if (!empty($meusProjetos)): ?>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="badge badge-info"><?= count($meusProjetos) ?></span>
            <p>
                 Meus Projetos
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <?php foreach ($meusProjetos as $projeto): ?>
                <li class="nav-item">
                    <small><?= $this->Html->link(
                            '<i class="fas fa-folder mr-2"></i>' . h($projeto->nome),
                            ['controller' => 'Projetos', 'action' => 'view', $projeto->id],
                            ['class' => 'nav-link', 'escape' => false]
                        ) ?></small>
                </li>
                <div class="dropdown-divider"></div>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>
