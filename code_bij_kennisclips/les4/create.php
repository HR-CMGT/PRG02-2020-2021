<?php
/**
 * @var Mysqli $db
 */


//Check if Post isset
if (isset($_POST['submit'])) {
    // Database connection stored in var $db
    require_once "includes/database.php";

    //Retrieve form data entered by the user
    $name   = $_POST['name'];
    $artist = $_POST['artist'];
    $genre  = $_POST['genre'];
    $year   = $_POST['year'];
    $tracks = $_POST['tracks'];
    $image  = 'picture.png';

    // Build the insert query
    $query = "INSERT INTO albums (name, artist, genre, year, tracks, image)
              VALUES ('$name', '$artist', '$genre', $year, $tracks, '$image')";


    $result = mysqli_query($db, $query)
        or die('Error: '.$query);

    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
    }

    //Close connection
    mysqli_close($db);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Create</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <h1>Create album</h1>

    <!-- enctype="multipart/form-data" no characters will be converted -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="data-field">
            <label for="artist">Artist</label>
            <input id="artist" type="text" name="artist" value="<?= isset($artist) ? $artist : '' ?>"/>
            <span class="errors"><?= isset($errors['artist']) ? $errors['artist'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="name">Album</label>
            <input id="name" type="text" name="name" value="<?= isset($name) ? $name : '' ?>"/>
            <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre" value="<?= isset($genre) ? $genre : '' ?>"/>
            <span class="errors"><?= isset($errors['genre']) ? $errors['genre'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="year">Year</label>
            <input id="year" type="text" name="year" value="<?= isset($year) ? $year : '' ?>"/>
            <span class="errors"><?= isset($errors['year']) ? $errors['year'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="tracks">Tracks</label>
            <input id="tracks" type="number" name="tracks" value="<?= isset($tracks) ? $tracks : '' ?>"/>
            <span class="errors"><?= isset($errors['tracks']) ? $errors['tracks'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"/>
        </div>
        <div class="data-submit">
            <input type="submit" name="submit" value="Save"/>
        </div>
    </form>
</body>
</html>