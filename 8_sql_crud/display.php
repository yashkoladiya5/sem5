<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connection.php';

// Delete record if delete id is passed
if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM register_table WHERE id=$id";
    mysqli_query($conn, $deleteQuery);
    header("Location: display.php");
    exit;
}

// Select all records from the table
$selectQuery = "SELECT * FROM register_table";
$query = mysqli_query($conn, $selectQuery);

// Check if query executed successfully
if(!$query){
    die("Query Failed: " . mysqli_error($conn));
}

// Check number of records
$num = mysqli_num_rows($query);
echo "<h2>Total Records: $num</h2>";

// Display in HTML table
if($num > 0){
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Degree</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Reference</th>
            <th>Job Post</th>
            <th>Actions</th>
          </tr>";

    while($res = mysqli_fetch_assoc($query)){
        echo "<tr>
                <td>{$res['id']}</td>
                <td>{$res['name']}</td>
                <td>{$res['degree']}</td>
                <td>{$res['mobile']}</td>
                <td>{$res['email']}</td>
                <td>{$res['refer']}</td>
                <td>{$res['jobpost']}</td>
                <td>
                    <a href='update.php?id={$res['id']}'>Update</a> |
                    <a href='delete.php?id={$res['id']}' >Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>
