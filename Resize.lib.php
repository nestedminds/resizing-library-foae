<?php

// Load the ImageWorkshop library
require_once 'vendor/autoload.php';

class ResizeLib
{
    public $version;
    public $image;

    public function __construct()
    {
        $this->version = '1.0.0';
    }
}