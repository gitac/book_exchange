$(document).ready(function(){
    $('#contact-form-post').validate({
        rules: {
            subject: {
	        required: true
            },
            post: {
	        required: true
            }
        },
        messages: {
            username:{
                remote: "This username is already taken! Try another."
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element
            .text('OK!').addClass('valid')
            .closest('.control-group').removeClass('error').addClass('success');
        }
    });
    
}); // end document.ready