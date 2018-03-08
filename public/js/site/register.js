!function($) {
    "use strict";
}

if ($("#user_email").val() != '') {
	$("#account_setup_form").remove();
	$("#terms_and_agreement_form").hide();
	$("#personal_details_form").show();
	$(".personal-details-button").addClass("active");
	$(".terms-and-agreement-button").removeClass("active");
	$(".account-setup-step").remove();
	$(".register-button.account-setup-button").parent().remove();
	$(".register-button.terms-and-agreement-button").parent().removeClass('col-md-6').addClass('col-md-12');
	$(".steps-form-2 .steps-row-2 .steps-step-2").addClass("social");
	$(".steps-form-2 .steps-row-2").toggleClass("social");
	$(".personal-details-step a").text("1");
	$(".terms-and-agreement-step a").text("2");
}

$(document).on('click', '.account-setup-button', function (){
	$("#account_setup_form").show();
	$("#terms_and_agreement_form").hide();
	$("#personal_details_form").hide();
	$(".account-setup-button").addClass("active");
	$(".terms-and-agreement-button").removeClass("active");
	$(".personal-details-button").removeClass("active");
});

$(document).on('click', '.personal-details-button', function (){
	var full_name = $("#full_name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var password_confirmation = $("#password_confirmation").val();
	var email_regex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
	var error_message = '';
	$("#account_setup_errors .text-danger").remove();
	if (full_name != '' && email != '' && password != '' && password_confirmation != '' && password == password_confirmation 
		&& email_regex.test(email)) {
		$("#account_setup_errors .text-danger").remove();
		$(".preloader").show();
		$(".register-button.personal-details-button").prop("disabled", true);
	    $.ajax({
            type: "GET",
            url: '/register/emailExists',
            data: {email: email},
            dataType: "json",
            success: function(result) {
            	$(".preloader").hide();
            	$(".register-button.personal-details-button").prop("disabled", false);
            	if (result.result == 'true') {
            		$("#email").addClass("verify-input");
            		$("#account_setup_errors").append('<p class="text-danger">Email has already been used in this website.</p>');
            	} else {
            		$("#account_setup_form").hide();
					$("#terms_and_agreement_form").hide();
					$("#personal_details_form").show();
					$(".account-setup-button").removeClass("active");
					$(".terms-and-agreement-button").removeClass("active");
					$(".personal-details-button").addClass("active");
					$("#full_name").removeClass("verify-input");
					$("#email").removeClass("verify-input");
					$("#password").removeClass("verify-input");
					$("#password_confirmation").removeClass("verify-input");
            	}
            }
        });
	} else {
		if ($(".terms-and-agreement-step .terms-and-agreement-button").hasClass('active')) {
			$("#terms_and_agreement_form").hide();
			$("#personal_details_form").show();
			$(".personal-details-button").addClass("active");
			$(".terms-and-agreement-button").removeClass("active");
		}
		if (full_name == '') {
			$("#full_name").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Full Name cannot be empty.</p>';
			}
		} else {
			$("#full_name").removeClass("verify-input");
			$("#account_setup_errors .text-danger").remove();
		}
		if (email == '') {
			$("#email").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Email cannot be empty.</p>';
			}
		} else {
			$("#email").removeClass("verify-input");
			$("#account_setup_errors .text-danger").remove();
		}
		if (!email_regex.test(email)) {
			$("#email").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Email is invalid.</p>';
			}
		} else {
			$("#email").removeClass("verify-input");
			$("#account_setup_errors .text-danger").remove();
		}
		if (password == '') {
			$("#password").addClass("verify-input"); 
			if (!error_message) {
				error_message = '<p class="text-danger">Password cannot be empty.</p>';
			}
		}
		if (password_confirmation == '') {
			$("#password_confirmation").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Confirm Password cannot be empty.</p>';
			}
		} else {
			if (password != password_confirmation) {
				$("#password").addClass("verify-input");
				$("#password_confirmation").addClass("verify-input");
				if (!error_message) {
					error_message = '<p class="text-danger">Passwords do not match.</p>';
				}
			} else {
				$("#password").removeClass("verify-input");
				$("#password_confirmation").removeClass("verify-input");
			}
		}
		if (error_message) {
			$("#account_setup_errors").append(error_message);
		}
	}
});

