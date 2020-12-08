<?php
$album = [
    'title' => 'The greatest hits',
    'artist' => 'Madonna'
];

if(!isset($_GET['id'])) echo 'Er is geen id opgegeven in de url.';

// Stap 1 connectie maken
$dbConnection =  mysqli_connect('localhost', 'root', '', 'music_collection');

$id = $_GET['id'];
// Stap 2 Query opbouwen
$query = "SELECT artist, name FROM albums WHERE id=$id";

// JE KRIJGT EEN TABEL TERUG!!!!
// ONTHOUDEN!!!!
//
$result = mysqli_query($dbConnection, $query)
    or die('Error in query: '.$query);

$album =  mysqli_fetch_assoc($result);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detailpagina</title>
</head>
<body>
    <h2>Details - <?= $album['name']?></h2>
    <ul>
        <li>Titel - <?= $album['name'] ?></li>
        <li>Artiest - <?= $album['artist'] ?></li>
    </ul>
</body>
</html>
