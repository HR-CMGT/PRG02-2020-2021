<?php namespace Form;

/**
 * Class Data
 * @package Form
 */
class Data
{
    private array $post;

    /**
     * Data constructor.
     *
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->post = $post;
    }

    /**
     * Check if a var exists in the current post state
     *
     * @param string $var
     * @return bool
     */
    public function varExists(string $var): bool
    {
        return array_key_exists($var, $this->post);
    }

    /**
     * Retrieve a var from the post array
     *
     * @param string $var
     * @return mixed
     */
    public function getPostVar(string $var): string
    {
        return htmlentities($this->post[$var]);
    }
}