$("#full_name").keyup(function() {
	$("#full_name").removeClass("verify-input");
});

$("#email").keyup(function() {
	$("#email").removeClass("verify-input");
});

$("#password").keyup(function() {
	$("#password").removeClass("verify-input");
});

$("#password_confirmation").keyup(function() {
	$("#password_confirmation").removeClass("verify-input");
});

$(document).on('click', '.terms-and-agreement-button', function (){
	var phone_number = $("#phone_number").val();
	var address = $("#address").val();
	var country = $("#country").val();
	var state = $("#state").val();
	var state_select = $("#state_select").val();
	var city = $("#city").val();
	var zip_code = $("#zip_code").val();
	var error_message = '';
	if ($("#state").prop("required")) {
		var state_selected = $("#state").val();
	} else if ($("#state_select").prop("required")) {
		var state_selected = $("#state_select").val();
	}
	$("#personal_details_errors .text-danger").remove();

	if (phone_number != '' && address != '' && country != '' && state_selected != '' && city != '' && zip_code != '') {
		$("#account_setup_form").hide();
		$("#terms_and_agreement_form").show();
		$("#personal_details_form").hide();
		$(".account-setup-button").removeClass("active");
		$(".terms-and-agreement-button").addClass("active");
		$(".personal-details-button").removeClass("active");
	} else {
		if (phone_number == '') {
			$("#phone_number").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Phone Number cannot be empty.</p>';
			}
		} else {
			$("#phone_number").removeClass("verify-input");
			$("#personal_details_errors .text-danger").remove();
		}
		if (address == '') {
			$("#address").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Address cannot be empty.</p>';
			}
		} else {
			$("#address").removeClass("verify-input");
			$("#personal_details_errors .text-danger").remove();
		}
		if (country == '') {
			$("#country").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Country cannot be empty.</p>';
			}
		} else {
			$("#country").removeClass("verify-input");
			$("#personal_details_errors .text-danger").remove();
		}
		if (country == "US") {
			if (state_select == '') {
				$("#state_select").addClass("verify-input");
				if (!error_message) {
					error_message = '<p class="text-danger">State/Province cannot be empty.</p>';
				}
			} else {
				$("#state_select").removeClass("verify-input");
				$("#personal_details_errors .text-danger").remove();
			}
		} else {
			if (state == '') {
				$("#state").addClass("verify-input");
				if (!error_message) {
					error_message = '<p class="text-danger">State/Province cannot be empty.</p>';
				}
			} else {
				$("#state").removeClass("verify-input");
				$("#personal_details_errors .text-danger").remove();
			}
		}
		
		if (city == '') {
			$("#city").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">City cannot be empty.</p>';
			}
		} else {
			$("#city").removeClass("verify-input");
			$("#personal_details_errors .text-danger").remove();
		}
		if (zip_code == '') {
			$("#zip_code").addClass("verify-input");
			if (!error_message) {
				error_message = '<p class="text-danger">Zip/Postal cannot be empty.</p>';
			}
		} else {
			$("#zip_code").removeClass("verify-input");
			$("#personal_details_errors .text-danger").remove();
		}
		if (error_message) {
			$("#personal_details_errors").append(error_message);
		}
	}
});

$("#country").on('change', function(){
	var country = $(this).val();
	$(this).removeClass('verify-input');
	if (country != "US") {
		$("#state").show();
		$("#state").prop("required", true);
		$("#state").prop("disabled", false);
		$("#state_select").hide();
		$("#state_select").prop("required", false);
		$("#state_select").prop("disabled", true);
	} else {
		$("#state").hide();
		$("#state").prop("required", false);
		$("#state").prop("disabled", true);
		$("#state_select").show();
		$("#state_select").prop("required", true);
		$("#state_select").prop("disabled", false);
	}
});

$("#state_select").on("change", function() {
	$(this).removeClass('verify-input');
});

$("#phone_number").keyup(function() {
	$("#phone_number").removeClass("verify-input");
});

$("#address").keyup(function() {
	$("#address").removeClass("verify-input");
});

$("#state").keyup(function() {
	$("#state").removeClass("verify-input");
});

$("#city").keyup(function() {
	$("#city").removeClass("verify-input");
});

$("#zip_code").keyup(function() {
	$("#zip_code").removeClass("verify-input");
});