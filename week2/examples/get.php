<?php
// Set a default message in the variable
$message = "leeg!";

// Overwrite the above message if the GET value is available
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

// Those 4 lines above can be written in a more modern one-line way in PHP7:
//$message = $_GET['message'] ?? 'leeg!';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oefening GET</title>
</head>
<body>
<h1>Oefening GET</h1>
<p>Het resultaat is: <?= $message; ?></p>
<a href="get.php?message=test">Klik op mij</a>
<a href="get.php?message=boe">Klik nu op mij</a>
</body>
</html>
