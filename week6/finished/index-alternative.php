<?php
//Require music data to use variable in this file
/** @var array $musicAlbums */
require_once "includes/music-data.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body id="alternative">
<div id="container">
    <h1>Music collection full of awesomeness!</h1>

    <div class="intro-links">
        <a href="create.php">Create new album</a>
        <a href="index.php">Check default view</a>
    </div>

    <div class="albums">
        <?php foreach ($musicAlbums as $musicAlbum) { ?>
            <div class="album">
                <div class="cover">
                    <a href="detail.php?id=<?= $musicAlbum['id']; ?>">
                        <img src="images/<?= $musicAlbum['image']; ?>" alt="<?= $musicAlbum['name']; ?>"/>
                    </a>
                </div>
                <div class="links">
                    <a class="detail" href="detail.php?id=<?= $musicAlbum['id']; ?>"><?= $musicAlbum['artist_name'] . " - " . $musicAlbum['name']; ?></a>
                    <a class="edit" href="edit.php?id=<?= $musicAlbum['id']; ?>">Edit</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
