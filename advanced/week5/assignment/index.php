<?php require_once "includes/initialize.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection | <?= ($data['pageTitle'] ?? ''); ?></title>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?= ($data['content'] ?? ''); ?>
</body>
</html>
