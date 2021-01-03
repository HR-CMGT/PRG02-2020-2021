<?php
//Require DB settings with connection variable
/** @var mysqli $db */
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
    <link rel="stylesheet" type="text/css" href="css/alternative.css"/>
</head>
<body>
<main>
    <h1>Music collection full of awesomeness!</h1>

    <nav>
        <a href="create.php">Create new album</a>
        <a href="index.php">Check default view</a>
    </nav>

    <div class="albums">
        <?php foreach ($musicAlbums as $musicAlbum) { ?>
            <album>
                <div class="cover">
                    <a href="details.php?id=<?= $musicAlbum['id'] ?>">
                        <img src="images/<?= $musicAlbum['image'] ?>" alt="<?= $musicAlbum['name'] ?>"/>
                    </a>
                </div>
                <div class="links">
                    <a class="detail" href="details.php?id=<?= $musicAlbum['id'] ?>"><?= $musicAlbum['artist'] . " - " . $musicAlbum['name'] ?></a>
                    <a class="edit" href="edit.php?id=<?= $musicAlbum['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $musicAlbum['id']?>">Delete</a>
                </div>
            </album>
        <?php } ?>
    </div>
</main>
</body>
</html>
