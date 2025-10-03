<?php
session_start();
include("connection.php");

if (isset($_POST['username'], $_POST['password'], $_POST['captcha'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];

    // Debug (optional)
    // echo "User input captcha: $captcha, Session captcha: ".$_SESSION['captcha'];

    // Case-insensitive check
    if (!isset($_SESSION['captcha']) || strtolower($captcha) !== strtolower($_SESSION['captcha'])) {
        echo "Captcha invalid";
        exit;
    }

    // Verify user
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Record Found";
    } else {
        echo "Record Not Found";
    }
}
