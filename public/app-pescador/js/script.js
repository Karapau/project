

$('[name="unidade"]').on('click', function () {
    var unidade = $(this).val();
      $("#kg").addClass("d-none");
      $("#price_div").addClass("d-none");
      $("#unidade").addClass("d-none");
      $("#kg_total").addClass("d-none");

      if (unidade == 'Kg') {
            $("#kg").removeClass("d-none");
            $("#price_div").removeClass("d-none");

      } else if (unidade == 'Unidade') {
            $("#unidade").removeClass("d-none");
            $("#kg_total").removeClass("d-none");
            $("#price_div").removeClass("d-none");
      }
});
