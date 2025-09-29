<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "sem5_97";

try{
    $conn =new PDO("mysql:host=$host;dbname=$database",$username,$password);

 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//  echo " Connection Done";

}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>