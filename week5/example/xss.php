<?php
$name = '';
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
}

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
    <h2>Welkom <?= $name?></h2>
<!--    ipv deze regel gebruiken we de functie htmlentities-->
    <h2>Welkom <?= htmlentities($name)?></h2>

    <form action="" method="post">
        <div class="data-field">
            <label for="name">Naam</label>
            <textarea name="name" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="data-field">
            <input id="" type="submit" name="submit" value="Verstuur"/>
        </div>
    </form>
</body>
</html>
