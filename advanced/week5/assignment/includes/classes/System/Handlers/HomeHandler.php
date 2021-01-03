<?php namespace System\Handlers;

use System\Databases\Database;
use System\MusicCollection\Album;
use System\MusicCollection\Collection;

/**
 * Class HomeHandler
 * @package System\Handlers
 */
class HomeHandler extends BaseHandler
{
    public function initialize(): void
    {
        //Init the database
        $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();

        //Create new instance of MusicCollection & set albums
        $albumCollection = new Collection();
        $albumCollection->add(Album::getAll($db));

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Home',
            'albums' => $albumCollection->get(),
            'totalAlbums' => $albumCollection->getTotal()
        ]);
    }
}
