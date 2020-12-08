<?php
//Define custom constants to use with project
define("INCLUDES_PATH", __DIR__ . "/");

//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
