$(document).ready(function(){
  $('#contact-form').validate({
        rules: {
            un: {
	        minlength: 5,
	        required: true
            },
            pw: {
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
    $('#contact-form-post').validate({
        rules: {
            subject: {
	        required: true
            },
            pst: {
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
    
    $('#contact-form-edit').validate({
        rules: {
            cpw: {
	        minlength: 5,
	        required: true
            },
            email: {
                email: true,
                remote: {
                    type: 'post',
                    url: 'check/isEmailAvailable',
                    data: {
                    'email': $('#inputEmail').val()
                },
                dataType: 'json'
                }
            },
            pw: {
                minLength: 5
            },
            pwc: {
                minLength: 5,
                equalTo: "#inputNewPW"
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
    $('#form_post_ad').validate({
        rules: {
            book_name: {
	        required: true
            },
            book_des: {
                required: true
            }
        },
        messages: {
            book_name:{
                remote: "plzz"
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
    
    $('#contact-form-reg').validate({
        rules: {
            un: {
	        minlength: 5,
	        required: true
            },
            pw: {
	        required: true
            },
            cpw: {
                required: true,
                equalTo: "#inputPassword"
            },
            email: {
                required: true,
                email: true
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