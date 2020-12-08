<?php
require_once 'includes/music-data.php';
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
    <p>
        <a href="create.php">Create new album</a>
    </p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Tracks</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="6">&copy; My Collection</td>
            </tr>
        </tfoot>
        <tbody>
        <?php /** @var array $musicAlbums */ ?>
        <?php foreach ($musicAlbums as $index => $album) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $album['artist'] ?></td>
                <td><?= $album['album'] ?></td>
                <td><?= $album['genre'] ?></td>
                <td><?= $album['year'] ?></td>
                <td><?= $album['tracks'] ?></td>
                <td><a href="details.php?index=<?= $index ?>">Details</a></td>
                <td><a href="edit.php?index=<?= $index ?>">Edit</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>












