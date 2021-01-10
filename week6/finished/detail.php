<?php
/** @var mysqli $db */
require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Get the record from the database result
$query = "SELECT albums.*, artists.name as artist_name 
            FROM albums 
            INNER JOIN artists
            WHERE albums.id = " . mysqli_escape_string($db, $albumId);
$result = mysqli_query($db, $query);
$album = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Details</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1><?= $album['artist_name'] . ' - ' . $album['name']; ?></h1>

<div>
    <img src="images/<?= $album['image']; ?>" alt=""/>
</div>
<ul>
    <li>Genre: <?= $album['genre']; ?></li>
    <li>Year: <?= $album['year']; ?></li>
    <li>Tracks: <?= $album['tracks']; ?></li>
</ul>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
