<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include("connection.php");

if (isset($_POST['insertName'])) {
    $name = $_POST['insertName'];
    $age = $_POST['insertAge'];
    $state = $_POST['insertState'];
    $city = $_POST['insertCity'];

    $query = "insert into user_info (name,age,state,city) values('$name', '$age' , $state, $city)";
    $result = mysqli_query($conn, $query);

    echo "Data inserted Success";
}


if (isset($_POST['display'])) {
    $query = "select * from user_info";
    $result = mysqli_query($conn, $query);
    $data = "<table class='table table-bordered table-striped'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>State</th>
        <th>City</th>
        <th>Action</th>
        <th>Action</th>

    </tr>

    ";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $q1 = 'select * from state where id = ' . $row['state'] . '';
            $result1 = mysqli_query($conn, $q1);
            $row1 = mysqli_fetch_assoc($result1);

            $q2 = 'select * from city where id = ' . $row['city'] . '';
            $result2 = mysqli_query($conn, $q2);
            $row2 = mysqli_fetch_assoc($result2);
            $data .= '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['age'] . '</td>
                            <td>' . $row1['state'] . '</td>
                            <td>' . $row2['city'] . '</td>
                             <td><button class="btn btn-primary" onclick="EditDetails(' . $row['id'] . ')">Edit</button></td>
                             <td><button class="btn btn-danger" onclick="DeleteDetails(' . $row['id'] . ')">Delete</button></td>
                    </tr>
            ';

        }

        $data .= "</table>";

        echo $data;
    }
}

if (isset($_POST['editId'])) {
    $id = $_POST['editId'];

    $query = "select * from user_info where id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $response = $row;

    echo json_encode($response);

}


if (isset($_POST['updateName'])) {

    $id = $_POST['upId'];
    $name = $_POST['updateName'];
    $age = $_POST['updateAge'];
    $state = $_POST['updateState'];
    $city = $_POST['updateCity'];

    $query = "update user_info set name = '$name' , age = '$age' , state = '$state' , city = '$city' where id = '$id'";
    $result = mysqli_query($conn, $query);

}

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $query = "delete from user_info where id = $id";
    $result = mysqli_query($conn, $query);

}


?>