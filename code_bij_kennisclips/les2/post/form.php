<?php
if(isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    echo $firstName;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Versturen van data met een form</title>
    <link rel="stylesheet" href="../main.css">
</head>
<body>
    <form action="" method="post">
        <label for="firstName">Voornaam</label>
        <input type="text" id="firstName" name="firstName"/>

        <input type="submit" name="submit" value="Opslaan"/>
    </form>
</body>
</html>