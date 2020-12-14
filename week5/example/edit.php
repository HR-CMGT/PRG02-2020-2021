<?php
/** @var $db */
require_once "includes/database.php";

if (isset($_POST['submit'])) {
    $firstName = mysqli_escape_string($db, $_POST['first-name']);
    $lastName = mysqli_escape_string($db, $_POST['last-name']);
    $id = mysqli_escape_string($db, $_POST['id']);

    $errors = [];
    if ($firstName == "") {
        $errors['first-name'] = "Vul aub uw voornaam in";
    }
    if ($lastName == "") {
        $errors['last-name'] = "Vul aub uw achternaam in";
    }

    if (empty($errors)) {
        //UPDATE in DB
        $query = "UPDATE teachers
                    SET first_name = '$firstName', last_name = '$lastName'
                    WHERE id = $id";
        $result = mysqli_query($db, $query);

        if ($result) {
            $success = "Hij is geupdate in de DB";
        } else {
            $errors['db'] = mysqli_error($db);
        }
    }
} elseif (isset($_GET['id'])) {
    $id = mysqli_escape_string($db, $_GET['id']);
    $query = "SELECT * FROM teachers WHERE id = $id";
    $result = mysqli_query($db, $query);
    if ($result){
        $teacher = mysqli_fetch_assoc($result);
        $firstName = $teacher['first_name'];
        $lastName = $teacher['last_name'];
        $id = $teacher['id'];
    }else{
        //Create error
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
        <input type="text" name="first-name" id="first-name" value="<?= htmlentities($firstName); ?>"/>
        <?php
        if (isset($errors['first-name'])) {
            echo $errors['first-name'];
        }
        ?>
    </div>
    <div>
        <label for="last-name">Achternaam</label>
        <input type="text" name="last-name" id="last-name" value="<?= htmlentities($lastName); ?>"/>
        <?php
        if (isset($errors['last-name'])) {
            echo $errors['last-name'];
        }
        ?>
    </div>
    <div>
        <input type="hidden" name="id" value="<?= htmlentities($id); ?>"/>
        <input type="submit" name="submit" value="Verstuur"/>
    </div>
</form>
</body>
</html>
