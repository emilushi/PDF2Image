<?php

session_start();
/*
  |-----------------------------------------------------------------------------
  | PATH Environment
  |-----------------------------------------------------------------------------
  |
 */
define("BASEPATH", dirname(__FILE__) . "/");
define("MEDIAPATH", BASEPATH . "media/");

/*
  |-----------------------------------------------------------------------------
  | Set library to convert the PDF file
  |-----------------------------------------------------------------------------
  | "gviewer" || "convert" || "imagick"
 */
define("USELIB", "gviewer");
