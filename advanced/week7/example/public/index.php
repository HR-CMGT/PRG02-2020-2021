<?php
//Require needed files
require_once '../app/config/settings.php';
require_once '../app/vendor/autoload.php';

//Initialize bootstrap & render the application
$bootstrap = new \System\Bootstrap\WebBootstrap();
echo $bootstrap->render();
