<?php
/**
 * @var mysqli $db
 * @var array $artists
 */
require_once "includes/database.php";
require_once "includes/image-helpers.php";

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $albumId = mysqli_escape_string($db, $_POST['id']);
    $artist = mysqli_escape_string($db, $_POST['artist_id']);
    $name = mysqli_escape_string($db, $_POST['name']);
    $genre = mysqli_escape_string($db, $_POST['genre']);
    $year = mysqli_escape_string($db, $_POST['year']);
    $tracks = mysqli_escape_string($db, $_POST['tracks']);
    $image = mysqli_escape_string($db, $_POST['current-image']);

    //Require the form validation handling
    require_once "includes/form-validation.php";

    //Save variables to array so the form won't break
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
                  SET name = '$name', artist_id = '$artist', genre = '$genre', year = '$year', tracks = '$tracks', image = '$image'
                  WHERE id = '$albumId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    }
} else {
    //Retrieve the GET parameter from the 'Super global'
    $albumId = $_GET['id'];

    //Get the record from the database result
    $query = "
            SELECT albums.*, artists.name as artist_name 
            FROM albums 
            INNER JOIN artists ON albums.artist_id = artists.id 
            WHERE albums.id = " . mysqli_escape_string($db, $albumId);
    $result = mysqli_query($db, $query);
    $album = mysqli_fetch_assoc($result);
}

// Get all artist names for dropdown
require_once 'includes/artist-data.php';

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
<h1>Edit "<?= $album['artist_name'] . ' - ' . $album['name']; ?>"</h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="artist">Artiest</label>
    <select name="artist_id" id="artist">
        <?php foreach ($artists as $artist) { ?>
            <option <?= $artist['id'] == $album['artist_id'] ? 'selected' : '' ?> value="<?= $artist['id'] ?>"><?= $artist['name'] ?></option>
        <?php } ?>
    </select>
    <div class="data-field">
        <label for="name">Album</label>
        <input id="name" type="text" name="name" value="<?= $album['name']; ?>"/>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= $album['genre']; ?>"/>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= $album['year']; ?>"/>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= $album['tracks']; ?>"/>
    </div>
    <div class="data-field">
        <label for="image">Image</label>
        <input type="file" name="image" id="image"/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $albumId; ?>"/>
        <input type="hidden" name="current-image" value="<?= $album['image']; ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
