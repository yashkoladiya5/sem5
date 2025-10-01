<?php
session_start();
$host = '127.0.0.1';
$username = 'root';
$password = '';
$db = 'sem5_97';

$conn = mysqli_connect($host, $username, $password, $db);

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $captch = $_POST['captcha'];

    if ($captch !== $_SESSION['captcha']) {
        echo "Captcha Validation Failed";
        exit();
    }

    $query = "select * from ajaxpractice where name = '$username' and password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Login Success";
    } else {
        echo "No user found";
    }


}

?>