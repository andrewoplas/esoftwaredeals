!function($) {
    "use strict";
}

var userTable;
var allUsersCount;
var premiumUsersCount;
var normalUsersCount;

$(document).ready(function() {

    allUsersCount = parseInt($("#allUsersCount").text());
    premiumUsersCount = parseInt($("#premiumUsersCount").text());
    normalUsersCount = parseInt($("#normalUsersCount").text());

    userTable = $('#userTable').DataTable( {
        "bLengthChange": false,
        "info": false,
        "order": []
    });
});

function confirm_delete(id, user_name, element){
     user_name = "'" + user_name + "'";
     swal({   
          title: "Are you sure?",   
          text: "You will not be able to recover " + user_name,
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
               url: "/tango/users/delete/" + id,
               type: 'DELETE',
               success: function(data, textStatus, jqXHR) 
               {
                    swal({   
                         title: "Deleted!",   
                         text:  user_name + " has been successfully deleted.",
                         timer: 2000,
                         type: "success",
                         showConfirmButton: true
                    });
                    $(element).parents('tr').hide(1000);
                    allUsersCount--;
                    $("#allUsersCount").text(allUsersCount);
                    if(data == 0) {
                         premiumUsersCount--;
                         $("#premiumUsersCount").text(premiumUsersCount);
                    } else {
                         normalUsersCount--;
                         $("#normalUsersCount").text(normalUsersCount);
                    }
               },
               error: function(jqXHR, status, error) 
               {
                    console.log(status + ": " + error);
               }
          });
     });
}    
    