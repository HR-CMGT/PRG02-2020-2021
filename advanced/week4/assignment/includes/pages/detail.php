<?php
//Init the database
$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

try {
    //Get the records from the db
    $album = \System\MusicCollection\Album::getById($_GET['id'], $db->getConnection());

    //Default page title
    $pageTitle = $album->name;
} catch (Exception $e) {
    //Something went wrong on this level
    $errors[] = $e->getMessage();
    $pageTitle = 'Album does\'t exist';
}
