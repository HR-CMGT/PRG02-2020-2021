<?php
//Require music data to use variable in this file
/** @var $db */
require_once "includes/database.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM albums";
$result = mysqli_query($db, $query);

//Loop through the result to create a custom array
$musicAlbums = [];
while ($row = mysqli_fetch_assoc($result)) {
    $musicAlbums[] = $row;
}

//Close connection
mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Music Collection</h1>
<a href="index-alternative.php">Check alternative view</a>
<table>
    <thead>
    <tr>
        <th></th>
        <th>#</th>
        <th>Artist</th>
        <th>Album</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Tracks</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="9">&copy; My Collection</td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($musicAlbums as $musicAlbum) { ?>
        <tr>
            <td class="image"><img src="<?= $musicAlbum['image'] ?>" alt="<?= $musicAlbum['name'] ?>"/></td>
            <td><?= $musicAlbum['id'] ?></td>
            <td><?= $musicAlbum['artist'] ?></td>
            <td><?= $musicAlbum['name'] ?></td>
            <td><?= $musicAlbum['genre'] ?></td>
            <td><?= $musicAlbum['year'] ?></td>
            <td><?= $musicAlbum['tracks'] ?></td>
            <td><a href="detail.php?id=<?= $musicAlbum['id'] ?>">Details</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
