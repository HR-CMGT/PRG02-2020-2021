<?php namespace MusicCollection;

/**
 * Class Albums
 * @package MusicCollection
 */
class Collection
{
    private array $albums = [];

    /**
     * @return mixed
     */
    public function getAlbums(): array
    {
        return $this->albums;
    }

    /**
     * @param array $albumRaw
     */
    public function addAlbum(array $albumRaw): void
    {
        $this->albums[] = new Album(...array_values($albumRaw));
    }

    /**
     * @return int
     */
    public function getTotalAlbums(): int
    {
        return count($this->albums);
    }
} 
