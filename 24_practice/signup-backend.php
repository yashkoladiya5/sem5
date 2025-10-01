<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$db = 'sem5_97';

$conn = mysqli_connect($host, $username, $password, $db);
ini_set("display_errors", 1);
error_reporting(E_ALL);
if (isset($_FILES['fileToUpload'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['fileToUpload']['name'];
    $tmp_path = $_FILES['fileToUpload']['tmp_name'];
    $folder = './uploads/';

    $upload_path = $folder . $image;
    if (move_uploaded_file($tmp_path, $upload_path)) {

        $query = "insert into ajaxpractice (name,email,password,image) values ('$name' , '$email' , '$password' , '$image')";
        $result = mysqli_query($conn, $query);
        echo "Data inserted";
    } else {
        exit();
    }

}

?>