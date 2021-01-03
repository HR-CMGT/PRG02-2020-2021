<?php namespace System\Handlers;

/**
 * Class NotFoundHandler
 * @package System\Handlers
 */
class NotFoundHandler extends BaseHandler
{
    public function initialize(): void
    {
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => "404 - Pagina niet gevonden"
        ]);
    }
}
