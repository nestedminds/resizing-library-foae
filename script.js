$.noConflict();
jQuery(document).ready(function($){

    /* Accordion */
    $("#accordion").accordion({
        heightStyle: "content"
    });

    /* Upload buttons */
    var buttonSelectFile = $('#select-file-button');
    var buttonUpload = $('#button-upload');
    buttonUpload.prop('disabled', true);

    /*
    If a file is selected for upload,
    unlock the upload button and send the ajax request
    */
    buttonSelectFile.change(function(){
        "use strict";
        if ($(this).val()) {

            console.log('File ready:' + $(this).val());
            buttonUpload.prop('disabled', false).click(function(){

                $(this).prop('disabled', true);
                console.log('Uploading file...');
                $('#ui-id-2').html("<img src='http://hideawayportugal.com/images/LoadingSpinner.gif' height='12' /> Uploading image...");

                $.ajax({
                    url: 'uploadAjax.php',

                })
                    .done(function(){
                        console.log('Success');
                    })
                    .fail(function(){
                        console.log('FAILED');
                    });
            });
        }
    });

    /* Select options buttons */
    $("#check").button();
    $("#format").buttonset();

    /* Not yet finished dialog */
    $("#dialog-message").dialog({
        modal: true,
        buttons: {
            OK: function () {
                $(this).dialog("close");
            }
        }
    });

});
