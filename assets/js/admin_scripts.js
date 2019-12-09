"use strict";

$(document).ready(function () {


    // =================================================================
    //LOGIN SCRIPTS


    //loader
    $("#login-btn").ajaxStart(function () {
        $('#login-btn').after('<span id="loader" class="ajax-loader is-active"></span>');
    });

    $("#login-btn").ajaxStop(function () {
        $('#loader').remove();
    });


    // LOGIN
    $('#login-btn').click(function () {
        // debugger;
        var username = $('[name=username]').val();
        var password = $('[name=password]').val();

        if (username === "")
            toastr.error("Please enter your username.")

        else if (password === "")
            toastr.error("Please enter your password.")

        else {
            var data = $('[name=username],[name=password]').serializeArray();
            var url = 'assets/src/login_info.php';

            $.ajax({
                type: 'POST',
                data: data,
                url: url,
                datatype: 'text',
                success: function (data, status, jqXhr) {
                    // debugger;
                    if (data === 'Username and Password Match.') {
                        toastr.success("Login Success.");
                        // Your delay in milliseconds
                        var delay = 1000;
                        var URL = 'admin.php';
                        setTimeout(function () {
                            window.location.replace(URL);
                        }, delay);

                        //http
                        //location.replace('admin.html');
                    }

                    else
                        toastr.error(data);
                },

                error: function (jqXhr, errorThrown) {
                    toastr.error('Login Failed. ' + errorThrown)
                }
            });
        }

    });

    //=====================================================
    //INQUIRY TABLE
    var url = 'assets/src/db_get_inquiry.php';

    $.ajax({
        type: 'GET',
        url: url,
        datatype: 'json',
        success: function (data, textStatus, jQxhr) {
            // debugger;
            // jQuery.parseJSON(data);
            var inquiries = jQuery.parseJSON(data);
            if (data.length > 0) {
                var table = $('#inquiry-table');
                var tbody = $('#inquiry-body');
                var totalcols = 8;
                var tr;
                $.each(inquiries, function (key, value) {
                    tr = $('<tr class="d-flex flex-row" onclick="viewdetails(this)"/>').appendTo(tbody);
                    //data-toggle="modal" data-target="#message-modal" 

                    //append <th> and <td> elements to previously created <tr> element:
                    tr.append('<td class="align-middle">' + value.inquiry_id + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_name + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_contact + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_email + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_company + '</td>');
                    tr.append('<td class="message">' + value.inquiry_message + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_date + '</td>');
                    tr.append('<td class="align-middle">' + value.inquiry_status + '</td>');
                });

                $('#inquiry-table').DataTable();
            } else {
                $('#inquiry-table').DataTable({
                    "retrieve": true,
                    "language": {
                        "emptyTable": "No Records Yet."
                    }
                });
            }


        },
        error: function (jqXhr, textStatus, errorThrown) {
            //toastr.error('Error:  ' + errorThrown);
            console.log(errorThrown);
        }
    });

    // =================================================================
    //CONTACT SCRIPTS


    //CONTACT TABLE
    var url = 'assets/src/db_get_contact.php';

    $.ajax({
        type: 'GET',
        url: url,
        datatype: 'json',
        success: function (data, textStatus, jQxhr) {
            // debugger;
            // jQuery.parseJSON(data);
            var contacts = jQuery.parseJSON(data);
            if (data.length > 0) {
                var table = $('#contact-table');
                var tbody = $('#contact-body');
                var totalcols = 9;
                var tr;
                $.each(contacts, function (key, value) {
                    tr = $('<tr id="contact-row" class="d-flex flex-row"/>').appendTo(tbody);

                    //append <th> and <td class="align-middle"> elements to previously created <tr> element:
                    tr.append('<td class="align-middle">' + value.contact_id + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_firstname + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_lastname + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_email + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_phone1 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_phone2 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_phone3 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_status + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.contact_createddate + '</td>');
                });

                $('#contact-table').DataTable();

            } else {
                $('#contact-table').DataTable({
                    "retrieve": true,
                    "language": {
                        "emptyTable": "No Records Yet."
                    }
                });
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            //toastr.error('Error:  ' + errorThrown);
            console.log(errorThrown);
        }
    });


    // =================================================================
    //ACCOUNT SCRIPTS


    //ACCOUNT TABLE
    var url = 'assets/src/db_get_account.php';

    $.ajax({
        type: 'GET',
        url: url,
        datatype: 'json',
        success: function (data, textStatus, jQxhr) {
            // debugger;
            // jQuery.parseJSON(data);
            var accounts = jQuery.parseJSON(data);
            if (accounts.length > 0) {
                var table = $('#account-table');
                var tbody = $('#account-body');
                var totalcols = 8;
                var tr;
                $.each(accounts, function (key, value) {
                    tr = $('<tr id="account-row" class="d-flex flex-row" onClick="addBill(this)"/>').appendTo(tbody);

                    //append <th> and <td class="align-middle"> elements to previously created <tr> element:
                    tr.append('<td class="align-middle">' + value.account_id + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_companyname + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_contactperson + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_email + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_phone1 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_phone2 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_phone3 + '</td class="align-middle">');
                    tr.append('<td class="align-middle">' + value.account_createddate + '</td>');
                    // tr.append('<td><span style="float:left;" onclick=addBill(this)"><i class="fa fa-file-text-o"></i></span><span style="float:right;" onclick=changeStatus(this)"><i class="fa fa-calendar-check-o"></i></span></td>');

                });

                $('#account-table').DataTable();

            } else {
                $('#account-table').DataTable({
                    "retrieve": true,
                    "language": {
                        "emptyTable": "No Records Yet."
                    }
                });
            }

        },
        error: function (jqXhr, textStatus, errorThrown) {
            //toastr.error('Error:  ' + errorThrown);
            console.log(errorThrown);
        }
    });


    // ==================================================================
    // GET BILLING records

    var url = 'assets/src/db_get_billing.php';

    $.ajax({
        type: 'GET',
        url: url,
        datatype: 'json',
        success: function (data, textStatus, jQxhr) {
            debugger;
            // jQuery.parseJSON(data);
            if (data === 'No Records Found') {
                $('#billdetails-table').DataTable({
                    "retrieve": true,
                    "language": {
                        "emptyTable": "No Records Yet."
                    }
                });
            } else {
                var bills = jQuery.parseJSON(data);
                var table = $('#billdetails-table');
                var tbody = $('#billdetails-body');
                var totalcols = 8;
                var tr, tdstatus, tdremarks, tdid;
                // var trtabledit = '<td><span class="tabledit-span tabledit-identifier">1</span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="1" disabled=""></td>';
                var tdaction = '<td class="align-middle" style="white-space: nowrap; width: 1%;">';
                tdaction += '<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">';
                tdaction += '<div class="btn-group btn-group-sm" style="float: none;">';
                tdaction+= '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>';
                // tdaction += '<button type="button" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>';
                tdaction+= '</div>';
                tdaction += '<button type="button" class="tabledit-save-button btn btn-sm btn-success" style="float: none; display: none;">Save</button>';
                tdaction += '<button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>';
                tdaction += '<button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>';
                tdaction += ' </div></td>';
                
                $.each(bills, function (key, value) {
                    tr = $('<tr id="'+ key++ +'" class="d-flex flex-row"/>').appendTo(tbody);
                    debugger;
                    tdid = '<td><span class="tabledit-span tabledit-identifier align-middle">'+value.billing_id+'</span>';
                    tdid += '<input class="tabledit-input tabledit-identifier" type="hidden" name="billingid" value="'+ value.billing_id+'" disabled=""></td>';

                    tdstatus = '<td class="tabledit-view-mode align-middle"><span class="tabledit-span" style="display: inline;">'+ value.billing_status+'</span><select class="tabledit-input form-control input-sm" name="billingstatus" style="display: none;" disabled="">';
                    tdstatus += '<option value="Pending">Pending</option>';
                    tdstatus += '<option value="Paid">Paid</option>';
                    tdstatus += '</select></td>';

                    // tdremarks = '<td class="tabledit-view-mode align-middle"><span class="tabledit-span" style="display: inline;">'+value.billing_remarks+'</span>';
                    // tdremarks += '<input class="tabledit-input form-control input-sm" type="text" name="remarks" value="'+value.billing_remarks+'" style="display: none;" disabled=""></td>';
                    
                    tdremarks = '<td class="tabledit-view-mode align-middle"><span class="tabledit-span word-wrap" style="display: inline;">'+value.billing_remarks+'</span>';
                    tdremarks += '<textarea class="tabledit-input form-control input-sm" name="remarks" rows="8" style="display: none;" disabled="">'+value.billing_remarks+'</textarea></td>';


                    //append <th> and <td> elements to previously created <tr> element:
                    tr.append(tdid);
                    tr.append('<td class="align-middle">' + value.billing_date + '</td>');
                    tr.append('<td class="align-middle">' + value.billing_accountname + '</td>');
                    tr.append(tdstatus);
                    tr.append(tdremarks);
                    tr.append('<td class="align-middle">' + value.billing_createddate + '</td>');
                    tr.append(tdaction);

                });

                $('#billdetails-table').DataTable();
            }

        },
        error: function (jqXhr, textStatus, errorThrown) {
            //toastr.error('Error:  ' + errorThrown);
            console.log(errorThrown);
        }
    });

    // ==================================================================
    //JQUERY TABLE-EDIT Plugin
    $('#billdetails-table').Tabledit({
        url: 'assets/src/db_update_billing.php',
        columns: {
            identifier: [0, 'billingid'],
            editable: [[3, 'billingstatus', 'select', {"Pending":"Pending", "Paid":"Paid"}], [4, 'remarks', 'textarea', {rows:8}]]
            // editable: [[3, 'billingstatus', 'select', {"Pending":"Pending", "Paid":"Paid"}], [4, 'remarks']]
        },
        onDraw: function () {
            console.log('onDraw()');
        },
        onSuccess: function (data, textStatus, jqXHR) {
            console.log('onSuccess(data, textStatus, jqXHR)');
            console.log(data);
            console.log(textStatus);

            console.log(jqXHR);
        },
        onFail: function (jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onAlways: function () {
            console.log('onAlways()');
        },
        onAjax: function (action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
        }
    });


    // =================================================================
    //BILLING SCRIPTS

    //loader
    $("#save-btn").ajaxStart(function () {
        $('#save-btn').after('<span id="loader" class="ajax-loader is-active"></span>');
    });

    $("#save-btn").ajaxStop(function () {
        $('#loader').remove();
    });

    // // =========Get ACCOUNTS records
    // $.ajax({
    //     type: 'GET',
    //     url: url,
    //     datatype: 'json',
    //     success: function (data, textStatus, jQxhr) {
    //         if (data === 'No Records Found') {
    //             $('#billdetails-table').DataTable({
    //                 "language": {
    //                     "emptyTable": "No Records Yet."
    //                 }
    //             });
    //         } else {
    //             var accounts = jQuery.parseJSON(data);
    //             var $el = $("#selectaccount");
    //             $.each(accounts, function (key, value) {
    //                 $el.append($("<option></option>")
    //                         .attr("value", value.account_id).text(value.account_companyname));
    //             });
    //         }

    //     },
    //     error: function (jqXhr, textStatus, errorThrown) {
    //         console.log(errorThrown);
    //     }
    // });



    //Global variable for files[];
    var attachedFiles = [];

    // INSERT BILLING
    $('#save-btn').click(function () {
        debugger;
        var accountid = $('#selectaccount option:selected').val();
        var billingdate = $('[name=billingdate]').val();
        var billingstatus = $('#selectstatus option:selected').val();
        var remarks = $('[name=remarks]').val();

        if (accountid === "")
            toastr.error("Please select account name.")

        else if (billingstatus === "")
            toastr.error("Please enter billing status.")

        else if (billingdate === "")
            toastr.error("Please select billing date.")

        else {
            var data = $('[name=accountname],[name=billingdate],[name=billingstatus],[name=remarks]').serializeArray();
            //Add to data if attachedFiles is not empty
            if (attachedFiles.length > 0) {
                data.push({ name: 'attachedFiles', value: attachedFiles });
            }

            var url = 'assets/src/db_insert_billing.php';

            $.ajax({
                type: 'POST',
                data: data,
                url: url,
                datatype: 'json',
                success: function (data, status, jqXhr) {
                    // debugger;
                    if (data == "Insert Inquiry Success.") {
                        toastr.success("Bill is successfully saved.");

                        //Clear values
                        $('[name=clientname]').val('');
                        $('[name=billingdate]').val('');
                        $('[name=billingstatus]').val('');
                        $('[name=remarks]').val('');
                    } else {
                        toastr.error(data);
                    }
                },

                error: function (jqXhr, errorThrown) {

                }
            });
        }

    });



    // =================================================================
    //DEMO CONFIG - DM UPLOADER
    $(function () {
        /*
         * For the sake keeping the code clean and the examples simple this file
         * contains only the plugin configuration & callbacks.
         * 
         * UI functions ui_* can be located in:
         *   - assets/demo/uploader/js/ui-main.js
         *   - assets/demo/uploader/js/ui-multiple.js
         *   - assets/demo/uploader/js/ui-single.js
         */
        $('#drag-and-drop-zone').dmUploader({ //
            url: 'assets/src/upload.php',
            maxFileSize: 25000000, // 25 Megs max
            auto: false,
            queue: true,
            // extFilter: ["txt","ppt","pptx","doc","docx","xlsx","pdf","jpg","jpeg","png"],

            onDragEnter: function () {
                // Happens when dragging something over the DnD area
                this.addClass('active');
            },
            onDragLeave: function () {
                // Happens when dragging something OUT of the DnD area
                this.removeClass('active');
            },
            onInit: function () {
                // Plugin is ready to use
                ui_add_log('Penguin initialized :)', 'info');
            },
            onComplete: function () {
                // All files in the queue are processed (success or error)
                ui_add_log('All pending tranfers finished');
            },
            onNewFile: function (id, file) {
                // When a new file is added using the file selector or the DnD area
                ui_add_log('New file added #' + id);
                ui_multi_add_file(id, file);
            },
            onBeforeUpload: function (id) {
                // about tho start uploading a file
                ui_add_log('Starting the upload of #' + id);
                ui_multi_update_file_status(id, 'uploading', 'Uploading...');
                ui_multi_update_file_progress(id, 0, '', true);
                ui_multi_update_file_controls(id, false, true);  // change control buttons status
            },
            onUploadProgress: function (id, percent) {
                // Updating file progress
                ui_multi_update_file_progress(id, percent);
            },
            onUploadSuccess: function (id, data) {
                // debugger;
                //returned data.stus ok, add file path to attachedFiles[]
                if (data.status === "ok")
                    attachedFiles.push(data.path);

                // A file was successfully uploaded
                ui_add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
                ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
                ui_multi_update_file_status(id, 'success', 'Upload Complete');
                ui_multi_update_file_progress(id, 100, 'success', false);
                ui_multi_update_file_controls(id, false, false);  // change control buttons status
            },
            onUploadCanceled: function (id) {
                // Happens when a file is directly canceled by the user.
                ui_multi_update_file_status(id, 'warning', 'Canceled by User');
                ui_multi_update_file_progress(id, 0, 'warning', false);
                ui_multi_update_file_controls(id, true, false);
            },
            onUploadError: function (id, xhr, status, message) {
                // Happens when an upload error happens
                ui_multi_update_file_status(id, 'danger', message);
                ui_multi_update_file_progress(id, 0, 'danger', false);
                ui_multi_update_file_controls(id, true, false, true); // change control buttons status
            },
            onFallbackMode: function () {
                // When the browser doesn't support this plugin :(
                ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
            },
            onFileSizeError: function (file) {
                ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
            }

        }
        );



        /*
          Global controls
        */
        $('#btnApiStart').on('click', function (evt) {
            evt.preventDefault();

            $('#drag-and-drop-zone').dmUploader('start');
        });

        $('#btnApiCancel').on('click', function (evt) {
            evt.preventDefault();

            $('#drag-and-drop-zone').dmUploader('cancel');
        });

        /*
          Each File element action
         */
        $('#files').on('click', 'button.start', function (evt) {
            evt.preventDefault();

            var id = $(this).closest('li.media').data('file-id');

            // API: Start button
            // id optional, if not provided it will start ALL files
            $('#drag-and-drop-zone').dmUploader('start', id);
        });

        $('#files').on('click', 'button.cancel', function (evt) {
            evt.preventDefault();

            var id = $(this).closest('li.media').data('file-id');

            // API: Cancel button
            // id optional, if not provied it will stop
            // ALL files currently uploading.
            $('#drag-and-drop-zone').dmUploader('cancel', id);
        });
    });


    // =================================================================
    // DEMO UI - DM UPLOADER
    /*
 * Some helper functions to work with our UI and keep our code cleaner
 */

    // Adds an entry to our debug area
    function ui_add_log(message, color) {
        var d = new Date();

        var dateString = (('0' + d.getHours())).slice(-2) + ':' +
            (('0' + d.getMinutes())).slice(-2) + ':' +
            (('0' + d.getSeconds())).slice(-2);

        color = (typeof color === 'undefined' ? 'muted' : color);

        var template = $('#debug-template').text();
        template = template.replace('%%date%%', dateString);
        template = template.replace('%%message%%', message);
        template = template.replace('%%color%%', color);

        $('#debug').find('li.empty').fadeOut(); // remove the 'no messages yet'
        $('#debug').prepend(template);
    }

    // Creates a new file and add it to our list
    function ui_multi_add_file(id, file) {
        var template = $('#files-template').text();
        template = template.replace('%%filename%%', file.name);

        template = $(template);
        template.prop('id', 'uploaderFile' + id);
        template.data('file-id', id);

        $('#files').find('li.empty').fadeOut(); // remove the 'no files yet'
        $('#files').prepend(template);
    }

    // Changes the status messages on our list
    function ui_multi_update_file_status(id, status, message) {
        $('#uploaderFile' + id).find('span').html(message).prop('class', 'status text-' + status);
    }

    // Updates a file progress, depending on the parameters it may animate it or change the color.
    function ui_multi_update_file_progress(id, percent, color, active) {
        color = (typeof color === 'undefined' ? false : color);
        active = (typeof active === 'undefined' ? true : active);

        var bar = $('#uploaderFile' + id).find('div.progress-bar');

        bar.width(percent + '%').attr('aria-valuenow', percent);
        bar.toggleClass('progress-bar-striped progress-bar-animated', active);

        if (percent === 0) {
            bar.html('');
        } else {
            bar.html(percent + '%');
        }

        if (color !== false) {
            bar.removeClass('bg-success bg-info bg-warning bg-danger');
            bar.addClass('bg-' + color);
        }
    }

    // Toggles the disabled status of Star/Cancel buttons on one particual file
    function ui_multi_update_file_controls(id, start, cancel, wasError) {
        wasError = (typeof wasError === 'undefined' ? false : wasError);

        $('#uploaderFile' + id).find('button.start').prop('disabled', !start);
        $('#uploaderFile' + id).find('button.cancel').prop('disabled', !cancel);

        if (!start && !cancel) {
            $('#uploaderFile' + id).find('.controls').fadeOut();
        } else {
            $('#uploaderFile' + id).find('.controls').fadeIn();
        }

        if (wasError) {
            $('#uploaderFile' + id).find('button.start').html('Retry');
        }
    }





});

