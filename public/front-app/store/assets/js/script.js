


// input

(function() {

    window.inputNumber = function(el) {

      var min = el.attr('min') || false;
      var max = el.attr('max') || false;

      var els = {};

      els.dec = el.prev();
      els.inc = el.next();

      el.each(function() {
        init($(this));
      });

      function init(el) {

        els.dec.on('click', decrement);
        els.inc.on('click', increment);

        function decrement() {
          var value = el[0].value;
          value-=10;
          if(!min || value >= min) {
            el[0].value = value;
          }
        }

        function increment() {
          var value = el[0].value;
          value++;
          if(!max || value <= max) {
            el[0].value = value+=9;
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



