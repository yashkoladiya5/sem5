<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sem5_97";

$conn = mysqli_connect($host, $username, $password, $dbname);
ini_set("display_errors", 1);

if (isset($_POST['stateId'])) {
    $stateId = $_POST['stateId'];


    if ($conn) {
        $query = "select * from city where cid = $stateId";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['city'] ?></option>
                <?php
            }

        }

    }

}

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // echo "city " . $city . " State : " . $state . " ";
    $query = "INSERT INTO state_city_crud (name, email, city, state) VALUES ('$name', '$email', $city, $state)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Insert failed: " . mysqli_error($conn);
    }

}
?>