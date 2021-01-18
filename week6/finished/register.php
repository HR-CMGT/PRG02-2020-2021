<?php
session_start();

$email = '';
$password = '';

//If our session doesn't exist, redirect & exit script
if (isset($_SESSION['loggedInUser'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    /** @var mysqli $db */
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if ($email == '') {
        $errors['email'] = 'The email cannot be empty';
    }
    if ($password == '') {
        $errors['password'] = 'The password cannot be empty';
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password) VALUES('$email', '$password')";
        $result = mysqli_query($db, $query) or die('Error: ' . $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registratie</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h2>Nieuwe gebruiker registeren</h2>
<span class="errors"><?= isset($errors['db']) ? $errors['db'] : ''; ?></span>
<form action="" method="post">
    <div class="data-field">
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" value="<?= htmlentities($email); ?>"/>
        <span class="errors"><?= isset($errors['email']) ? $errors['email'] : ''; ?></span>
    </div>
    <div class="data-field">
        <label for="password">Wachtwoord</label>
        <input id="password" type="password" name="password"/>
        <span class="errors"><?= isset($errors['password']) ? $errors['password'] : ''; ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Registeer"/>
    </div>
</form>
</body>
</html>
