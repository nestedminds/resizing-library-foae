<?php

// Include our library
require_once 'Resize.lib.php';
?>
<html>
<head>
    <title>ImageWorkshop playground</title>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900,900italic,700italic,500italic,400italic,300italic,100italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div id="container">
        <div id="content-area">

            <div id="dialog-message" title="Notice">
                <p>
                    The UI part is incomplete (for now)
                </p>
            </div>

            <div id="accordion">

                <h3>Select and image</h3>
                <div>
                    <input type="file" id="select-file-button" value="Select an image to resize" />
                    <button id="button-upload">Upload</button>
                </div>

                <h3>Select the options</h3>
                <div>
                    <strong>Choose how your image should be handled</strong>
                    <br />
                    <input type="checkbox" id="check"><label for="check">Toggle</label>
                    <div id="format">
                        <input type="checkbox" id="check1"><label for="check1">B</label>
                        <input type="checkbox" id="check2"><label for="check2">I</label>
                        <input type="checkbox" id="check3"><label for="check3">U</label>
                    </div>
                </div>

                <h3>Download / Save</h3>
                <div>
                    <strong>Download or save the URL to your image</strong>
                    <br />
                    <div>URL: </div>
                    <div>Link: </div>
                    <div>Preview:</div>
                    <small class="delete">Delete</small>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
