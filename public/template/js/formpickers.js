(function($) {
  'use strict';
  if ($("#timepicker-example").length) {
    $('#timepicker-example').datetimepicker({
      format: 'LT'
    });
  }
  if ($(".color-picker").length) {
    $('.color-picker').asColorPicker();
  }
  if ($("#datepicker-popup").length) {
    $('#datepicker-popup').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
  }
  if ($("#datepicker-popup").length) {
    $('#datepicker-popup').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
    $("#datepicker-popup").datepicker("setDate", "0");
  }
  if ($("#status-summary").length) {
    var statusSummaryChartCanvas = document.getElementById("status-summary").getContext('2d');;
    var statusData = {
        labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI"],
        datasets: [{
            label: '# of Votes',
            data: [50, 68, 70, 10, 12, 80],
            backgroundColor: "#ffcc00",
            borderColor: [
                '#01B6A0',
            ],
            borderWidth: 2,
            fill: false, // 3: no fill
            pointBorderWidth: 0,
            pointRadius: [0, 0, 0, 0, 0, 0],
            pointHoverRadius: [0, 0, 0, 0, 0, 0],
        }]
    };
    
  if ($("#inline-datepicker").length) {
    $('#inline-datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
  }
  if ($(".datepicker-autoclose").length) {
    $('.datepicker-autoclose').datepicker({
      autoclose: true
    });
  }
  if ($('input[name="date-range"]').length) {
    $('input[name="date-range"]').daterangepicker();
  }
  if($('.input-daterange').length) {
    $('.input-daterange input').each(function() {
      $(this).datepicker('clearDates');
    });
    $('.input-daterange').datepicker({});
  }
})(jQuery);