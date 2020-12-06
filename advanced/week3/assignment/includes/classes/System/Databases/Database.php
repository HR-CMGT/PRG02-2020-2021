<?php namespace System\Databases;

/**
 * Class Database
 * @package System\Databases
 */
class Database
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    protected \PDO $connection;

    /**
     * Database constructor.
     *
     * @param $host
     * @param $username
     * @param $password
     * @param $database
     * @throws \Exception
     */
    public function __construct(string $host, string $username, string $password, string $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    /**
     * Retrieve a new PDO instance to communicate with the DB
     *
     * @throws \Exception
     */
    private function connect(): void
    {
        try {
            $this->connection = new \PDO("mysql:dbname=$this->database;host=$this->host", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("DB Connection failed: " . $e->getMessage());
        }
    }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
