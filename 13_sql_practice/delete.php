<?php

$id = $_GET['id'];

echo "ID : $id";

if($id == 0)
{
    echo "<script>alert('Something Went Wrong..Try Again');window.location.href='display.php';</script>";
}else
{
    include("./connection.php");
    $deleteQuery = "delete from user_table where id = $id";
    $res = mysqli_query($conn,$deleteQuery);
    if($res)
    {
        echo "<script>alert('User Deleted Successfully');window.location.href='display.php';</script>";
    }
}

?>