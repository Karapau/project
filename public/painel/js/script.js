$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.btn_entrega_aceito', function(){
        var btn = $(this);

        btn.removeClass('btn_entrega_aceito').removeClass('btn-dark').addClass('btn-success').html('ACEITO');

        $.ajax({
            url: btn.data('route'),
            type: 'POST',
            data: {id: btn.data('id')},
            success: (data) => {
                // console.log(data);

                $('#status-'+btn.data('id')).removeClass('btn-dark').addClass('btn-primary').html('EM ENTREGA');
            },
            error: (err) => {
                // console.log(err);
            }
        });
    });

    $(document).on('click', '.caixa_devolvida', function(){
        var btn = $(this);
        var devolvida = '';

        if(btn.attr('data-devolvida') == 'S'){
            devolvida = btn.attr('data-devolvida');
            btn.attr('data-devolvida', 'N');
            btn.removeClass('btn-dark').addClass('btn-success').html('SIM');
        }else{
            devolvida = btn.attr('data-devolvida');
            btn.attr('data-devolvida', 'S');
            btn.removeClass('btn-success').addClass('btn-dark').html('NÃO');
        }

        $.ajax({
            url: btn.data('route'),
            type: 'POST',
            data: {id: btn.data('id'), devolvida: devolvida},
            success: (data) => {
                // console.log(data);

                // $('#status-'+btn.data('id')).removeClass('btn-primary').addClass('btn-success').html('ENTREGUE');
            },
            error: (err) => {
                // console.log(err);
            }
        });
    });

    $(document).on('click', '.btn_entregue', function(){
        var btn = $(this);

        btn.removeClass('btn_entregue').removeClass('btn-primary').addClass('btn-success').html('ENTREGUE');

        $.ajax({
            url: btn.data('route'),
            type: 'POST',
            data: {id: btn.data('id')},
            success: (data) => {
                // console.log(data);

                // $('#status-'+btn.data('id')).removeClass('btn-primary').addClass('btn-success').html('ENTREGUE');
            },
            error: (err) => {
                // console.log(err);
            }
        });
    });

    $(document).on('click', '.btn-editar-user',function(){
        var btn = $(this);

        $.each(btn.data('dados'), (key, value) => {
            $('#modalUsersEdit').find('[name="'+key+'"]').val(value);
        });
    });
});