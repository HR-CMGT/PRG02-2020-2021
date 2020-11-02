<?php
/*
 * a function must be declared with the word 'function'
 * a function can be declared anywhere you like
 * $characters is the parameter of this function.
 * In this case, when called, the function is given am array of characters
 */

/**
 * This method makes half a Christmas tree (upside down) with the provided characters
 * @param $characters array of random characters
 */
function makeHalfATree($characters)
{

    foreach ($characters as $char) {
        echo $char;
    }
    echo '<br>';

    if (count($characters) == 0) {
        return;
    }

    array_pop($characters);
    makeHalfATree($characters);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Functions</title>
</head>
<body>
<section>
    <p>
        <?php makeHalfATree(['$', '%', '^', 'O', '&', 'o', '*', '±']) ?>
    </p>
</section>
</body>
</html>
