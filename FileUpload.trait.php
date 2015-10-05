<?php

/**
 * ----------------
 * Trait FileUpload
 * ----------------
 * Checks the uploaded file
 * * if it has been uploaded through our form
 * * if it's an image we can work with (extension)
 */
trait FileUpload
{

    /**
     * Allowed extensions on upload
     * @var array
     */
    public $allowedExtensions = [
        'image/png', 'image/jpeg', 'image/pjpeg', 'image/bmp', 'image/gif'
    ];

    /**
     * Uploads folder - default is "uploads"
     * @var string
     */
    public $uploadsFolder = 'uploads';

    /**
     * Handles the input name from the form
     * @var string
     */
    public $inputName;

    /**
     * Set the name of the input in our form (where the image is uploaded)
     * @param string $inputName
     */
    public function setInputName($inputName = 'uploaded_image')
    {
        $this->inputName = $inputName;
    }

    /**
     * On user upload, grab the image, check for extension and check if it is uploaded through our form
     * Finally store the uploaded image into our designated uploads folder
     * @return bool
     */
    public function storeImage()
    {
        if ($_FILES[$this->inputName] && in_array($_FILES[$this->inputName]['type'], $this->allowedExtensions)){
            (is_uploaded_file($_FILES[$this->inputName]['tmp_name'])) ? '' : die('Error #98128361 while uploading the file.');
            move_uploaded_file($_FILES[$this->inputName]['tmp_name'], $this->uploadsFolder . $_FILES[$this->inputName]['name']);
            return true;
        }

        return false;
    }
}