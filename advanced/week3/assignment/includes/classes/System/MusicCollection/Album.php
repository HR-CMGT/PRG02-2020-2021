<?php namespace System\MusicCollection;

/**
 * Class Album
 * @package System\MusicCollection
 */
class Album
{
    public int $id;
    public string $name = '';
    public string $artist = '';
    public string $genre = '';
    public string $year = '';
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
}
