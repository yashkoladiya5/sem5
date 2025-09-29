<?php

$host = '127.0.0.1';
$dbname = 'sem5_97';
$username = 'root';
$password = '';


$conn = mysqli_connect($host,$username,$password,$dbname);


if($conn)
{
    // echo "Connection Success";
}else
{
    "Connection Failed";
}


extract($_POST);

if(isset($_POST['submit']))
{

        $query = "insert into ajaxinsert (username,password) values('$username','$password')";

        $result = mysqli_query($conn,$query);

        header("location:index.php");

}
?>