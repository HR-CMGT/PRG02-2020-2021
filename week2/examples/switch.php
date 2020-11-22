<?php
//Switch example based on 'Opdracht 1-2'
$hours = date('G');

switch ($hours) {
    case $hours < 6:
        $period = 'nacht';
        break;
    case $hours < 12:
        $period = 'morgen';
        break;
    case $hours < 18:
        $period = 'middag';
        break;
    default:
        $period = 'navond';
        break;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Switch</title>
</head>
<body>
<h2>Begroeting op basis van het moment van de dag</h2>
<p>
    <?= 'Goede' . $period; ?>
</p>
</body>
</html>
