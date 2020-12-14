<?php

// General settings
$host       = "localhost";
$database   = "demo_teachers";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
    or die("Error: " . mysqli_connect_error());
