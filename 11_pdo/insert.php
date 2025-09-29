<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("pdo_connection.php");

$query = $conn->prepare("INSERT INTO register_table (name,degree,mobile,email,refer,jobpost) VALUES ('yash','BSCIT','9632587410','yas@gmail.com','ABC','CEO')");

$result = $query->execute();

if($result)
{
    echo "<script>alert('Data inserted successfully')</script>";
}else
{
    echo "<script>alert('Data Not inserted')</script>";
}

?>