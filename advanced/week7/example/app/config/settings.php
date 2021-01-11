<?php
//Define DB credentials
define('DB_HOST', '192.168.50.6');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'music_collection');

//Paths
define('BASE_PATH', '/week7/example/');
define('LOG_PATH', '../app/logs/');
define('INCLUDES_PATH', __DIR__ . '/../');
define('RESOURCES_PATH', 'public/');

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function (int $severity, string $message, string $file, int $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
