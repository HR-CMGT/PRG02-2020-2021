<?php namespace System\Databases;

use System\MusicCollection\Album;

/**
 * Class DatabaseSelector
 * @package System\Databases
 */
class DatabaseSelector extends Database
{
    /**
     * Get all albums from the database
     *
     * @return array
     */
    public function getAlbums(): array
    {
        return $this->connection->query("SELECT * FROM albums")->fetchAll(\PDO::FETCH_CLASS, "System\\MusicCollection\\Album");
    }

    /**
     * Get a specific album by its ID
     *
     * @param $id
     * @return Album
     * @throws \Exception
     */
    public function getAlbumById(int $id): Album
    {
        $statement = $this->connection->prepare("SELECT * FROM albums WHERE id = :id");
        $statement->execute([':id' => $id]);

        if (($album = $statement->fetchObject("System\\MusicCollection\\Album")) === false) {
            throw new \Exception("ID is not available in the database");
        }

        return $album;
    }
}
