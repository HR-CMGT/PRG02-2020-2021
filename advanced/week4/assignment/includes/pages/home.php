<?php
//Init the database
$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Create new instance of MusicCollection & set albums
$albumCollection = new \System\MusicCollection\Collection();
$albumCollection->add(\System\MusicCollection\Album::getAll($db->getConnection()));

//Get formatted albums objects & total
$albums = $albumCollection->get();
$totalAlbums = $albumCollection->getTotal();

//Default page title
$pageTitle = 'Home';
