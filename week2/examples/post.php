<?php
// Check if the post value is available
if (isset($_POST['submit'])) {
    // If so, check values from our form which where posted to validate
    // If there are no error, store the value in a variable
    if ($_POST['title'] == "") {
        $titleError = "Titel mag niet leeg zijn, probeer het opnieuw!";
    } else {
        $title = $_POST['title'];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oefening POST</title>
</head>
<body>
<h1>Oefening POST</h1>
<?php if (isset($title)) { ?>
    <p>De ingevoerde titel is: <?= $title; ?></p>
<?php } ?>

<?php if (isset($titleError)) { ?>
    <p><?= $titleError; ?></p>
<?php } ?>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <div>
        <label for="title">Titel</label>
        <input id="title" type="text" name="title"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Verzend!"/>
    </div>
</form>
</body>
</html>
