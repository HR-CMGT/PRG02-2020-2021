<?php

    $result = $_GET['query'];

    if($result == 'techniek') {
        echo "Geweldig, het is gelukt om de tag 'techniek' door te sturen.";
    }
    else {
        echo 'Er gaat nog iets mis.';
    }
?>
