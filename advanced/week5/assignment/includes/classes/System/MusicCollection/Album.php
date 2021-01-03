<?php namespace System\MusicCollection;

/**
 * Class Album
 * @package System\MusicCollection
 */
class Album
{
    public int $id;
    public int $user_id;
    public string $name = "";
    public string $artist = "";
    public string $genre = "";
    public string $year = "";
    public int $tracks = 0;
    public string $image;

    /**
     * @param \PDO $db
     * @return bool
     */
    public function update(\PDO $db): bool
    {
        $query = "UPDATE albums
                  SET name = :name, artist = :artist, genre = :genre, year = :year, tracks = :tracks, image = :image
                  WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':name' => $this->name,
            ':artist' => $this->artist,
            ':genre' => $this->genre,
            ':year' => $this->year,
            ':tracks' => $this->tracks,
            ':image' => $this->image,
            ':id' => $this->id
        ]);
    }

    /**
     * @param \PDO $db
     * @return bool
     */
    public function delete(\PDO $db): bool
    {
        $query = "DELETE FROM albums
                  WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([':id' => $this->id]);
    }

    /**
     * Save a album to the database
     *
     * @param Album $album
     * @param \PDO $db
     * @return bool
     */
    public static function add(Album $album, \PDO $db): bool
    {
        $query = "INSERT INTO albums (user_id, name, artist, genre, year, tracks, image)
                  VALUES (:user_id, :name, :artist, :genre, :year, :tracks, :image)";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':user_id' => $album->user_id,
            ':name' => $album->name,
            ':artist' => $album->artist,
            ':genre' => $album->genre,
            ':year' => $album->year,
            ':tracks' => $album->tracks,
            ':image' => $album->image
        ]);
    }

    /**
     * Get all albums from the database
     *
     * @param \PDO $db
     * @return Album[]
     */
    public static function getAll(\PDO $db): array
    {
        return $db->query("SELECT * FROM albums")->fetchAll(\PDO::FETCH_CLASS, "System\\MusicCollection\\Album");
    }

    /**
     * Get a specific album by its ID
     *
     * @param int $id
     * @param \PDO $db
     * @return Album
     * @throws \Exception
     */
    public static function getById(int $id, \PDO $db): Album
    {
        $statement = $db->prepare("SELECT * FROM albums WHERE id = :id");
        $statement->execute([':id' => $id]);

        if (($album = $statement->fetchObject("System\\MusicCollection\\Album")) === false) {
            throw new \Exception("Album ID is not available in the database");
        }

        return $album;
    }
}
