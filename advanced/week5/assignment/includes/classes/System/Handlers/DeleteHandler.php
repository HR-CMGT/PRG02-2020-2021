<?php namespace System\Handlers;

use System\Databases\Database;
use System\MusicCollection\Album;
use System\Utils\Image;

/**
 * Class DeleteHandler
 * @package System\Handlers
 */
class DeleteHandler extends BaseHandler
{
    public function initialize(): void
    {
        //Init the database
        $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();

        try {
            //Get the record from the db
            $album = Album::getById($_GET['id'], $db);

            //Database magic when no errors are found
            if ($album) {
                //Init image class
                $image = new Image();

                //Save the record to the db
                $album->delete($db);

                //Remove image
                $image->delete($album->image);

                //Redirect to homepage after deletion & exit script
                header("Location: home");
                exit;
            }
        } catch (\Exception $e) {
            //There is nog delete template, always redirect.
            header("Location: home");
            exit;
        }
    }
}
