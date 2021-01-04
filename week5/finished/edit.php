<?php
//Require database in this file & image helpers
/** @var mysqli $db */
require_once "includes/database.php";
require_once "includes/image-helpers.php";

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $albumId = mysqli_escape_string($db, $_POST['id']);
    $artist = mysqli_escape_string($db, $_POST['artist']);
    $name = mysqli_escape_string($db, $_POST['name']);
    $genre = mysqli_escape_string($db, $_POST['genre']);
    $year = mysqli_escape_string($db, $_POST['year']);
    $tracks = mysqli_escape_string($db, $_POST['tracks']);
    $image = mysqli_escape_string($db, $_POST['current-image']);

    //Require the form validation handling
    require_once "includes/form-validation.php";

    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $album = [
        'artist' => $artist,
        'name' => $name,
        'genre' => $genre,
        'year' => $year,
        'tracks' => $tracks,
        'image' => $image,
    ];

    if (empty($errors)) {
        //If image is not empty, process the new image file
        if ($_FILES['image']['error'] != 4) {
            //Remove old image
            deleteImageFile($image);

            //Store new image & retrieve name for database saving (override current image name)
            $image = addImageFile($_FILES['image']);
        }

        //Update the record in the database
        $query = "UPDATE albums
                  SET name = '$name', artist = '$artist', genre = '$genre', year = '$year', tracks = '$tracks', image = '$image'
                  WHERE id = '$albumId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

    }
} else if (isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $albumId = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM albums WHERE id = " . mysqli_escape_string($db, $albumId);
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $album = mysqli_fetch_assoc($result);
    } else {
        // redirect when db returns no result
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Edit "<?= htmlentities($album['artist']) . ' - ' . htmlentities($album['name']) ?>"</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value="<?= htmlentities($album['artist']) ?>"/>
        <span class="errors"><?= isset($errors['artist']) ? $errors['artist'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="name">Album</label>
        <input id="name" type="text" name="name" value="<?= htmlentities($album['name']) ?>"/>
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= htmlentities($album['genre']) ?>"/>
        <span class="errors"><?= isset($errors['genre']) ? $errors['genre'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= htmlentities($album['year']) ?>"/>
        <span class="errors"><?= isset($errors['year']) ? $errors['year'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= htmlentities($album['tracks']) ?>"/>
        <span class="errors"><?= isset($errors['tracks']) ? $errors['tracks'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="image">Image</label>
        <input type="file" name="image" id="image"/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $albumId ?>"/>
        <input type="hidden" name="current-image" value="<?= $album['image'] ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
