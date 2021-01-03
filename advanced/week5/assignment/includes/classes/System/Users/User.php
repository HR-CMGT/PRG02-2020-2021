<?php namespace System\Users;

/**
 * Class User
 * @package System\Users
 */
class User
{
    public int $id;
    public string $email;
    public string $password;
    public string $name;

    /**
     * Save a user to the database
     *
     * @param User $user
     * @param \PDO $db
     * @return bool
     */
    public static function add(User $user, \PDO $db): bool
    {
        $query = "INSERT INTO users (email, password, name)
                  VALUES (:email, :password, :name)";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':email' => $user->email,
            ':password' => $user->password,
            ':name' => $user->name,
        ]);
    }

    /**
     * Get a specific user by its email
     *
     * @param string $email
     * @param \PDO $db
     * @return User
     * @throws \Exception
     */
    public static function getByEmail(string $email, \PDO $db): User
    {
        $statement = $db->prepare("SELECT * FROM users WHERE email = :email");
        $statement->execute([':email' => $email]);

        if (($user = $statement->fetchObject("System\\Users\\User")) === false) {
            throw new \Exception("User email is not available in the database");
        }

        return $user;
    }
}
