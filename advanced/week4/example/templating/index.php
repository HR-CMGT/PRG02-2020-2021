<?php require_once "includes/initialize.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <title><?= $pageTitle ?? ''; ?></title>
    <meta name="description" content="<?= $metaDescription ?? ''; ?>"/>
    <meta charset="utf-8"/>
</head>
<body>
<?php if (isset($error)) : ?>
    <span class="error"><?= $error; ?></span>
<?php endif; ?>
<?= $content ?? ''; ?>
</body>
</html>
