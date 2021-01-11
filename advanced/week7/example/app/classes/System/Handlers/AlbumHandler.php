<?php namespace System\Handlers;

use System\Form\Data;
use System\Databases\Objects\Album;
use System\Utils\Image;

/**
 * Class AlbumHandler
 * @package System\Handlers
 * @noinspection PhpUnused
 */
class AlbumHandler extends BaseHandler
{
    use AlbumFillAndValidate;

    private Album $album;
    private Data $formData;
    private Image $image;

    /**
     * AlbumHandler constructor.
     *
     * @param $templateName
     * @throws \ReflectionException
     */
    public function __construct(string $templateName)
    {
        parent::__construct($templateName);
        $this->image = new Image();
    }

    protected function index(): void
    {
        //Get all albums
        $albums = Album::getAll();

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Home',
            'albums' => $albums,
            'totalAlbums' => count($albums)
        ]);
    }

    protected function add(): void
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
            $this->album->image = 'images/' . $this->image->save($_FILES['image']);

            //Set user id in Album
            $this->album->user_id = $this->session->get('user')->id;

            //Save the record to the db
            if ($this->album->save()) {
                $success = 'Your new album has been added to the database!';
                //Override to see a new empty form
                $this->album = new Album();
            } else {
                $this->errors[] = 'Whoops, something went wrong adding the album';
            }
        }

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Add album',
            'album' => $this->album,
            'success' => $success ?? false,
            'errors' => $this->errors
        ]);
    }

    protected function edit(): void
    {
        try {
            //Get the record from the db & execute POST logic
            $this->album = Album::getById($_GET['id']);
            $this->executePostHandler();

            //Database magic when no errors are found
            if (isset($this->formData) && empty($this->errors)) {
                //If image is not empty, process the new image file
                if ($_FILES['image']['error'] != 4) {
                    //Remove old image
                    $this->image->delete($this->album->image);

                    //Store new image & retrieve name for database saving (override current image name)
                    $this->album->image = 'images/' . $this->image->save($_FILES['image']);
                }

                //Save the record to the db
                if ($this->album->save()) {
                    $success = 'Your album has been updated in the database!';
                } else {
                    $this->errors[] = 'Whoops, something went wrong updating the album';
                }
            }

            $pageTitle = 'Edit ' . $this->album->name;
        } catch (\Exception $e) {
            $this->logger->error($e);
            $this->errors[] = 'Whoops: ' . $e->getMessage();
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

    /**
     * @noinspection PhpUnused
     *
     * @return void
     */
    protected function detail(): void
    {
        try {
            //Get the records from the db
            $album = Album::getById($_GET['id']);

            //Default page title
            $pageTitle = $album->name;
        } catch (\Exception $e) {
            //Something went wrong on this level
            $this->errors[] = $e->getMessage();
            $pageTitle = 'Album does\'t exist';
        }

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => $pageTitle,
            'album' => $album ?? false,
            'errors' => $this->errors
        ]);
    }

    protected function delete(): void
    {
        try {
            //Get the record from the db
            $album = Album::getById($_GET['id']);

            //Database magic when no errors are found
            if (Album::delete($_GET['id'])) {
                //Remove image
                $this->image->delete($album->image);

                //Redirect to homepage after deletion & exit script
                header('Location: ' . BASE_PATH);
                exit;
            }
        } catch (\Exception $e) {
            //There is no delete template, always redirect.
            $this->logger->error($e);
            header('Location: ' . BASE_PATH);
            exit;
        }
    }
}
