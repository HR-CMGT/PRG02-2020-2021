<?php namespace System\MusicCollection;

/**
 * Class Collection
 * @package System\MusicCollection
 */
class Collection
{
    private array $albums = [];

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->albums;
    }

    /**
     * @param array $albums
     */
    public function add(array $albums): void
    {
        $this->albums = $albums;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return count($this->albums);
    }
} 
