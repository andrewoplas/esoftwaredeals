!function($) {
    "use strict";
}

function confirm_delete(id, product_name, element){
     product_name = "'" + product_name + "'";
     swal({   
          title: "Are you sure?",   
          text: "You will not be able to recover " + product_name,
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
               url: "/tango/delete/" + id,
               type: 'DELETE',
               success: function(data, textStatus, jqXHR) 
               {
                    swal({   
                         title: "Deleted!",   
                         text:  product_name + " has been successfully deleted.",
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