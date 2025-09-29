<?php

include ("connection.php");


$username = $_POST['username'];
$password = $_POST['password'];
$captcha = $_POST['captcha'];

$query = "select * from signup where username = '$username' and password = '$password'";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 0)
{
    echo "No record found";
}else
{
    echo "Record Found";
}

?>