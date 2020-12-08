<?php
// Include data (all albums)
/** @var array $musicAlbums */
require_once 'includes/music-data.php';

// IF index is not present in url or value is empty
if(!isset($_GET['index']) || $_GET['index'] == '')
{
    // redirect to index.php
    header('Location: index.php');
    exit;
}
// Get index of album from url (GET)
$index = $_GET['index'];

// get album from albums collection
$album = $musicAlbums[$index];


?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Details</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<section>
    <h1><?= $album['artist'] . ' - ' . $album['album']; ?></h1>
    <ul>
        <li>Genre: <?= $album['genre']; ?></li>
        <li>Year: <?= $album['year']; ?></li>
        <li>Tracks: <?= $album['tracks']; ?></li>
    </ul>
</section>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>









