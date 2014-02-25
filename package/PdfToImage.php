<?php

namespace package;

use Imagick;

/**
 * This class convert PDF in to Image
 * 
 * @author Albion Liçi <lici.albion@gmail.com>
 */
class PdfToImage {

    function __construct() {
        
    }

    function pdf2image($filename_pdf, $parameters = " -zoom 3 ") {
        $filename = explode(".", $filename_pdf);
        $full_filename_pdf = MEDIAPATH . "pdf/$filename_pdf";
        $image_path = MEDIAPATH . "image/" . $filename[0];
        $full_filename_image = $image_path . "/" . $filename[0] . ".jpg";
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }
        echo exec('pdf2image ' . $parameters . ' "' . $full_filename_pdf . '" "' . $full_filename_image . '" 2>&1');
        unlink($full_filename_image);
        $files_image = scandir($image_path);
        $image_array = array();
        foreach ($files_image as $fi):
            if ($fi != "." && $fi != "..") {
                $relpath_image = explode(BASEPATH, "$image_path/$fi");
                array_push($image_array, "./" . $relpath_image[1]);
            }
        endforeach;
        return $image_array;
    }

    /**
     * Elaborate image in memory
     * @param string $filename_pdf
     * @return array
     */
    function imagemagick($filename_pdf) {
        $im = new Imagick(MEDIAPATH . "pdf/$filename_pdf");
        $im_count = $im->getNumberImages();
        $image_array = array();
        for ($index = 0; $index < $im_count; $index++) {
            $im_index = new Imagick(MEDIAPATH . "pdf/$filename_pdf" . "[$index]");
            $im_index->setImageFormat('jpg');
            $image_array[$index] = $im_index;
        }
        $im->setImageFormat('jpg');
        return $image_array;
    }

    /**
     * Elaborate image in file 
     * @param type $filename_pdf
     * @return array
     */
    function converter($filename_pdf) {
        $filename = explode(".", $filename_pdf);
        $full_filename_pdf = MEDIAPATH . "pdf/$filename_pdf";
        $image_path = MEDIAPATH . "image/" . $filename[0];
        $full_filename_image = $image_path . "/" . $filename[0] . ".jpg";
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }
        echo exec('convert "' . $full_filename_pdf . '" "' . $full_filename_image . '" 2>&1');
        $files_image = scandir($image_path);
        $image_array = array();
        foreach ($files_image as $fi):
            if ($fi != "." && $fi != "..") {
                $relpath_image = explode(BASEPATH, "$image_path/$fi");
                array_push($image_array, "./" . $relpath_image[1]);
            }
        endforeach;
        return $image_array;
    }

}
