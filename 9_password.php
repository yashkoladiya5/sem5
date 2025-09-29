<?php

$pass = "admin123";

$str_pass = password_hash($pass ,PASSWORD_BCRYPT);

echo $str_pass;

$verify = password_verify($pass,$str_pass);

echo "<br>" .$verify;

?>
