<?php

/**
 * @param $uploadFile
 * @return string
 */
function addImageFile($uploadFile)
{
    //Undefined | Multiple Files | $_FILES Corruption Attack
    //If this request falls under any of them, treat it invalid.
    if (!isset($uploadFile['error']) || is_array($uploadFile['error'])) {
        die('Invalid parameters.');
    }

    //Check $uploadFile['error'] value.
    if ($uploadFile['error'] > 0) {
        die('Please fix your error with the uploaded image with error code: ' . $uploadFile['error']);
    }

    //You should also check filesize here.
    if ($uploadFile['size'] > 1000000) {
        die('Exceeded filesize limit.');
    }

    //You should name it uniquely.
    $fileName = time() . '_' . strtolower(str_replace(" ", "_", $uploadFile['name']));
    if (!move_uploaded_file($uploadFile['tmp_name'], './images/' . $fileName)) {
        die('Failed to move uploaded file.');
    }

    return $fileName;
}

/**
 * @param $fileName
 * @return bool
 */
function deleteImageFile($fileName)
{
    //Unlink/deletes the file from the server
    $removed = unlink('./images/' . $fileName);

    if ($removed == false) {
        die("Something went wrong with removing the image");
    }

    return true;
}
