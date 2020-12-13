<?php
/** @var $db */
require_once "includes/database.php";

if (isset($_POST['submit'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];

    $errors = [];
    if ($firstName == "") {
        $errors['first-name'] = "Vul aub uw voornaam in";
    }
    if ($lastName == "") {
        $errors['last-name'] = "Vul aub uw achternaam in";
    }

    if (empty($errors)) {
        //INSERT in DB
        $query = "INSERT INTO teachers (first_name, last_name)
                    VALUES('$firstName', '$lastName')";
        $result = mysqli_query($db, $query);

        if ($result) {
            $success = "Hij is toegevoegd aan de DB";
        } else {
            $errors['db'] = mysqli_error($db);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voeg docent toe</title>
</head>
<body>
<h1>Voeg docent toe</h1>
<?php
if (isset($errors['db'])) {
    echo $errors['db'];
} elseif (isset($success)) {
    echo $success;
}
?>
<form action="" method="post">
    <div>
        <label for="first-name">Voornaam</label>
        <input type="text" name="first-name" id="first-name"/>
        <?php
        if (isset($errors['first-name'])) {
            echo $errors['first-name'];
        }
        ?>
    </div>
    <div>
        <label for="last-name">Achternaam</label>
        <input type="text" name="last-name" id="last-name"/>
        <?php
        if (isset($errors['last-name'])) {
            echo $errors['last-name'];
        }
        ?>
    </div>
    <div>
        <input type="submit" name="submit" value="Verstuur"/>
    </div>
</form>
</body>
</html>
