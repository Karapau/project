$('[data-countdown]').each(function () {

      var $this2 = $(this);
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function (event) {
            $this.html(event.strftime('%H:%M:%S'));
            console.log($this2);
          if(event.offset.hours == 0 && event.offset.minutes == 0 && event.offset.seconds == 0){
            $this2.parent().parent().remove();
          }
      });
});
