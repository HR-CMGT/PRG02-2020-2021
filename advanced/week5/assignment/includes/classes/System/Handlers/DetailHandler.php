<?php namespace System\Handlers;

use System\Databases\Database;
use System\MusicCollection\Album;

/**
 * Class DetailHandler
 * @package System\Handlers
 */
class DetailHandler extends BaseHandler
{
    public function initialize(): void
    {
        //Init the database
        $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();

        try {
            //Get the records from the db
            $album = Album::getById($_GET['id'], $db);

            //Default page title
            $pageTitle = $album->name;
        } catch (\Exception $e) {
            //Something went wrong on this level
            $errors[] = $e->getMessage();
            $pageTitle = 'Album does\'t exist';
        }

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => $pageTitle,
            'album' => $album ?? false,
            'errors' => $this->errors
        ]);
    }
}
