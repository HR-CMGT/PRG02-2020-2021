<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Set form data
    $formData = new \System\Form\Data($_POST);

    //Override object with new variables
    /** @var Album $album */
    $album->artist = $formData->getPostVar('artist');
    $album->name = $formData->getPostVar('name');
    $album->genre = $formData->getPostVar('genre');
    $album->year = $formData->getPostVar('year');
    $album->tracks = $formData->getPostVar('tracks');

    //Actual validation
    $validator = new \System\Form\Validation\AlbumValidator($album);
    $validator->validate();
    $errors = $validator->getErrors();
}
