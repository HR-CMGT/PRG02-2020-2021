<?php
//Require database in this file
/** @var $db */
require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM albums WHERE id = " . $albumId;
$result = mysqli_query($db, $query);
$album = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details - <?= $album['name'] ?></title>
</head>
<body>
    <h2><?= $album['artist'] . ' - ' . $album['name'] ?></h2>

    <div>
        <img src="<?= $album['image'] ?>" alt=""/>
    </div>
    <ul>
        <li>Genre: <?= $album['genre'] ?></li>
        <li>Year: <?= $album['year'] ?></li>
        <li>Tracks: <?= $album['tracks'] ?></li>
    </ul>
    <div>
        <a href="index.php">Go back to the list</a>
    </div>
</body>
</html>
