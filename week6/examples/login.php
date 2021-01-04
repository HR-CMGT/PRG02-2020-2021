<?php
/** @var mysqli $db */
require_once "includes/database.php";
$login = false;

if (isset($_POST['submit'])) {
    $firstName = mysqli_escape_string($db, $_POST['first-name']);
    $password = $_POST['password'];

    //Get record from DB based on first name
    $query = "SELECT * FROM teachers WHERE first_name='$firstName'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $login = true;
        } else {
            //error onjuiste inloggegevens
        }
    } else {
        //error onjuiste inloggegevens
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php if ($login) { ?>
    <p>Je bent ingelogd!</p>
<?php } else { ?>
    <form action="" method="post">
        <div>
            <label for="first-name">Voornaam</label>
            <input type="text" id="first-name" name="first-name"/>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password"/>
        </div>
        <div>
            <input type="submit" name="submit" value="Login"/>
        </div>
    </form>
<?php } ?>
</body>
</html>
