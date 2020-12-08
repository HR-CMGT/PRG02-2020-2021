<?php
// Gegevens voor de connectie
$host       = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'music_collection';

// Stap 1: Verbinding leggen met de database
// Stap 2: Foutafhandeling. Als verbinding niet gelukt is, wordt
//         "or die" uitgevoerd. Deze stopt de code en toont de
//         foutmelding op het scherm
$db = mysqli_connect($host, $username, $password, $database)
    or die('Error: '.mysqli_connect_error());

// Stap 3: Query naar de database opbouwen. Het is belangrijk dat dit
//         apart gebeurt zodat je deze apart kunt tonen

$query = "SELECT * FROM albums";
// Stap 4: Query uitvoeren op de database. Als dit goed gaat, geeft
//         mysqli_query een mysqli_result terug. Let op, dit is een tabel.
// Stap 5: Foutafhandeling. Als de query niet uitgevoerd kan worden treedt
//         er een foutmelding op via "or die". Ook de query, met ingevulde
//         variabelen, wordt op het scherm getoond. Deze kan je kopieren
//         en plakken in PhpMyAdmin om te kijken waarom het fout gaat.
$result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

// Stap 6: Resultaat verwerken. Er wordt een nieuwe array gemaakt waarin alle
//         rijen uit de db komen. In dit geval is een rij een album.
$albums = [];
//         mysqli_fetch_assoc haalt een rij uit de db en zet deze om naar
//         een associatieve array. De namen van de index corresponderen met de
//         kolomnamen (velden) van de tabel
//         Als er geen rijen meer zijn in het resultaat geeft mysqli_fetch_assoc
//         'false' terug en stopt de while loop.
while($row = mysqli_fetch_assoc($result))
{
    // elke rij (dit is een album) wordt aan de array 'albums' toegevoegd.
    $albums[] = $row;
}

// Stap 7: Sluit de verbinding met de db. Deze is niet meer nodig. Al het
//         resultaat zit in de variabele $albums
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
        // $albums wordt doorlopen met een foreach loop en zo kunnen de onderdelen
        // van een album getoond worden.
        foreach ($albums as $album) { ?>

            <li><?= $album['name'] ?> <?= $album['artist']?></li>

        <?php } ?>
    </ul>
</body>
</html>