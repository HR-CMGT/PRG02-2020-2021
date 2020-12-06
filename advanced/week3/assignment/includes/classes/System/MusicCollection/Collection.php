<?php namespace System\MusicCollection;

/**
 * Class Collection
 * @package System\MusicCollection
 */
class Collection
{
    private array $albums = [];

    /**
     * @return mixed
     */
    public function get(): array
    {
        return $this->albums;
    }

    /**
     * @param Album[] $albums
     */
    public function set(array $albums): void
    {
        $this->albums = $albums;
    }


    /**
     * @param Album $album
     */
    public function add(Album $album): void
    {
        $this->albums[] = $album;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return count($this->albums);
    }
} 
