<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        '/AdminLTE/plugins/fontawesome-free/css/all.min',
        '/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min',
        '/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min',
        '/AdminLTE/plugins/select2/css/select2.min',
        '/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min',
        '/AdminLTE/plugins/summernote/summernote.min.css',
        '/AdminLTE/plugins/bootstrap-fileinput/css/fileinput.min',
        '/AdminLTE/plugins/owl-carousel/dist/assets/owl.theme.default.min',
        '/AdminLTE/plugins/owl-carousel/dist/assets/owl.carousel.min',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css',
        '/AdminLTE/dist/css/adminlte.min',
        'style'
    ]) ?>


    <?= $this->Html->script([
        '/AdminLTE/plugins/jquery/jquery.min',
        '/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min',
        '/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min',
        '/AdminLTE/plugins/jquery-validation/jquery.validate.min',
        '/AdminLTE/plugins/jquery-validation/additional-methods.min',
        '/AdminLTE/plugins/moment/moment.min',
        '/AdminLTE/plugins/inputmask/jquery.inputmask.min',
        '/AdminLTE/plugins/sweetalert2/sweetalert2.min',
        '/AdminLTE/plugins/select2/js/select2.full.min',
        '/AdminLTE/dist/js/adminlte.min',
        '/AdminLTE/plugins/summernote/summernote.min.js',
        '/AdminLTE/plugins/bootstrap-fileinput/js/fileinput.min',
        '/AdminLTE/plugins/owl-carousel/dist/owl.carousel.min',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js',
        'scripts',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header class="header-public border-bottom sticky-top">
    <nav class="navbar navbar-expand-md">
        <div class="container-lg">
            <!-- Logo -->
            <a href="/" class="navbar-brand">
                <?= $this->Html->image(
                    'projetos-academicos-logo-sem-fundo.png',
                    ['class' => 'img-fluid', 'style' => 'max-height:50px']
                ) ?>
            </a>

            <!-- Botão toggle mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <?= $this->Html->link(
                            'Projetos',
                            ['controller' => 'Projetos', 'action' => 'index'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(
                            'Notícias',
                            ['controller' => 'Pages', 'action' => 'noticias'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(
                            'Faculdade',
                            ['controller' => 'Pages', 'action' => 'faculdade'],
                            ['class' => 'nav-link']
                        ) ?>
                    </li>
                </ul>

                <!-- Botão login -->
                <div class="text-end">
                    <?= $this->Html->link(
                        '<i class="fas fa-user-lock"></i> Área do aluno',
                        ['prefix' => 'Alunos', 'controller' => 'Usuarios', 'action' => 'login'],
                        ['escape' => false, 'class' => '']
                    ) ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<footer class="bg-gradient-faeterj text-white p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Pojetos Acdêmicos</h5>
                <h6>FAETERJ</h6>
                <p class="fw-lighter">Plataforma oficial para divulgação e acompanhamento de projetos extracurriculares
                    da Faculdade de Tecnologia do Estado do Rio de Janeiro.</p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <h4> Contato</h4>
                <p class="fw-lighter"><i class="fas fa-fw fa-map-pin"></i>Av. Getúlio Vargas 335, Quitandinha,<br> Petrópolis, RJ, 25651-075</p>
                <p class="fw-lighter"><i class="fas fa-fw fa-envelope"></i> contato@faeterj-petropolis.edu.br</p>
                <p class="fw-lighter"><i class="fas fa-fw fa-phone"></i> (24) 2244-1100</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
