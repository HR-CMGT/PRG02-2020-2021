<?php
if (date('i') === '01') {
    $minutesString = ' minuut.';
} else {
    $minutesString = ' minuten.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programmeren 2 - Week 1 - Opdracht 1.1</title>
</head>
<body>
<h1>Opdracht 1.1 - Datum en tijd</h1>
<hr/>

<h2>"het is vandaag 1 november 2019"</h2>
<p>
    Het is vandaag <?= date('d F Y'); ?>
</p>

<h2>"het is vandaag 1/11/2019"</h2>
<p>
    Het is vandaag <?= date('j/n/Y'); ?>
</p>

<h2>"het is nu 2 uur en 30 minuten" (of: "het is nu 6 uur en 1 minuut")</h2>
<p>
    Het is nu <?= date('G'); ?> uur en <?= date('i') . $minutesString; ?>
</p>
</body>
</html>








