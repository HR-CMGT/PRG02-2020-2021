<?php
//TEMP script just to add an user.
$db = new \System\Databases\Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$user = new \System\Users\User();
$user->email = 'moora@hr.nl';
$user->password = password_hash('test', PASSWORD_ARGON2I);
$user->name = 'Antwan';
\System\Users\User::add($user, $db->getConnection());
exit;
