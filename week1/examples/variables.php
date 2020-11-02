<?php
// In PHP variables begin with a $ sign.
$number;        // declaration
$number = 10;   // initialization

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variables</title>
</head>
<body>
<section>
    <!-- echo single variable within HTML with '=' instead of 'php echo'  -->
    <p><?= $number ?></p>
    <p>
        <?php
        // in a code block it is not allowed to use <?=
        $number++;
        if ($number == 11) {
            echo 'The number is now 11.';
        }
        ?>
    </p>
</section>
</body>
</html>
