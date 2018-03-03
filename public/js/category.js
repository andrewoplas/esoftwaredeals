!function($) {
    "use strict";
}

var categoriesCount;
var categoryTable;

$(document).ready(function() {

    categoriesCount = parseInt($("#allCategoriesCount").text());
    

    categoryTable = $('#categoryTable').DataTable( {
        "bLengthChange": false,
        "info": false,
        "order": []
    });

});

function confirm_delete(id, category_name, element){
     category_name = "'" + category_name + "'";
     swal({   
          title: "Are you sure?",   
          text: "You will not be able to recover " + category_name,
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
               url: "/tango/categories/delete/" + id,
               type: 'DELETE',
               success: function(data, textStatus, jqXHR) 
               {
                    swal({   
                         title: "Deleted!",   
                         text:  category_name + " has been successfully deleted.",
                         timer: 2000,
                         type: "success",
                         showConfirmButton: true
                    });
                    $(element).parents('tr').hide(1000);
                    categoriesCount--;
                    $("#allCategoriesCount").text(categoriesCount);
               },
               error: function(jqXHR, status, error) 
               {
                    console.log(status + ": " + error);
               }
          });
     });
}