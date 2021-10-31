<?php
$random = 0;
$counter = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>While</title>
</head>
<body>
<p>
<?php
    while ($random < 90)
    {
        $counter++;
        echo $counter.'. ';

        $random = rand(0, 100);

        for ($i = 0 ; $i < 10 ; $i++)
        {
            echo '*';
        }
        echo '<br>';
    }
    ?>
</p>
</body>
</html>
