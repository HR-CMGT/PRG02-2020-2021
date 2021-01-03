<?php namespace System\Handlers;

use System\Databases\Database;
use System\Form\Data;
use System\MusicCollection\Album;
use System\Utils\Image;

/**
 * Class AddHandler
 * @package System\Handlers
 */
class AddHandler extends BaseHandler
{
    use AlbumFillAndValidate;

    private Album $album;

    public function initialize(): void
    {
        //If not logged in, redirect to login
        if (!$this->session->keyExists('user')) {
            header('Location: login');
            exit;
        }

        //Set default empty album & execute POST logic
        $this->album = new Album();
        $this->executePostHandler();

        //Special check for add form only
        if (isset($this->formData) && $_FILES['image']['error'] == 4) {
            $this->errors[] = 'Image cannot be empty';
        }

        //Database magic when no errors are found
        if (isset($this->formData) && empty($this->errors)) {
            //Store image & retrieve name for database saving
            $image = new Image();
            $this->album->image = 'images/' . $image->save($_FILES['image']);

            //Set user id in Album
            $this->album->user_id = $this->session->get('user')->id;

            //Init the database
            $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();

            //Save the record to the db
            if (Album::add($this->album, $db)) {
                $success = "Your new album has been added to the database!";
                //Override to see a new empty form
                $this->album = new Album("", "", "", "", "", "");
            } else {
                //TODO: remove from errors, logging!
                $this->errors[] = "Database error info: " . $db->errorInfo();
            }
        }

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Add album',
            'album' => $this->album ?? false,
            'success' => $success ?? false,
            'errors' => $this->errors
        ]);
    }
}
