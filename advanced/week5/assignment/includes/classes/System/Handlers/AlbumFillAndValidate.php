<?php namespace System\Handlers;

use System\Form\Data;
use System\Form\Validation\AlbumValidator;

/**
 * Trait AlbumFillAndValidate
 * @package System\Handlers
 */
trait AlbumFillAndValidate
{
    private Data $formData;

    public function executePostHandler(): void
    {
        if (isset($_POST['submit'])) {
            //Set form data
            $this->formData = new Data($_POST);

            //Override object with new variables
            $this->album->artist = $this->formData->getPostVar('artist');
            $this->album->name = $this->formData->getPostVar('name');
            $this->album->genre = $this->formData->getPostVar('genre');
            $this->album->year = $this->formData->getPostVar('year');
            $this->album->tracks = $this->formData->getPostVar('tracks');

            //Actual validation
            $validator = new AlbumValidator($this->album);
            $validator->validate();
            $this->errors = $validator->getErrors();
        }
    }
}
