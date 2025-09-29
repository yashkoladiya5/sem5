


<?php

include("pdo_connection.php");
$query = $conn->prepare("select * from register_table");

$query->execute();

$data = $query->fetchAll();

// print_r($data);

echo "<table border='1'>";
echo "<tr>
        <th>Name</th>
        <th>Degree</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Refer</th>
        <th>JobPost</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>";
foreach($data as $student)
{
    echo "<tr>
     <td>" .$student['name']. "</td>
     <td>" .$student['degree']. "</td>
     <td>" .$student['mobile']. "</td>
     <td>" .$student['email']. "</td>
     <td>" .$student['refer']. "</td>
     <td>" .$student['jobpost']. "</td>
    <td>
<form method='post'>
    <button type='submit' name='delete' value='".$student['id']."'>Delete</button>
</form>
</td>
<td><a href='update.php?id=" . $student['id'] . "'>Edit</a></td>

     </tr>";
}
echo "</table>";


if(isset($_POST['delete']))
{
    $id = $_POST['delete'];

    $query = $conn->prepare("delete from register_table where id=$id");

    $result = $query->execute();

    if($result)
    {
        echo "<script>alert('Data deleted');window.location.href = window.location.href;</script>";
        
        

    }else
    {
        echo "<script>alert('Data Not deleted')</script>";
    }

$query->execute();

}


// $query = $conn->prepare("delete from reigster_table where id=''");

// $result = $query->execute();

// if($result)
// {
//     echo "<script>alert('Record Deleted')</script>";
// }else
// {
//     echo "<script>alert('Record Not Deleted')</script>";  
// }

?>