<?php namespace System\Handlers;

use System\Databases\Database;
use System\Users\User;

/**
 * Class UserHandler
 * @package System\Handlers
 */
class UserHandler extends BaseHandler
{
    public function initialize(): void
    {
        //TEMP script just to add an user.
        $db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();
        $user = new User();
        $user->email = 'moora@hr.nl';
        $user->password = password_hash('test', PASSWORD_ARGON2I);
        $user->name = 'Antwan';
        User::add($user, $db);
        exit;
    }
}
