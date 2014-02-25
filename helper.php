<?php

function gviewer_list_html($image_list) {
    $html = "<ul id='list-a'>";
    foreach ($image_list as $il) {
        $html.= "<li><a href='#' data-src='$il'><img src='$il' height='50px' /></a></li>";
    }
    $html .= "</ul>";
    return $html;
}

function convert_list_html($image_list) {
    $html = "<ul id='list-a'>";
    foreach ($image_list as $il) {
        $html.= "<li><a href='#' data-src='$il'><img src='$il' height='50px' /></a></li>";
    }
    $html .= "</ul>";
    return $html;
}

function imagick_list_html($image_list) {
    $html = "<ul id='list-a'>";

    for ($index = 0; $index < (count($image_list) ); $index++) {
        $html.= "<li><a href='#' data-src='imagick.php?i=$index'><img src='imagick.php?i=$index' height='50px' /></a></li>";
    }
    $html .= "</ul>";
    return $html;
}
