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



$query = "select * from ajaxinsert";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
    ?>

    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['password']?></td>
    </tr>
    <?php

    }
}
    ?>


