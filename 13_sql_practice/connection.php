<?php

$host_name = "127.0.0.1";
$username = "root";
$password = "";
$db = "sem5_97";

$conn = mysqli_connect($host_name,$username,$password,$db);

if($conn)
{
    // echo "Connection Successful";
}else
{
    echo "Connection Unsuccessful";
}

?>