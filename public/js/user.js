!function($) {
    "use strict";
}

function confirm_delete(id, user_name, element){
     user_name = "'" + user_name + "'";
     var data = $('userForm').serialize();
     swal({   
          title: "Are you sure?",   
          text: "You will not be able to recover " + user_name,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "Yes, delete it!",   
          closeOnConfirm: false
     }, function(isConfirm){
          if (isConfirm) {
               uid = "userForm" + id;
               document.getElementById(uid).submit();
          } 
     });
}     