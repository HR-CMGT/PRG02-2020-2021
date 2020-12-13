<?php
// redirect when uri does not contain a id
if(!isset($_GET['id'])) {
    // redirect to index.php
    header('Location: index.php');
    exit;
}

//Require database in this file
require_once "includes/database.php";

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM albums WHERE id = " . mysqli_escape_string($db, $albumId);
$result = mysqli_query($db, $query)
    or die ('Error: ' . $query );

if(mysqli_num_rows($result) == 1)
{
    $album = mysqli_fetch_assoc($result);
}
else {
    // redirect when db returns no result
    header('Location: index.php');
    exit;
}

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
<h1><?= $album['artist'] . ' - ' . $album['name'] ?></h1>

<div>
    <img src="images/<?= $album['image'] ?>" alt=""/>
</div>
<ul>
    <li>Genre:  <?= $album['genre'] ?></li>
    <li>Year:   <?= $album['year'] ?></li>
    <li>Tracks: <?= $album['tracks'] ?></li>
</ul>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
