<?php namespace System\Handlers;

use System\Databases\Database;
use System\Form\Data;
use System\MusicCollection\Album;
use System\Utils\Image;

/**
 * Class AddHandler
 * @package System\Handlers
 */
class EditHandler extends BaseHandler
{
    use AlbumFillAndValidate;

    private Album $album;

    public function initialize(): void
    {
        //Init the database
        $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();

        try {
            //Get the record from the db & execute POST logic
            $this->album = Album::getById($_GET['id'], $db);
            $this->executePostHandler();

            //Database magic when no errors are found
            if (isset($this->formData) && empty($this->errors)) {
                //If image is not empty, process the new image file
                if ($_FILES['image']['error'] != 4) {
                    //Init image class
                    $image = new Image();

                    //Remove old image
                    $image->delete($this->album->image);

                    //Store new image & retrieve name for database saving (override current image name)
                    $this->album->image = 'images/' . $image->save($_FILES['image']);
                }

                //Save the record to the db
                if ($this->album->update($db)) {
                    $success = "Your album has been updated in the database!";
                } else {
                    //Probably should't be returned to a user..
                    $this->errors[] = "Database error info: " . $db->errorInfo();
                }
            }

            $pageTitle = 'Edit ' . $this->album->name;
        } catch (\Exception $e) {
            //Probably should't be returned to a user..
            $this->errors[] = $e->getMessage();
            $pageTitle = 'Album does\'t exist';
        }

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => $pageTitle,
            'album' => $this->album ?? false,
            'success' => $success ?? false,
            'errors' => $this->errors
        ]);
    }
}
