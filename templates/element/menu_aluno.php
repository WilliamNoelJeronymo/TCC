<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-users"></i> projetos',
        ['controller' => 'Projetos', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-users"></i> perfil',
        ['controller' => 'Usuarios', 'action' => 'view'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
