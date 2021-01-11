<?php namespace System\Handlers;

/**
 * Class NotFoundHandler
 * @package System\Handlers
 */
class NotFoundHandler extends BaseHandler
{
    protected function index(): void
    {
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => '404 - Pagina niet gevonden'
        ]);
    }
}
