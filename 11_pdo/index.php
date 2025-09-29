<?php

include("pdo_connection.php");

$getStudents = $conn->prepare("SELECT * FROM register_table");
$getStudents->execute();
$students = $getStudents->fetchAll();

// print_r($students) ;

echo "<table border='1'>";
echo "<tr>
        <th>Name</th>
        <th>Degree</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Refer</th>
      </tr>";
foreach($students as $student)
{
    echo "<tr>
     <td>" .$student['name']. "</td>
     <td>" .$student['degree']. "</td>
     <td>" .$student['mobile']. "</td>
     <td>" .$student['email']. "</td>
     <td>" .$student['refer']. "</td>
    </tr>";
}

?>