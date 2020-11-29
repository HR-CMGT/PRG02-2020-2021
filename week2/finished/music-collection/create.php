<?php
// Check if form is submitted.
if (isset($_POST['submit']))
{
    // 'Post back' with the data from the form.
    $artist = $_POST['artist'];
    $album  = $_POST['album'];
    $genre  = $_POST['genre'];
    $year   = $_POST['year'];
    $tracks = $_POST['tracks'];

    $errors = [];
    if($artist == '') {
        $errors[] = 'Het veldnaam met artiest mag niet leeg zijn.';
    }
    if($album == '') {
        $errors[] = 'Het veldnaam met album mag niet leeg zijn.';
    }
    if($genre == '') {
        $errors[] = 'Het veldnaam met genre mag niet leeg zijn.';
    }
    if($year == '') {
        $errors[] = 'Het veldnaam met year mag niet leeg zijn.';
    }
    if($tracks == '') {
        $errors[] = 'Het veldnaam met tracks mag niet leeg zijn.';
    }

    if(empty($errors))
    {
        // Now this data can be stored in de database

    }

}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Create new album</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body >
        <section>
            <h1>Create new album</h1>

            <?php if(isset($errors)) { ?>

                <ul class="errors">
                <?php foreach ($errors as $error) { ?>
                    <li><?= $error ?></li>
                <?php } ?>
                </ul>

            <?php } ?>

            <form action="" method="post">
                <div class="data-field">
                    <label for="artist">Artist</label>
                    <input id="artist" type="text" name="artist"
                           value="<?= isset($artist) ? $artist : '' ?>"/>
                </div>
                <div class="data-field">
                    <label for="album">Album</label>
                    <input id="album" type="text" name="album" value=""/>
                </div>
                <div class="data-field">
                    <label for="genre">Genre</label>
                    <input id="genre" type="text" name="genre" value=""/>
                </div>
                <div class="data-field">
                    <label for="year">Year</label>
                    <input id="year" type="text" name="year" value=""/>
                </div>
                <div class="data-field">
                    <label for="tracks">Tracks</label>
                    <input id="tracks" type="number" name="tracks" value=""/>
                </div>
                <div class="data-submit">
                    <input type="submit" name="submit" value="Save"/>
                </div>
            </form>
        </section>
        <div>
            <a href="index.php">Go back to the list</a>
        </div>
	</body>
</html>