<?php

$host = '127.0.0.1';
$dbname = 'sem5_97';
$username = 'root';
$password = '';


$conn = mysqli_connect($host,$username,$password,$dbname);


if($conn)
{
    echo "Connection Success";
}else
{
    "Connection Failed";
}

$mid = $_POST['datapost'];

echo "MID :: "  .$mid;

$query = "select * from classes where mid = '$mid'";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result))
{
    ?>
    <option><?php echo $row['class']?></option>
    <?php
    
}
    ?>    

