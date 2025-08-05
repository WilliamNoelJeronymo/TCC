<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-users"></i> Usuários',
        ['controller' => 'Usuarios', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-book-reader"></i> Habilidades/Requisitos',
        ['controller' => 'Habilidades', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-tags"></i> Categorias',
        ['controller' => 'Categorias', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
