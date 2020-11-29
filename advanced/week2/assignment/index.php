<?php require_once "includes/initialize.php"; ?>
<!doctype html>
<html>
<head>
    <title>Students Advanced PHP Module</title>
    <meta name="description" content="Students Advanced PHP Module"/>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>
<h1>Music Collection</h1>
<?php if (isset($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="add.php">Add new album</a>
<?php if (isset($albums)): ?>
    <table>
        <thead>
        <tr>
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
            <td colspan="8">&copy; My Collection with <?= $totalAlbums; ?> albums</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($albums as $index => $album): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $album->artist; ?></td>
                <td><?= $album->name; ?></td>
                <td><?= $album->genre; ?></td>
                <td><?= $album->year; ?></td>
                <td><?= $album->tracks; ?></td>
                <td><a href="detail.php?album-number=<?= $index; ?>">Details</a></td>
                <td><a href="edit.php?album-number=<?= $index; ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>
