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
        'style.css',
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
        'https://cdn.tiny.cloud/1/3errq3isnlr2wkbsq1xxgu2anwygdc42295w2utyt2d3iznd/tinymce/7/tinymce.min.js',
        'scripts',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <?= $this->Html->link('Acesso ao portal <i class="fas fa-external-link-alt"></i>', ['prefix' => false, 'controller' => 'Pages', 'action' => 'home'], ['escape' => false, 'class' => 'nav-link', 'target' => '_blank']) ?>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-danger navbar-badge"><?=$minhasNotificacoes->count()?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?=$minhasNotificacoes->count()?> Notificações</span>
                    <div class="dropdown-divider"></div>
                    <?php foreach($minhasNotificacoes->all() as $notificacoes): ?>
                        <a href="<?=$this->Url->build(['controller'=>'Notificacoes','action'=>'view',$notificacoes->id])?>"
                           class="dropdown-item" >
                            <small>Projeto: <?=$notificacoes->funco->projeto->nome?></small>
                            <p><?=$notificacoes->usuarios_emissor->nome?>, Gostaria de participar do projeto como: <?=$notificacoes->funco->nome?></p>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach;?>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <?= $this->Html->link($usuario->nome. '<i class="fas fa-external-link-alt"></i>', ['controller' => 'Usuarios', 'action' => 'logout'], ['escape' => false, 'class' => 'nav-link',]) ?>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= $this->Url->build(['controller' => 'denuncias', 'action' => 'index']) ?>" class="brand-link text-center">
            <?= $this->Html->image('/img/projetos-academicos-logo-sem-fundo.png', ['width' => '150px']) ?>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <?php echo $this->element('menu_aluno'); ?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">
                                <?= $this->Html->link(h($this->request->getParam('controller')), ['controller' => $this->request->getParam('controller')]) ?>
                            </li>
                            <li class="breadcrumb-item active"><?= h($this->request->getParam('action')) ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php if (!isset($layoutSemBox) || !$layoutSemBox): ?>
                    <div class="card">
                        <div class="card-body">
                            <?= $this->Flash->render() ?>
                            <?= $this->fetch('content') ?>
                        </div>
                    </div>
                    <!-- /.card -->
                <?php else: ?>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                <?php endif; ?>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal view" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->
</body>
</html>
