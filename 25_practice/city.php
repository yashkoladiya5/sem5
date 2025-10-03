<?php

include("connection.php");


if (isset($_POST['stateId']) && !isset($_POST['update'])) {
    $stateId = $_POST['stateId'];
    $query = "select * from city where sid = $stateId";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <option value="<?php echo $row['id'] ?>"> <?php echo $row['city'] ?></option>
            <?php
        }
    }
}
if (isset($_POST['cityId'], $_POST['stateId'], $_POST['update'])) {
    $cityId = $_POST['cityId'];
    $stateId = $_POST['stateId'];

    $query = "SELECT * FROM city WHERE sid = " . intval($stateId); // security: use intval
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $cityId) ? 'selected' : ''; ?>>
                <?php echo $row['city']; ?>
            </option>
            <?php
        }
    }
}

?>