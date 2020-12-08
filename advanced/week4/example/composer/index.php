<?php require_once "includes/initialize.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Students Advanced PHP Module</title>
    <meta name="description" content="Students Advanced PHP Module"/>
    <meta charset="utf-8"/>
</head>
<body>
<?php if (isset($error)) : ?>
    <span class="error"><?= $error; ?></span>
<?php endif; ?>
<h1>Students Advanced PHP Module</h1>

<div><?= $output ?? ''; ?></div>
</body>
</html>
