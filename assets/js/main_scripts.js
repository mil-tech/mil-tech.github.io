"use strict";


$(document).ready(function () {


    //Email Format Validation
    function isValidEmail(email) {
        if (email != '') {
            var pattern = new RegExp(/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i);
            return pattern.test(email);
        }
        else {
            return false;
        }
    }


    //loader
    $("#send-message-btn").ajaxStart(function () {
        $('#send-message-btn').after('<span id="loader" class="ajax-loader is-active"></span>');
    });

    $("#send-message-btn").ajaxStop(function () {
        $('#loader').remove();
    });

    //Contact Us Form
    $('#send-message-btn').click(function (e) {
        e.preventDefault();

        var name = $('[name=name]').val();
        var contact = $('[name=contact]').val();
        var email = $('[name=email]').val();
        var company = $('[name=company]').val();
        var message = $('[name=message]').val();
        var response = grecaptcha.getResponse();

        if (name === '' || name.length < 4)
            toastr.error('Please enter your full name.');

        else if (contact === '' || contact.length < 7)
            toastr.error('Please enter your contact number.');

        else if (email === '')
            toastr.error('Please enter your email address.');

        else if (email != '' && !isValidEmail(email))
            toastr.error('Please enter valid email address.');

        else if (message === '' || message.length < 5)
            toastr.error('Please enter your message.');

        else if (response.length == 0)
            toastr.error('Please verify that you are not a robot.');

        else {
            debugger;
            var data = $('[name=name], [name=contact], [name=email], [name=company],  [name=message]').serializeArray();
            var url = 'assets/src/db_insert_inquiry.php';

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                datatype: "text",
                success: function (data, textStatus, jQxhr) {
                    debugger;
                    toastr.success("Thank you. Your inquiry has been sent. We will get in touch with you shortly.");

                    //Clear Inputs after send
                    $('[name=name]').val('');
                    $('[name=company]').val('');
                    $('[name=email]').val('');
                    $('[name=contact]').val('');
                    $('[name=message]').val('');
                    grecaptcha.reset();

                },
                error: function (jqXhr, textStatus, errorThrown) {
                    toastr.error("Sorry..sending failed.");
                    console.log(errorThrown);
                }
            });


            //Verify captcha - codeninja.ph
            // $.ajax({
            //     URL: 'https://www.google.com/recaptcha/api/siteverify',
            //     secret: '6LdH3nkUAAAAALdbnucpWnHLE9QcrvXK5Ww_INS_',
            //     response: response,
            //     datatype: "json",
            //     success: function(result){
            //         debugger;
            //         toastr.info("Recaptcha Verification Result:\n Success is "+ result.success + "\n From: " + data.hostname);
            //      },
            //     error: function(result, textStatus, errorThrown){
            //         toastr.info("Recaptcha Verification Result Error:\n"+ errorThrown);
            //     }

            // });

            //Verify captcha - localhost
            // $.ajax({
            //     URL: 'https://www.google.com/recaptcha/api/siteverify',
            //     secret: '6LfptngUAAAAAI5Dw3jcTWLNB8FOVCQmN9YD5Biu',
            //     response: response,
            //     datatype: "json",
            //     success: function(result){
            //         debugger;
            //         toastr.info("Recaptcha Verification Result:\n Success is "+ result.success + "\n From: " + data.hostname);
            //      },
            //     error: function(result, textStatus, errorThrown){
            //         toastr.info("Recaptcha Verification Result Error:\n"+ errorThrown);
            //     }

            // });

            
        }

    });

    $('#sendmailbtn').click(function(e){
        e.preventDefault();

        var url = 'assets/src/sendmail.php';

        $.ajax({
            type: "GET",
            url: url,
            datatype: "text",
            success: function (data, textStatus, jQxhr) {
                // debugger;
                toastr.success("Message Sent");
            },
            error: function (jqXhr, textStatus, errorThrown) {
                toastr.error("Sorry..sending failed.");
                console.log(errorThrown);
            }
        });
    });

});