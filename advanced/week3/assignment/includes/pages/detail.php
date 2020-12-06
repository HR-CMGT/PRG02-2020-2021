<?php
//Require DatabaseSelector to retrieving data
require_once dirname(__FILE__) . "/../classes/System/Databases/DatabaseSelector.php";

//Init the database
$db = new \System\Databases\DatabaseSelector(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Get the records from the db
$album = $db->getAlbumById($_GET['id']);
