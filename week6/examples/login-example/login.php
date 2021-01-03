<?php
session_start();

//Check if post isset
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Tip: make this way more secure!
    if ($email == "" || $password == "") {
        $error = "Vul beide gegevens in";
    } elseif ($email != "moora@hr.nl" || $password != "test") {
        $error = "Combinatie gebruikersnaam/wachtwoord onjuist";
    }

    if (!isset($error)) {
        $_SESSION['login'] = $email;
    }
}

//Am I logged in? Please go to secure page
if (isset($_SESSION['login'])) {
    header("Location: secure.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<?php if (isset($error)) { ?>
    <p><?= $error; ?></p>
<?php } ?>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
    <div>
        <label for="email">E-mail:</label>
        <input id="email" type="email" name="email"/>
    </div>
    <div>
        <label for="password">Wachtwoord:</label>
        <input id="password" type="password" name="password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login"/>
    </div>
</form>
</body>
</html>
