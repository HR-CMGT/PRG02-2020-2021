<?php
$code = '';
if (isset($_GET['code'])) {
    $code = $_GET['code'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Pagina 2</title>
    <meta charset="utf-8"/>
</head>
<body>
<section>
    <h1>Dit is pagina 2</h1>
    <p>
        Ik weet het, je komt waarschijnlijk van pagina 1. Die pagina vindt zichzelf echt heel cool, maar eigenlijk
        gaat het allemaal om mij. Op deze pagina gebeurt het pas echt!
    </p>
    <p>
        Ik zal je uitleggen waarom. Ik weet iets over pagina 1, maar andersom weet die pagina niks van mij.
    </p>
    <p>
        Zo weet ik namelijk de geheime code van pagina 1.
        <br/>
        <b>Code: <?= $code ?></b>
    </p>
    <p>
        <br/>
    </p>
    <p>
        Je mag altijd terug naar
        <a href="GET1.php">pagina 1</a>
        als je dat zou willen.
    </p>
</section>
</body>
</html>
