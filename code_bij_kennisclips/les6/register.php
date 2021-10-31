<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname   = mysqli_escape_string($db, $_POST['lastname']);
    $username   = mysqli_escape_string($db, $_POST['username']);
    $password   = mysqli_escape_string($db, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO users
                  (first_name, last_name, email, password)
                  VALUES ('$firstname', '$lastname', '$username', '$password')";
        $result = mysqli_query($db, $query) or die ('Error: '.$query);

        if ($result) {
            $success = true;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection Create</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <h1>Maak een account aan</h1>
    
    <?php if (isset($success)) { ?>
        <p class="success">Het account is aangemaakt.</p>
    <?php } ?>
    
    <!-- enctype="multipart/form-data" no characters will be converted -->
    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
        <div class="data-field">
            <label for="firstname">Voornaam</label>
            <input id="firstname" type="text" name="firstname" value="<?= (isset($firstname) ? $firstname : ''); ?>"/>
            <span class="errors"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="lastname">Achternaam</label>
            <input id="lastname" type="text" name="lastname" value="<?= (isset($lastname) ? $lastname : ''); ?>"/>
            <span class="errors"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="username">Email</label>
            <input id="username" type="text" name="username" value="<?= (isset($username) ? $username : ''); ?>"/>
            <span class="errors"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="password">Wachtwoord</label>
            <input id="password" type="text" name="password" value="<?= (isset($password) ? $password : ''); ?>"/>
            <span class="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
        </div>
        <div class="data-submit">
            <input type="submit" name="submit" value="Registreer"/>
        </div>
    </form>
</body>
</html>
