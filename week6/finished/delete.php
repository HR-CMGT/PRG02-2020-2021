<?php
/** @var mysqli $db */
require_once "includes/database.php";
require_once "includes/image-helpers.php";

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Remove from the server
$image = $_GET['image'];
deleteImageFile($image);

//Remove from the database
$query = "DELETE FROM albums WHERE id = " . mysqli_escape_string($db, $albumId);

mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

//Close connection
mysqli_close($db);

//Redirect to homepage after deletion & exit script
header("Location: index.php");
exit;
