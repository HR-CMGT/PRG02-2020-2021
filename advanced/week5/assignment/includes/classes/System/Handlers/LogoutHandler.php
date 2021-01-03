<?php namespace System\Handlers;

/**
 * Class LogoutHandler
 * @package System\Handlers
 */
class LogoutHandler extends BaseHandler
{
    public function initialize(): void
    {
        $this->session->destroy();
        header("Location: login");
        exit;
    }
}
