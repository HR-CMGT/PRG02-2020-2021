<?php namespace MusicCollection;

/**
 * Class Album
 * @package MusicCollection
 */
class Album
{
    public string $name;
    public string $artist;
    public string $genre;
    public string $year;
    public int $tracks;

    /**
     * Initialize object
     *
     * @param string $name
     * @param string $artist
     * @param string $genre
     * @param string $year
     * @param int $tracks
     */
    public function __construct(string $name, string $artist, string $genre, string $year, int $tracks)
    {
        $this->name = $name;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->year = $year;
        $this->tracks = $tracks;
    }
} 
