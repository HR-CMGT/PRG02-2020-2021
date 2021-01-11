<?php namespace System\Databases\Objects;

use System\Databases\BaseObject;

/**
 * Class Album
 * @package System\Databases\Objects
 */
class Album extends BaseObject
{
    protected static string $table = 'albums';

    public ?int $id = null;
    public ?int $user_id = null;
    public string $name = '';
    public string $artist = '';
    public string $genre = '';
    public string $year = '';
    public int $tracks = 0;
    public string $image = '';
}
