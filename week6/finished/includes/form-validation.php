<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($artist == "") {
    $errors['artist'] = 'Artist cannot be empty'; //Alternative for errors behind input and not in summary
}
if ($name == "") {
    $errors['name'] = 'Album name cannot be empty';
}
if ($genre == "") {
    $errors['genre'] = 'Genre cannot be empty';
}
if ($year == "") {
    $errors['year'] = 'Year cannot be empty';
}
if (!is_numeric($year) || strlen($year) != 4) {
    $errors['year'] = 'Year needs to be a number with the length of 4';
}
if ($tracks == "") {
    $errors['tracks'] = 'Tracks cannot be empty';
}
if (!is_numeric($tracks)) {
    $errors['tracks'] = 'Tracks need to be a number';
}
