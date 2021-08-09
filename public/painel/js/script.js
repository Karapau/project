$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.btn_entrega_aceito', function(){
        var btn = $(this);

        btn.removeAttr('id').removeClass('btn-dark').addClass('btn-success').html('ACEITO');

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

        btn.removeAttr('id').removeClass('btn-dark').addClass('btn-success');

        $.ajax({
            url: btn.data('route'),
            type: 'POST',
            data: {id: btn.data('id')},
            success: (data) => {
                // console.log(data);

                $('#status-'+btn.data('id')).removeClass('btn-primary').addClass('btn-success').html('ENTREGUE');
            },
            error: (err) => {
                // console.log(err);
            }
        });
    });
});