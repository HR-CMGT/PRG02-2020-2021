<?php

    // controleer of er op de link geklikt is. Dit doe je door te controleren of de $_GET de juist info bevat.

        // Als dat waar is, stel je de variabele $code gelijkt aan de meegestuurde info


?>
<!doctype html>
<html lang="en">
	<head>
		<title>Oefening 2 - GET - Postback</title>
		<meta name="description" content="width=device-width, user-scalable=no" />
		<meta charset="utf-8" />
	</head>
	<body >
        <h1>Oefening 2 - GET - Postback</h1>

        <p>
            In deze opdracht is het de bedoeling dat informatie uit een link
            verstuurd wordt naar DEZELFDE pagina. Dit noemen we een postback.
            PHP moet echter controleren of deze postback heeft plaatsgevonden.
            <br>
            Vul de PHP code hierboven aan, zodat de postback goed afgehandeld wordt
            en er geen foutmeldingen meer optreden.
        </p>

    <?php if (isset($code)) { ?>
        <p>
            De code is: <?= $code ?>
        </p>
    <?php } else { ?>

        <a href="?info=42">Deze link stuurt je naar dezelfde pagina</a>

    <?php } ?>

	</body>
</html>