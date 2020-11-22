<?php
//Get Data file from configured path
$musicRaw = file_get_contents(DATA_PATH . "music.json");
$musicRawList = json_decode($musicRaw, true);

//Create new instance of MusicCollection & add albums
$musicCollection = new MusicCollection();
foreach ($musicRawList as $albumRaw) {
    $musicCollection->addAlbum($albumRaw);
}

//Get formatted albums objects & total
$albums = $musicCollection->getAlbums();
$totalAlbums = $musicCollection->getTotalAlbums();
