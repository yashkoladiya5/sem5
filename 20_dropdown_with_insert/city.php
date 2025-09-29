<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
$host = "127.0.0.1";
$username = "root";
$password = "";
$db = "sem5_97";

$conn = mysqli_connect($host,$username,$password,$db);

if($conn)
{
    // echo "Connection Success";
}else
{
    echo "Connection Failed";
}


$sid = $_POST['data'];

// echo "SID FROM PAGE :: " .$sid;

$query = "select * from city where cid = $sid";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result))
{
    ?>
    <option><?php echo $row['city']?></option>
    <?php
}



?>