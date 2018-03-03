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

$('.input-daterange-timepicker').on('apply.daterangepicker hide.daterangepicker', function(ev, picker) {
    $("[name='start_datetime']").val(picker.startDate.format('YYYY-MM-DD H:mm:ss'));
    $("[name='end_datetime']").val(picker.endDate.format('YYYY-MM-DD H:mm:ss'));
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

function confirm_delete(id, code, element){
    alert(id);
     code = "'" + code + "'";
     swal({   
          title: "Are you sure?",   
          text: "You will not be able to recover " + code,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "Yes, delete it!",   
          closeOnConfirm: false
     }, function(){
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
          $.ajax({
               url: "/tango/coupons/delete/" + id,
               type: 'DELETE',
               success: function(data, textStatus, jqXHR) 
               {
                    swal({   
                         title: "Deleted!",   
                         text:  code + " has been successfully deleted.",
                         timer: 2000,
                         type: "success",
                         showConfirmButton: true
                    });
                    $(element).parents('tr').hide(1000);
               },
               error: function(jqXHR, status, error) 
               {
                    console.log(status + ": " + error);
               }
          });
     });
}     