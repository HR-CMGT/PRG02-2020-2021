<?php require_once "includes/initialize.php"; ?>
<!doctype html>
<html>
<head>
    <title>Music Collection Add (Advanced)</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Add album</h1>
<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($success)) { ?>
    <p class="success"><?= $success; ?></p>
<?php } ?>

<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value="<?= $album->artist; ?>"/>
    </div>
    <div class="data-field">
        <label for="name">Album</label>
        <input id="name" type="text" name="name" value="<?= $album->name; ?>"/>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= $album->genre; ?>"/>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= $album->year; ?>"/>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= $album->tracks; ?>"/>
    </div>
    <div class="data-field">
        <label for="image">Image</label>
        <input type="file" name="image" id="image"/>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
