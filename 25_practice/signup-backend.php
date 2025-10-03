<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

include("connection.php");


if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $image_name = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $folder = "./uploads/";

    $upload_path = $folder . $image_name;
    if (move_uploaded_file($tmp_name, $upload_path)) {
        $query = "insert into users (username,password,email,image) values('$username' , '$password' , '$email' , '$image_name')";
        $result = mysqli_query($conn, $query);
        echo "Record Inserted Sucess";

    }
}


?>