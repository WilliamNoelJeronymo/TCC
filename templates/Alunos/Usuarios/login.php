<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Aluno</title>
    <?= $this->Html->css([
        '/webroot/AdminLTE/dist/css/adminlte.min',
        '/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min',]) ?>

    <?= $this->Html->script([
        '/webroot/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min',
        '/AdminLTE/plugins/sweetalert2/sweetalert2.min',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh">
<div class="card">
    <div class="d-flex justify-content-center align-items-center">
        <?= $this->Html->image('/img/logo-completa.png', ['class' => 'w-', 'alt' => 'Logo projetos academicos']) ?>
        <?= $this->Html->image('/img/projetos-academicos-logo.png', ['class' => 'card-img-top w-50', 'alt' => 'Logo projetos academicos']) ?>
    </div>
    <div class="card-body d-flex justify-content-center align-items-center flex-column mt-0 pt-0">
        <div class="p-2 rounded w-100 text-center" style="background-color: #005da4; color: white">
            <?= $this->Flash->render() ?>
            <span>Sistema de Autenticação</span></div>
        <div class="mt-3">
            <?= $this->Form->create() ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $this->Form->control('matricula', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $this->Form->control('senha', ['type' => 'password', 'class' => 'form-control']); ?>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <?php echo $this->Html->link('voltar', ['prefix' => false, 'action' => 'index'], ['class' => 'btn btn-default']); ?>
                <button type="submit" class="btn" style="background-color: #005da4; color: white">Entrar</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</body>
</html>
