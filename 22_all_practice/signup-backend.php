<?php

include("connection.php");

if(isset($_FILES['fileToUpload']))
{
    // echo "File is there";
    $file_name = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $folder = "./uploads/";
    $upload_path = $folder .$file_name;


    // echo "UPLOAD PATH : " .$upload_path;

    if(move_uploaded_file($tmp_name,$upload_path))
    {
        // echo "File Uploaded Success";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "insert into signup (username,email,password,image) values ('$username','$email','$password','$file_name')";

        mysqli_query($conn,$query);

        echo "success";
    }else
    {
        echo "Something went wrong";
    }
}else
{
    echo "File is not there";
}


?>