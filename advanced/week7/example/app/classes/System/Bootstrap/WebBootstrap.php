<?php namespace System\Bootstrap;

use System\Handlers\BaseHandler;
use System\Utils\Session;
use System\Utils\Logger;

/**
 * Class WebBootstrap
 * @package System\Bootstrap
 */
class WebBootstrap implements BootstrapInterface
{
    private string $className;
    private string $action;
    private Session $session;
    private Logger $logger;

    public function __construct()
    {
        session_start();
        $this->session = new Session($_SESSION);
        $this->logger = new Logger();
        $this->setup();
    }

    /**
     * Setup the route based on current path
     */
    public function setup(): void
    {
        //Get the url from the nginx config & check existence (if not: 404!)
        $route = (!isset($_GET['_url']) || $_GET['_url'] == '' ? '' : $_GET['_url']);
        require_once INCLUDES_PATH . 'config/routes.php';

        //Check existence of route & initiate correct Handler & actions based on route
        /** @var array $routes */
        if (isset($routes[$route])) {
            list($class, $action) = explode('@', $routes[$route]);
            $this->className = '\\System\\Handlers\\' . $class;
            $this->action = $action;
        } else {
            header('HTTP/1.0 404 Not Found');
            $this->className = '\\System\\Handlers\\NotFoundHandler';
            $this->action = 'index';
        }
    }

    /**
     * Initialize controller, set dynamic properties, call current action & get the rendered data
     *
     * @return string
     */
    public function render(): string
    {
        try {
            if (!class_exists($this->className)) {
                throw new \Exception('Class ' . $this->className . ' does not exist!');
            }
            /** @var BaseHandler $page */
            $page = new $this->className($this->action);
            $page->session = $this->session;
            $page->logger = $this->logger;

            return $page->{$this->action}()->getHTML();
        } catch (\Exception $e) {
            $this->logger->error($e);
            die('Oops, something went wrong, please contact the site administrator.');
        }
    }
}
