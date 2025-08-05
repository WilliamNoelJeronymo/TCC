<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 * @var \Cake\Collection\CollectionInterface|string[] $grupos
 */
?>
<?= $this->Form->create($usuario, ['type' => 'file', 'id' => 'cadastroUsuarioAdmin']) ?>
<div class="row">
    <div class="col-md-4">
        <?= $this->Form->control('imagem', [
            'type' => 'file',
            'class' => 'file-upload',
            'required' => false
        ]); ?>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $this->Form->control('nome', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('matricula', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('grupo_id', ['options' => $grupos, 'class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('senha', ['type' => 'password', 'class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('conf_senha', ['type' => 'password', 'class' => 'form-control']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right">
    <?php echo $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'btn btn-default']); ?>
    <button type="submit" class="btn btn-success">Adicionar</button>
</div>
<?= $this->Form->end() ?>

<script>

    $(function () {
        $('#cadastroUsuarioAdmin').validate({
            rules: {
                nome: {
                    required: true,
                },
                // email: {
                //     required: true,
                //     email: true,
                // },
                senha: {
                    required: true,
                    minlength: 8
                },
                conf_senha: {
                    required: true,
                    equalTo: "#senha",
                },
                matricula: {
                    required: true
                },
            },
            messages: {
                nome: {
                    required: "Este campo é obrigatório",
                },
                // email: {
                //     required: "Este campo é obrigatório",
                //     email: "Por favor, insira um endereço de e-mail válido"
                // },
                matricula: {
                    required: 'Este campo é obrigatório'
                },
                senha: {
                    required: "Este campo é obrigatório",
                    minlength: "Sua senha deve ter pelo menos 8 caracteres."
                },
                conf_senha: {
                    required: "Este campo é obrigatório",
                    equalTo: "As senhas não coincidem."
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

    });
</script>
