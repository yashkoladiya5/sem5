<?php

include 'connection.php';

$id = $_GET['id'];


$deleteQuery = "delete from register_table where id = $id";

$res = mysqli_query($conn,$deleteQuery);

if($res)
{
    echo "<script>alert('Delete Success');</script>";
}

header('location: display.php');

?>