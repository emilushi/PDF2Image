<?php

/**
 * Simple Display image file for imagick
 */
require 'config.php';
require 'package/PdfToImage.php';

use package\PdfToImage;

$pti = new PdfToImage();
$pdf_file = $_SESSION['pdf_file'];
$image_list = $pti->imagemagick($pdf_file);

if (isset($_GET["i"])) {
    header('Content-Type: image/jpeg');
    echo $image_list[$_GET["i"]];
}
