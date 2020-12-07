<?php namespace AutoLoading\Utils;

/**
 * Class General
 * @package AutoLoading\Utils
 */
class General
{
    /**
     * @param string $email
     * @return bool
     */
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @return string
     */
    public static function baseUrl(): string
    {
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        );
    }
} 
