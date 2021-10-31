<?php

// controleer of het formulier verstuurd is. Dit doe je door te checken of de submit aanwezig is in de $_POST

    // Als dat waar is, stel je de variabele $name gelijkt aan de meegestuurde info

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oefening 4 - POST - Postback</title>
</head>
<body>

    <h1>Oefening 4 - POST - Postback</h1>

    <p>
        In deze opdracht wordt het fomulier door middel van een 'postback'
        teruggestuurd naar dezelfde pagina. Vang bovenaan de pagina de ingevoerde
        info op, maar alleen als het formulier verzonden is.
        <br>
        Maak het formulier verder kloppend en zorg dat er geen foutmeldingen meer zijn.
    </p>

    <?php if(!isset($name)) {  ?>

    <form action="" method="">

        <label for="firstname">Voornaam</label>

        <input type="text" id="firstname" name="" />


        <input type="submit" name="submit" value="Versturen"/>

    </form>

    <?php } else { ?>
    <p>
        Geweldig! Je hebt de naam <b><?= $name ?></b> doorgestuurd.
    </p>
    <?php } ?>
</body>
</html>