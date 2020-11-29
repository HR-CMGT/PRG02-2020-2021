<?php
//Require index to make sure we have our album data
require_once dirname(__FILE__) . "/index.php";

//Retrieve the GET parameter from the 'Super global'
$albumNumber = $_GET['album-number'];

//Get the records from the array
$album = $albums[$albumNumber];
