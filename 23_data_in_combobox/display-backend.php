<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$db = "sem5_97";
$conn = mysqli_connect($host, $username, $password, $db);

if ($conn) {

    // Display all records
    if (!isset($_POST['updateId'])) {
        $query = "SELECT * FROM state_city_crud";
        $result = mysqli_query($conn, $query);

        $data = "<table class='table table-bordered table-striped'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>State</th>
            <th>Action1</th>
            <th>Action2</th>
        </tr>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // Fetch city
                $q = "SELECT * FROM city WHERE id = " . $row['city'];
                $cityResult = mysqli_query($conn, $q);
                $cityRow = mysqli_fetch_assoc($cityResult);

                // Fetch state
                $q1 = "SELECT * FROM state WHERE sid = " . $row['state'];
                $stateResult = mysqli_query($conn, $q1);
                $stateRow = mysqli_fetch_assoc($stateResult);

                $data .= "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$cityRow['city']}</td>
                    <td>{$stateRow['state']}</td>
                    <td><button class='btn btn-primary' onclick='GetUserDetails({$row['id']})'>Edit</button></td>
                    <td><button class='btn btn-danger' onclick='DeleteUser({$row['id']})'>Delete</button></td>
                </tr>";
            }
        }

        $data .= "</table>";
        echo $data;
    }

    // Handle updateId request (AJAX for edit form)
    if (isset($_POST['updateId'])) {
        $id = intval($_POST['updateId']); // sanitize input
        $query = "SELECT * FROM state_city_crud WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        } else {
            echo json_encode(["error" => "Record not found"]);
        }
    }
}

if (isset($_POST['upId'])) {
    $id = $_POST['upId'];
    $name = $_POST['upName'];
    $email = $_POST['upEmail'];
    $city = $_POST['upCity'];
    $state = $_POST['upState'];

    $query = "UPDATE state_city_crud 
          SET name = '$name', 
              email = '$email', 
              city = '$city', 
              state = '$state' 
          WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Insert failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $query = "delete from state_city_crud where id = '$id'";
    $result = mysqli_query($conn, $query);
}
?>