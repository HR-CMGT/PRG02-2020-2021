<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    /** @var Album $album */
    $album->artist = $_POST['artist'];
    $album->name = $_POST['name'];
    $album->genre = $_POST['genre'];
    $album->year = $_POST['year'];
    $album->tracks = $_POST['tracks'];

    //Check if data is valid & generate error if not so
    if ($album->artist == "") {
        $errors[] = 'Artist cannot be empty';
    }
    if ($album->name == "") {
        $errors[] = 'Album cannot be empty';
    }
    if ($album->genre == "") {
        $errors[] = 'Genre cannot be empty';
    }
    if ($album->year == "") {
        $errors[] = 'Year cannot be empty';
    }
    if (!is_numeric($album->year) || strlen($album->year) != 4) {
        $errors[] = 'Year needs to be a number with the length of 4';
    }
    if ($album->tracks == "") {
        $errors[] = 'Tracks cannot be empty';
    }
    if (!is_numeric($album->tracks)) {
        $errors[] = 'Tracks need to be a number';
    }
}
