<?php
//Define DB credentials
define("DB_HOST", "192.168.50.6");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "demo");

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
