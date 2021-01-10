<?php
/** @var mysqli $db */
require_once "database.php";

//Get the result set from the database with a SQL query
$query = "SELECT 
                albums.*,
                artists.name as artist_name 
          FROM albums
          INNER JOIN artists ON albums.artist_id = artists.id";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$musicAlbums = [];
while ($row = mysqli_fetch_assoc($result)) {
    $musicAlbums[] = $row;
}

//Close connection
mysqli_close($db);
