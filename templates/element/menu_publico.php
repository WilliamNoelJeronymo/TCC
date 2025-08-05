<li class="nav-item">
    <?= $this->Html->link(
        'Adoção',
        ['controller' => 'Animais', 'action' => 'adocao', 'prefix' => false],
        ['class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Castração
    </a>
    <ul class="dropdown-menu">
        <li>
            <?= $this->Html->link(
                'Como funciona',
                ['controller' => 'Pages', 'action' => 'como-funciona', 'prefix' => false],
                ['class' => 'dropdown-item']
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                'Clínicas Credenciadas',
                ['controller' => 'Oringens', 'action' => 'index', 'prefix' => false],
                ['class' => 'dropdown-item']
            ) ?>
        </li>
    </ul>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        'Desaparecidos',
        ['controller' => 'Animais', 'action' => 'desaparecidos', 'prefix' => false],
        ['class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        'Colabore',
        ['controller' => 'Pages', 'action' => 'colabore', 'prefix' => false],
        ['class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        'Quem somos',
        ['controller' => 'Pages', 'action' => 'sobre', 'prefix' => false],
        ['class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        'Entrar',
        ['controller' => 'Usuarios', 'action' => 'login', 'prefix' => 'Cidadao'],
        ['class' => 'nav-link']
    ) ?>
</li>
