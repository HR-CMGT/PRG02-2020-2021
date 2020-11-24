<?php
$name = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
} else {
    header('Location: POST1.html');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>POST - pagina 2</title>
    <meta name="description" content="width=device-width, user-scalable=no"/>
    <meta charset="utf-8"/>
</head>
<body>
<section>
    <h1>POST - pagina 2</h1>
    <p>
        De ingevoerd naam is: <b><?= $name ?></b>
    </p>
</section>
<div>
    <a href="POST1.html">Ga terug naar pagina 1</a>
</div>
</body>
</html>
