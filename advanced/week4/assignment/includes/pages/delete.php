<?php
//Init the database
$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

try {
    //Get the record from the db
    $album = \System\MusicCollection\Album::getById($_GET['id'], $db->getConnection());

    //Database magic when no errors are found
    if ($album) {
        //Init image class
        $image = new \System\Utils\Image();

        //Save the record to the db
        $album->delete($db->getConnection());

        //Remove image
        $image->delete($album->image);

        //Redirect to homepage after deletion & exit script
        header("Location: home");
        exit;
    }
} catch (Exception $e) {
    //There is nog delete template, always redirect.
    header("Location: home");
    exit;
}
