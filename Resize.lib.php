<?php

// Load the ImageWorkshop library
require_once 'vendor/autoload.php';
// Load the FileUpload utility
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
     * Holder for the image's (layer) original width
     * @var int
     */
    public $width;

    /**
     * * Holder for the image's (layer) original width
     * @var int
     */
    public $height;

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

        // Keep it under $lib for easy access
        $this->lib = new \PHPImageWorkshop\ImageWorkshop();

        // The image we want to work with
        $this->setImage($imageStringWithPath);
    }

    /**
     * Setup the layer and its width & height
     * NB: The image must contain the full path
     * @param $image
     * @return \PHPImageWorkshop\Core\ImageWorkshopLayer|string
     * @throws \PHPImageWorkshop\Exception\ImageWorkshopException
     */
    public function setImage($image)
    {
        $this->layer = \PHPImageWorkshop\ImageWorkshop::initFromPath($image);
        $this->setWidthAndHeight();
    }

    /**
     * Sets the width & height of the layer, in pixels
     */
    public function setWidthAndHeight()
    {
        $this->width = $this->layer->getWidth();
        $this->height = $this->layer->getHeight();
    }

    /**
     * Resize exact without conserving proportions
     * @param int $width
     * @param int $height
     */
    public function resizeExact($width = 150, $height = 150)
    {
        $this->layer->resizeInPixel($width, $height, false);
    }


    /**
     * Auto resize the image
     * @param int $percent
     */
    public function resizeAuto($percent = 50)
    {
        // No need for if checking, resizeByLargestSideInPercent method already does this for us
        /*
        // Check wether we have a landscape or portrait picture
        if ($this->width > $this->height) {
            // We have a landscape picture
            $this->layer->resizeByLargestSideInPercent();
        } else {
            // We have a portrait picture
            $this->layer->resizeByLargestSideInPercent();
        }
        */

        $this->layer->resizeByLargestSideInPercent($percent, true);
    }

    /**
     * Crop the image within the given percentage, starting from $position (Left Top, Right Bottom et.c)
     * @param int $width
     * @param int $height
     * @param string $position
     */
    public function resizeCrop($width = 50, $height = 50, $position = "LT")
    {
        $this->layer->cropInPercent($width, $height, $position);
    }

    /**
     * Resize WITH proportion AND based on BOTH sides (since 1.2 version)
     * @param $dimension
     */
    public function resizeSquare($dimension)
    {
        $this->layer->resizeInPixel($dimension, $dimension, 0, 0, "MM");
    }
}
