<?php

$product = 'Laptop';

//setcookie('shoppingCart', $product, time() + 3600); // verloop na 1 uur

setcookie('shoppingCart', $product, strtotime('+30 days'));

// ophalen
$shoppingCartItem = $_COOKIE['shoppingCart'];

