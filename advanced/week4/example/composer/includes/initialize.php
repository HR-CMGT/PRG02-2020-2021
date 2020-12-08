<?php
//Require needed files
require_once "settings.php";
require_once "vendor/autoload.php";

use AutoLoading\Utils\General as GeneralUtils;

try {
    $output = GeneralUtils::baseUrl();

    $email = "moora@hr.nl";
    if (!GeneralUtils::validateEmail($email)) {
        throw new Exception("Bad email!");
    }

    $mobileDetect = new \Detection\MobileDetect();
    if ($mobileDetect->isMobile()) {
        $output .= ' - Mobile';
    } else {
        $output .= ' - Not Mobile';
    }
} catch (Exception $e) {
    //Set error
    $output = "";
    $error = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
}
