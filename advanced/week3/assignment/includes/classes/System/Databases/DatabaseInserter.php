<?php namespace System\Databases;

use System\MusicCollection\Album;

/**
 * Class DatabaseInserter
 * @package System\Databases
 */
class DatabaseInserter extends Database
{
    /**
     * Save a album to the database
     *
     * @param Album $album
     * @return bool
     */
    public function addAlbum(Album $album): bool
    {
        $query = "INSERT INTO albums (name, artist, genre, year, tracks, image)
                  VALUES (:name, :artist, :genre, :year, :tracks, :image)";
        $statement = $this->connection->prepare($query);
        return $statement->execute([
            ':name' => $album->name,
            ':artist' => $album->artist,
            ':genre' => $album->genre,
            ':year' => $album->year,
            ':tracks' => $album->tracks,
            ':image' => $album->image
        ]);
    }
}
