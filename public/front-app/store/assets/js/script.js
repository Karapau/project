


// input

(function () {

    window.inputNumber = function (el) {

        var min = el.attr('min') || false;
        var max = el.attr('max') || false;

        var els = {};

        els.dec = el.prev();
        els.inc = el.next();

        el.each(function () {
            init($(this));
        });

        function init(el) {

            els.dec.on('click', decrement);
            els.inc.on('click', increment);

            function decrement() {
                var value = el[0].value;
                value -= 10;
                if (!min || value >= min) {
                    el[0].value = value;
                }
            }

            function increment() {
                var value = el[0].value;
                value++;
                if (!max || value <= max) {
                    el[0].value = value += 9;
                }
            }
        }
    }
})();

inputNumber($('.input-number'));
var QtyInput = (function () {
    var $qtyInputs = $(".qty-input");

    if (!$qtyInputs.length) {
        return;
    }

    var $inputs = $qtyInputs.find(".product-qty");
    var $countBtn = $qtyInputs.find(".qty-count");
    var qtyMin = parseInt($inputs.attr("min"));
    var qtyMax = parseInt($inputs.attr("max"));

    $inputs.change(function () {
        var $this = $(this);
        var $minusBtn = $this.siblings(".qty-count--minus");
        var $addBtn = $this.siblings(".qty-count--add");
        var qty = parseInt($this.val());

        if (isNaN(qty) || qty <= qtyMin) {
            $this.val(qtyMin);
            $minusBtn.attr("disabled", true);
        } else {
            $minusBtn.attr("disabled", false);

            if (qty >= qtyMax) {
                $this.val(qtyMax);
                $addBtn.attr('disabled', true);
            } else {
                $this.val(qty);
                $addBtn.attr('disabled', false);
            }
        }
    });


})();



$(document).on('click', '[name="payment_mothod"]', function () {
    if ($(this).val() == 'mbway') {
        $('#phone').removeClass('d-none');
    } else {
        $('#phone').addClass('d-none');
    }

});


$(document).ready(function () {
    $('#enviar').on('click', function () {
        if ($('#flexCheckDefault').prop('checked')) {

            var dados = $('#checkForm').serialize();
            var url = $('#checkForm').attr('action');
            $(this).html('<div class="spinner-grow text-info" role="status"><span class="sr-only"></span></div>');
            $.ajax({
                url: url,
                type: 'POST',
                data: dados,
                success: (data) => {
                    // console.log(data);
                    $('#enviar').html('PAGAR E CONCLUIR');
                    window.location.href = "/store/thanks";
                },
                error: (err) => {
                    var erro = err.responseJSON[1];
                    if (erro == 'idnulo') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sessão expirada',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload;
                            }
                        });
                    }
                    if (!erro.paymentStatus) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Numero inválido',
                        })
                    }
                    if (erro.paymentStatus != 'Success') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Pagamento não aprovado!',
                        })
                    }
                    $('#enviar').html('PAGAR E CONCLUIR');
                }
            });
        } else {
            $('#flexCheckDefault').addClass('is-invalid');
        }
    });

});
