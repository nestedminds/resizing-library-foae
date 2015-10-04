$(document).ready(function(){

    /* Accordion */
    $("#accordion").accordion({
        heightStyle: "content"
    });

    /* upload buttons */
    var selectFileButton = $('#select-file-button').button();
    var buttonUpload = $('#button-upload').button({
        disabled: true
    });

    /* Select options buttons */
    $("#check").button();
    $("#format").buttonset();

});