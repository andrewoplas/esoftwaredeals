$('.input-daterange-timepicker').daterangepicker({
    timePicker: true,
    locale: {
        format: 'MM/DD/YYYY h:mm A'
    },
    timePickerIncrement: 1,
    timePicker12Hour: true,
    timePickerSeconds: false,
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-danger',
    cancelClass: 'btn-inverse'
});

$('.input-daterange-timepicker').on('apply.daterangepicker', function(ev, picker) {
    $("[name='start_datetime']").val(picker.startDate.format('YYYY-MM-DD H:mm:ss'));
    $("[name='end_datetime']").val(picker.endDate.format('YYYY-MM-DD H:mm:ss'));
});

$('.input-daterange-timepicker').val("");

$('.input-daterange-timepicker').on('load.daterangepicker', function(ev, picker) {
    alert("asdf");
});

$("[name='type']").on('change',function(){
    var type = $(this).val();

    if(type == "Fixed Price"){
         $("[name='amount']").removeAttr("readonly", "");
         $("[name='percent']").attr("readonly", "").val("0");
    } else {
         $("[name='amount']").attr("readonly", "").val("0");
         $("[name='percent']").removeAttr("readonly");
    }
});
$("[name='type']").change();