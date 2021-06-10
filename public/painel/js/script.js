var toggle = false;
$("#descarga").on('click', function () {
      $("input[name=descarga]").attr("checked", !toggle);
      toggle = !toggle;
      if (toggle == true) {
            $("#cientifico").removeClass("d-none");
      } else {
            $("#cientifico").addClass("d-none");
      }
});

$(document).ready(function () {
      $('.js-example-basic-multiple').select2();
});


