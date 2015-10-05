<?php

// Load the ImageWorkshop library
require_once 'vendor/autoload.php';
require_once 'FileUpload.trait.php';
/**
 * Class ResizeLib
 * --------------------------------------------------
 * Library needs to support several types of resizing
 * --------------------------------------------------
 * * Exact: Resize to exact width and height. Aspect ratio will not be maintained
 * * Auto: The best strategy (portrait or landscape) will be selected for a given image according to its aspect ratio
 * * Crop: This option will crop your images to the exact size you specify with no distortion
 * * Square: This strategy will first crop the image by its shorter dimension to make it a square, then resize it to the specified size
 */
class ResizeLib
{

    /**
     * Checks for uploaded file if it meets our criteria
     */
    use FileUpload;

    /**
     * Current version
     * @var string
     */
    public $version;

    /**
     * Image uploaded through a form
     * @var string
     */
    public $image;

    /**
     * The layer will automatically get the width and the height of the image
     * @var string
     */
    public $layer;

    /**
     * Holder for the ImageWorkshop object
     * @var object
     */
    public $lib;

    /**
     * Constructor receives a path to an image
     * @param $imageStringWithPath
     * @throws \PHPImageWorkshop\Exception\ImageWorkshopException
     */
    public function __construct($imageStringWithPath)
    {
        $this->version = '1.0.0';
        $this->lib = new \PHPImageWorkshop\ImageWorkshop();
    }

    /**
     * Feed the object an image (must contain the full path)
     * @param $image
     * @throws \PHPImageWorkshop\Exception\ImageWorkshopException
     */
    public function setImage($image)
    {
        $this->layer = \PHPImageWorkshop\ImageWorkshop::initFromPath($image);
    }

    public function resizeExact($width = 150, $height = 150)
    {

    }
}