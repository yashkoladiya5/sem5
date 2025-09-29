<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

for ($i = 0; $i <= 100; $i++) {
    if (($i % 3 == 0) && ($i % 5 == 0)) {
        echo "Fazz<br>";
    } elseif ($i % 3 == 0) {
        echo "Buzz<br>";
    } elseif ($i % 5 == 0) {
        echo "Fizz<br>";
    } else {
        echo $i . "<br>";
    }
}
?>
