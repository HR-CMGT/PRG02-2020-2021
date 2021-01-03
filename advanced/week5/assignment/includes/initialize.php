<?php
//Require needed files
require_once "settings.php";
require_once "vendor/autoload.php";

//Always start our session (always place AFTER require of classes to avoid http://stackoverflow.com/a/9443818)
$session = new \System\Utils\Session();

try {
    //Get the url from the .htaccess rewrite & check existence (if not: 404!)
    $currentPage = (!isset($_GET['_url']) || $_GET['_url'] == "" ? "home" : $_GET['_url']);
    $className = '\\System\\Handlers\\' . ucfirst($currentPage) . 'Handler';
    if (!class_exists($className)) {
        header('HTTP/1.0 404 Not Found');
        $className = '\\System\\Handlers\\NotFoundHandler';
    }

    //Initialize controller & get the rendered data
    /** @var $page \System\Handlers\BaseHandler */
    $page = new $className($session);
    $data = $page->getData();
} catch (Exception $e) {
    //TODO: Make a nice logging system instead of showing end users your mistakes :)
    die("Oops, try to fix your error please: " . $e->getMessage() . " on line " . $e->getLine() . " of " . $e->getFile());
}
