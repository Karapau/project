$(document).ready(function(){
    $('#form-login').find('input').on('keyup', function(e){
        if(e.keyCode == 13){
            $('#btn-login').trigger('click');
        }
    });

    $(document).on('click', '#btn-login', function(){
        var btn = $(this);
        var form = $('#form-login').serialize();
        var url = $('#form-login').attr('action');
        btn.html('<div class="spinner-border text-light" role="status"></div>');
        btn.prop('disabled', true);
        $('#form-login').find('input').prop('disabled', true);

        $.ajax({
            url: url,
            type: 'POST',
            data: form,
            success: (data) => {
                // console.log(data);

                window.location.href = data;
            },
            error: (err) => {
                // console.log(err);
                btn.html('ENTRAR');
                btn.prop('disabled', false);
                $('#form-login').find('input').prop('disabled', false);

                Swal.fire({
                    icon: 'error',
                    title: 'Email ou Senha invalidos'
                });
            }
        });
    });
});