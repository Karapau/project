$.fn.materializeInputs = function (selectors) {

      // default param with backwards compatibility
      if (typeof (selectors) === 'undefined') selectors = "input, textarea, select";

      // attribute function
      function setInputValueAttr(element) {
            element.setAttribute('value', element.value);
      }

      // set value attribute at load
      this.find(selectors).each(function () {
            setInputValueAttr(this);
      });

      // on keyup and change
      this.on("keyup change", selectors, function () {
            setInputValueAttr(this);
      });
};

/**
 * Material Inputs
 */
$('body').materializeInputs();


function hide() {
      $('.balance').addClass('d-none');
      $('.eye').addClass('d-none');
      $('.eye-close').removeClass('d-none');
}
function show() {
      $('.balance').removeClass('d-none');
      $('.eye').removeClass('d-none');
      $('.eye-close').addClass('d-none');
}