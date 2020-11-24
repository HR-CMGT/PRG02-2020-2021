<?php
// Get the number for the current hour (24 clock)
$hours = date('G');


// Decide the text depending on current time.

// It is morning when the hours od the day contain:
// 00, 01, 02, 03, 04, 05
if ($hours < 6) {
    $period = 'nacht';
}
// 06, 07, 08, 09, 10 ,11
elseif ($hours < 12) {
    $period = 'morgen';
}
elseif ($hours < 18) {
    $period = 'middag';
}
else {
    $period = 'navond';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programmeren 2 - Week 1 - Opdracht 1.2</title>
</head>
<body>
    <h1>Opdracht 1.2</h1>
    <hr/>

    <h2>Begroeting op basis van het moment van de dag</h2>
    <p>
        Goede<?= $period ?>
    </p>
</body>
</html>