$(document).ready(function () {
    $(".file-upload").fileinput({
        'showUpload': false,
        'showCancel': false,
    });

    /* Select 2 */
    $('select').select2({
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            }
        }
    });

    tinymce.init({
        selector: '.tiny',  // Inicializa apenas nos <textarea> visíveis
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
        menubar: false,
        statusbar: false,
        height: 300
    });


    $(function () {
        $('#cadastroUsuarioAdmin').validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
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
                email: {
                    required: "Este campo é obrigatório",
                    email: "Por favor, insira um endereço de e-mail válido"
                },
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
    $('.toolTipOpen').tooltip();
    /* AO ABRIR A JANELA MODAL */
    $('.view').on('show.bs.modal', function (e) {
        $(this).find('.modal-content').html(carregando());
        if (e.relatedTarget !== undefined) {
            var link = $(e.relatedTarget);
            link = $(link).attr('href');
            if (link.charAt(0) !== '#') {
                $(this).find('.modal-content').load(link, function (response, status, xhr) {
                    if (status === "error") {
                        $('.view').find('.modal-content').html(errorCarregar(xhr.status, xhr.statusText));
                    }
                });
            }
        }
    });

    /* AO FECHAR A JANELA MODAL */
    $('.view').on('hidden.bs.modal', function (e) {
        $(this).find('.modal-content').html('');
    });
});
function carregando() {
    var div = '<div class="modal-body">';
    div += '    <h3 style="text-align: center">';
    div += '        <i class="fa fa-refresh fa-spin"></i><br/> Carregando...';
    div += '    </h3';
    div += '</div>';
    return div;
}

function errorCarregar(status, statusText) {
    var div = '<div class="modal-body">';
    div += '    <div style="text-align: center">';
    div += '        <h4>';
    div += '            Erro ao carregar janela. Por favor, tente novamente.';
    div += '        </h4>';
    div += '        <a href="#" onclick="window.location.reload(true); return false;" class="btn btn-primary"><i class="fa fa-refresh"></i> Recarregar página</a>';
    div += '    </div';
    div += '</div>';
    return div;
}
