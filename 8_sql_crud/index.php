<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Enter your details</h1>
    <br>
    <form method="post">
    Enter Name : <input type="text" name = "name" id="name"><br><br>
    Enter qualification : <input type="text" name = "qualification" id="qualification"><br><br>
    Enter Mobile No. : <input type="text" name = "mobile" id="mobile"><br><br>
    Enter Email : <input type="text" name = "email" id="email"><br><br>
    Enter reference : <input type="text" name = "reference" id="reference"><br><br>
    Enter Role : <input type="text" name = "role" id="role"><br><br>
    <input type="submit" name="submit" id="submit" value = "Register">
    </form>

    <a href="display.php">Display</a>
</body>

</html>

<?php
include 'connection.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $reference = $_POST['reference'];
    $role = $_POST['role'];

    $insertQuery = "INSERT INTO register_table(name, degree, mobile, email, refer, jobpost) 
                    VALUES('$name', '$qualification', '$mobile', '$email', '$reference', '$role')";

    $res = mysqli_query($conn, $insertQuery);

    if($res) {
        // Redirect to same page to prevent resubmission
        header("Location: ".$_SERVER['PHP_SELF']."?success=1");
        exit;
    } else {
        echo "<script>alert('Data Not Inserted');</script>";
    }
}

// Show success message if redirected
if(isset($_GET['success'])) {
    echo "<script>alert('Data Inserted Successfully');</script>";
}
?>
