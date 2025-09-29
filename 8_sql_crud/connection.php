<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = '127.0.0.1';
$username = 'root';
$password = '';
$db = 'sem5_97';

$conn = mysqli_connect($server,$username,$password,$db);
if ($conn) {
    echo "<script>alert('Connect success');</script>";
} else {
    echo "<script>alert('Connect failed');</script>";
}


?>