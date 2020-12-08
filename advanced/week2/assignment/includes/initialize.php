<?php
//Require needed files
require_once "settings.php";
require_once "classes/MusicCollection/Collection.php";
require_once "classes/MusicCollection/Album.php";

//Set variable for errors
$errors = [];

try {
    //Get current filename to switch between logic
    $pathParts = explode("/", $_SERVER['SCRIPT_NAME']);
    $currentFile = dirname(__FILE__) . "/pages/" . ucfirst($pathParts[count($pathParts) - 1]);

    //If the file exist, load logic for this page
    if (file_exists($currentFile)) {
        require_once $currentFile;
    }
} catch (Exception $e) {
    //Set error
    $errors[] = "Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile();
}
