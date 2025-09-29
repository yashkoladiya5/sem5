<?php
include 'connection.php';

// Get ID from POST (after form submission) or GET (first load)
$ids = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : 0);

// Stop if ID is invalid
if($ids == 0){
    die("Invalid ID");
}

// Fetch record data
$query = "SELECT * FROM register_table WHERE id = $ids";
$res = mysqli_query($conn, $query);
if(!$res){
    die("Query Failed: ".mysqli_error($conn));
}

$arrdata = mysqli_fetch_assoc($res);

// Handle form submission
if(isset($_POST['submit'])) {

    // Get data from form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $reference = mysqli_real_escape_string($conn, $_POST['reference']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Update record
    $updateQuery = "UPDATE register_table 
                    SET name='$name', degree='$qualification', mobile='$mobile', email='$email', refer='$reference', jobpost='$role' 
                    WHERE id=$ids";

    $updateRes = mysqli_query($conn, $updateQuery);

    if($updateRes){
        // Redirect to same page with success message
        header("Location: ".$_SERVER['PHP_SELF']."?id=$ids&success=1");
        exit;
    } else {
        echo "<script>alert('Data Not Updated');</script>";
    }
}

// Show success message if redirected
if(isset($_GET['success'])){
    echo "<script>alert('Data Updated Successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <h1>Update Details</h1>
    <br>
    <form method="post">
        <!-- Pass ID in hidden input -->
        <input type="hidden" name="id" value="<?php echo $ids; ?>">

        Enter Name : <input type="text" name="name" id="name" value="<?php echo $arrdata['name']; ?>"><br><br>
        Enter Qualification : <input type="text" name="qualification" id="qualification" value="<?php echo $arrdata['degree']; ?>"><br><br>
        Enter Mobile No. : <input type="text" name="mobile" id="mobile" value="<?php echo $arrdata['mobile']; ?>"><br><br>
        Enter Email : <input type="text" name="email" id="email" value="<?php echo $arrdata['email']; ?>"><br><br>
        Enter Reference : <input type="text" name="reference" id="reference" value="<?php echo $arrdata['refer']; ?>"><br><br>
        Enter Role : <input type="text" name="role" id="role" value="<?php echo $arrdata['jobpost']; ?>"><br><br>

        <input type="submit" name="submit" id="submit" value="Update">
    </form>

    <br>
    <a href="display.php">Back to Display</a>
</body>
</html>
