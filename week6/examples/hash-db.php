<?php
/** @var mysqli $db */
require_once "includes/database.php";

$password = password_hash('test', PASSWORD_DEFAULT); //$_POST['password']
$firstName = 'Harry';
$lastName = 'Achternaam';

//INSERT in DB
//$query = "INSERT INTO teachers (first_name, last_name, password)
//                    VALUES('$firstName', '$lastName', '$password')";
//$result = mysqli_query($db, $query);
