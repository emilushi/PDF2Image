<?php
require 'config.php';
require 'package/PdfToImage.php';
require 'helper.php';

use package\PdfToImage;

$pti = new PdfToImage();

$html = "";
$link = "";
$file_pdf = isset($_GET["file"]) ? $_GET["file"] : NULL;
$_SESSION['pdf_file'] = $file_pdf;
if (file_exists(MEDIAPATH . "pdf/$file_pdf")) {
    if (strcmp(USELIB, "gviewer") == 0) {
        $image_list = $pti->pdf2image($file_pdf, " -zoom 3 ");
        $html = gviewer_list_html($image_list);
        $link = $image_list[0];
    } else if (strcmp(USELIB, "convert") == 0) {
        $image_list = $pti->converter($file_pdf);
        $html = convert_list_html($image_list);
        $link = $image_list[0];
    } else if (strcmp(USELIB, "imagick") == 0) {
        $image_list = $pti->imagemagick($file_pdf);
        $html = imagick_list_html($image_list);
        $link = "imagick.php?i=0";
    }
}
?>

<!DOCTYPE html>
<html lang="en-GB" xml:lang="en-GB" xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title>Example Zoom</title>

        <meta charset="UTF-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./media/zoomify/zoomify.css" media="all" />
        <script type="text/javascript" src="./media/zoomify/zoomify.js"></script>
        <style>
            body{background: black}
            ul#list-a { list-style: none; display: block; text-align:center; }
            ul#list-a li{display: inline-block}
            ul#list-a li a { display: block; width: 100px; height: 100px; margin-bottom: 20px; overflow: hidden; }
            ul#list-a li a img { border: none; }
        </style>
        <script>
            $(document).ready(function() {
                jQuery('#list-a a').on({
                    'click': function() {
                        jQuery('#image-zoom').attr('src', jQuery(this).attr("data-src"));
                    }
                });
            });

        </script>
    </head>
    <body>
        <div id="image-zoom-wrapper">
            <img id="image-zoom" src="<?php echo $link; ?>" alt="File does not exists!" />
        </div>
        <?php echo $html; ?>
    </body>
</html>
