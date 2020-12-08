<?php
// Include data (all albums)
require_once 'includes/music-data.php';

// Check if form is submitted. This check must be done before
// the check on GET.
if (isset($_POST['submit']))
{
    // 'Post back' with the data from the form.
    $artist = $_POST['artist'];
    $album  = $_POST['album'];
    $genre  = $_POST['genre'];
    $year   = $_POST['year'];
    $tracks = $_POST['tracks'];

    // Now this data can be stored in de database

    // We don't actually store de information in the database
    // But to show it works
    echo 'Artiest is: ' . $artist;
}

// IF index is not present in url or value is empty
if(!isset($_GET['index']) || $_GET['index'] == '')
{
    // redirect to index.php
    header('Location: index.php');
}
else
{
    // Get index of album from url (GET)
    $index = $_GET['index'];

    // get album from albums collection
    $album = $musicAlbums[$index];
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Edit album - <?= $album['album'] ?></title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body >
        <section>
            <h1>Edit album - <?= $album['album']?> by <?= $album['artist'] ?></h1>

            <form action="" method="post">
                <div class="data-field">
                    <label for="artist">Artist</label>
                    <input id="artist" type="text" name="artist" value="<?= $album['artist']; ?>"/>
                </div>
                <div class="data-field">
                    <label for="album">Album</label>
                    <input id="album" type="text" name="album" value="<?= $album['album']; ?>"/>
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
                <div class="data-submit">
                    <input type="hidden" name="album-number" value="<?= $index; ?>"/>
                    <input type="submit" name="submit" value="Save"/>
                </div>
            </form>
        </section>
        <div>
            <a href="index.php">Go back to the list</a>
        </div>
	</body>
</html>