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

    private static ?\PDO $instance = null;
    protected \PDO $connection;

    /**
     * Database constructor. (private to make the Singleton pattern active)
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @throws \Exception
     */
    private function __construct(string $host, string $username, string $password, string $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    public static function getInstance(): \PDO
    {
        if (self::$instance === null) {
            self::$instance = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();
        }

        return self::$instance;
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
            throw new \Exception('DB Connection failed: ' . $e->getMessage());
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
