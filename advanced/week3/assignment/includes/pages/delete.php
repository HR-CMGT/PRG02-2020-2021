<?php
//Require DatabaseSelector to retrieving data
require_once dirname(__FILE__) . "/../classes/System/Databases/DatabaseSelector.php";

//Init the database
$db = new \System\Databases\DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Get the record from the db
$album = $db->getAlbumById($_GET['id']);

//Database magic when no errors are found
if ($album) {
    //Init image class
    require_once dirname(__FILE__) . "/../classes/System/Utils/Image.php";
    $image = new \System\Utils\Image();

    //Delete the record from the db
    $album->delete($db->getConnection());

    //Remove image
    $image->delete($album->image);

    //Redirect to homepage after deletion & exit script
    header("Location: index.php");
    exit;
}
