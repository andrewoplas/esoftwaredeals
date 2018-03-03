!function($) {
    "use strict";
}

var licenseTable;
var allLicensesCount;
var assignedLicensesCount;
var unassignedLicensesCount;

var detailedViewTable;
var detailedViewTableData;

$(document).ready(function() {

    allLicensesCount = parseInt($("#allLicensesCount").text());
    assignedLicensesCount = parseInt($("#assignedLicensesCount").text());
    unassignedLicensesCount = parseInt($("#unassignedLicensesCount").text());

    licenseTable = $('#licenseTable').DataTable( {
        "bLengthChange": false,
        "info": false,
        "order": []
    });

    detailedViewTableData = [];
    detailedViewTable = $('#detailedViewTable').DataTable( {
        "data": detailedViewTableData,
        "columns": [
            { title: "Product" },
            { title: "Licenses" },
            { title: "Assigned" },
            { title: "Unassigned" } 
        ],
        "bLengthChange": false,
        "info": false,
        "searching": false,
        "paging": false
    });

});

function confirm_delete(id, element) {
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this license",  
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
            url: "/tango/licenses/delete/" + id,
            type: 'DELETE',
            success: function(data, textStatus, jqXHR) 
            {
                swal({   
                    title: "Deleted!",   
                    text:  "License has been successfully deleted.",
                    timer: 2000,
                        type: "success",
                        showConfirmButton: true
                });
                licenseTable.row($(element).parents('tr')).remove().draw();
                allLicensesCount--;
                $("#allLicensesCount").text(allLicensesCount);
                if(data == 0) {
                    unassignedLicensesCount--;
                    $("#unassignedLicensesCount").text(unassignedLicensesCount);
                } else {
                    assignedLicensesCount--;
                    $("#assignedLicensesCount").text(assignedLicensesCount);
                }
            },
            error: function(jqXHR, status, error) 
            {
                console.log(status + ": " + error);
            }
        });
    });
}

function getDetailedView() {
    $.ajax({
        url: "/tango/licenses/detailed",
        type: 'GET',
        success: function(data) 
        {
            var output_container = JSON.parse(data);
            detailedViewTableData = output_container;
            detailedViewTable.clear();
            detailedViewTable.rows.add(detailedViewTableData);
            detailedViewTable.draw();
        },
        error: function(jqXHR, status, error) 
        {
            console.log(status + ": " + error);
        }
    });
}