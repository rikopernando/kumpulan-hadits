
$('.js-selectize-reguler').selectize({
 sortField: 'text'
});

$('.js-selectize-multi').selectize({
  sortField: 'text',
  delimiter: ',',
  maxItems: null,
});

var date = new Date();

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    daysOfWeekDisabled: '0,6',
    startDate: date,
    autoclose: true,
});

var date = new Date();

$('.datepicker1').datepicker({
    format: 'yyyy-mm-dd',
    daysOfWeekDisabled: false,
    autoclose: true,
});




$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': '07:00'
});
