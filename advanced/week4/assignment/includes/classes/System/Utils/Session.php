<?php namespace System\Utils;

/**
 * Class Session
 * @package System\Utils
 */
class Session
{
    private array $data = [];

    /**
     * Initialize object
     */
    public function __construct()
    {
        session_start();
        $this->data = $_SESSION;
    }

    /**
     * Check if a var exists in the current session state
     *
     * @param string $var
     * @return bool
     */
    public function keyExists(string $var): bool
    {
        return array_key_exists($var, $this->data);
    }

    /**
     * Retrieve a var from the session array
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->data[$key];
    }

    /**
     * Set a var from in the global session
     *
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Delete a var from the global session
     *
     * @param $key
     */
    public function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Destroy the session
     */
    public function destroy(): void
    {
        session_destroy();
    }
}
