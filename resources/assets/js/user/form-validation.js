'use strict';
$(document).ready(function() {
    $(function() {
        // [ Add phone validator ]
        $.validator.addMethod(
            'phone_format',
            function(value, element) {
                return this.optional(element) || /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(value);
            },
            'Invalid phone number.'
        );

        // [ Initialize validation ]
        $('#loginform').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
         // generate password
        $('#generatepassword').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'password': {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                'confirmpassword': {
                    required: true,
                    equalTo: '#user-password',
                    minlength: 6,
                    maxlength: 20
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
        
        // signup form validation on user side
        $('#signup_form').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'password': {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                'confirmed': {
                    required: true,
                    equalTo: '#user-Password',
                    minlength: 6,
                    maxlength: 20
                },
                 'first_name': {
                    required: true,
                    maxlength: 200
                },
                'last_name': {
                    required: true,
                     maxlength: 200
                },
                'phone_no': {
                    required: true,
                    phone_format: true,
                    maxlength: 20
                },
                'city': {
                    required: true,
                    maxlength: 200
                },
                'state': {
                    required: true,
                    maxlength: 200
                },
                'postal_code': {
                    required: true,
                    maxlength: 200
                },
                'country': {
                    required: true,
                    maxlength: 200
                },
                'address': {
                    required: true,
                    maxlength: 200
                },
                'email_address': {
                    required: true,
                    email: true,
                    remote: {
                        url: "/api/check-email-exist",
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#emailaddress" ).val();
                            }
                        }, 

                    }
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            },
            messages: {
                emailaddress: {
                    remote: "Email address already exists."
                },
                
            },
        });
        $('#activate-kit').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'kit_code': {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                'CaptchaCode': {
                    required: true,
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
        $('#contact_us').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'first_name': {
                    required: true,
                    maxlength: 200
                },
                'last_name': {
                    required: true,
                     maxlength: 200
                },
                'phone_no': {
                    required: true,
                    phone_format: true,
                    maxlength: 20
                },
               'email_address': {
                    required: true,
                    email: true,
                },
                'message': {
                    required: true,
                    maxlength: 500
                },
            },

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            },
            submitHandler: function() {
                var data =  $("#contact_us").serialize(); 
                var url = '/api/contact-us';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    beforeSend: function() {
                        $('.submit-contactus').attr("disabled", true); 
                        $('.submit-contactus').html('.........');               
                    },
                    success:function(response)
                        {
                            if(response.status){
                            Swal.fire('',response.message,'success');
                                $('.submit-contactus').attr("disabled", false); 
                                $('.submit-contactus').html('SUBMIT');  
                                $('#contact_us')[0].reset();
                            }else{
                               Swal.fire('',response.message,'error');
                               $(this).attr("disabled", false); 
                               $(this).html('SUBMIT');  
                            }
                        },
                });
            },

        });
         $('#forgotpassword_form').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'email': {
                    required: true,
                    email: true,
                    remote: {
                        url: "/api/check-email-exist",
                        type: "post",
                        data: {
                            email: function() {
                                return $( "#emailaddress_password" ).val();
                            },page:'password'
                        }, 

                    }
                },
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            },
            messages: {
                email: {
                    remote: "Email address not found."
                },
                
            },
        });
         // signup form validation on user side
        $('#profile-setting').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                 'first_name': {
                    required: true,
                    maxlength: 200
                },
                'last_name': {
                    required: true,
                     maxlength: 200
                },
                'phone_no': {
                    required: true,
                    phone_format: true,
                    maxlength: 20
                },
                'city': {
                    required: true,
                    maxlength: 200
                },
                'state': {
                    required: true,
                    maxlength: 200
                },
                'postal_code': {
                    required: true,
                    maxlength: 200
                },
                'country': {
                    required: true,
                    maxlength: 200
                },
                'address': {
                    required: true,
                    maxlength: 200
                }
            },

            // Errors //

            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            },
            messages: {
                emailaddress: {
                    remote: "Email address already exists."
                },
                
            },
        });
    });
});
