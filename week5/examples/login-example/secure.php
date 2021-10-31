<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

//Get email from session
$email = $_SESSION['login'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hele belangrijke informatie!</title>
</head>
<body>
<h1>Belangrijk!</h1>
<p>U bent ingelogd als <?= $email; ?></p>
<a href="logout.php">Uitloggen</a>
</body>
</html>
