<?php
// Create an array
$defaultArray = [1, 2, 3];

// To show one item of an array
echo $defaultArray[1]; //second item, array starts at index 0


// Loop through an array with a for loop
for ($i = 0; $i < count($defaultArray); $i++) {
    echo $defaultArray[$i];
}

$associativeArray = [
    'eerste' => 'Wijn',
    'tweede' => 'haven',
    ' ',
    99
];

foreach ($associativeArray as $item) {
    echo $item;
}

// To see the content of an array you can use var_dump() or print_r()
print_r($associativeArray);
