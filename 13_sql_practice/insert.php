<?php
include("./connection.php");

$name = $email = $qualification = "";
$year = [];
$nameError = $emailError = $qualificationError = $yearError = $imageError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $qualification = $_POST['qualification'] ?? '';
    $year = $_POST['year'] ?? [];

    $folder = "uploads/";

    if ($name === '') $nameError = " *Name Field is Required";
    if ($email === '') $emailError = " *Email Field is Required";
    if ($qualification == '0') $qualificationError = " *Please select any option";
    if (empty($year)) $yearError = " *Please select at least one year";
    if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) $imageError = " *Please select an image for profile";

    if (!$nameError && !$emailError && !$qualificationError && !$yearError && !$imageError) {
        $yearString = implode(",", $year);
        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder .= $file_name;

        $insertQuery = "INSERT INTO user_table (name,email,qualification,year,image) VALUES ('$name','$email','$qualification','$yearString','$folder')";
        $res = mysqli_query($conn, $insertQuery);

        if ($res) {
            move_uploaded_file($tmp_name, $folder);
            echo "<script>alert('Data inserted Successfully');window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data Not Inserted');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Registration</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4f7f8;
    display: flex;
    justify-content: center;
    padding: 30px;
}
form {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    width: 400px;
}
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}
input[type=text], select, input[type=file] {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
}
input[type=checkbox] {
    margin-right: 5px;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
}
input[type=submit]:hover {
    background-color: #45a049;
}
span.error {
    color: red;
    font-size: 14px;
}
.checkbox-group label {
    display: inline-block;
    margin-right: 10px;
    font-weight: normal;
}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <h1>Enter Your Details</h1>

    <label>Enter Name:</label>
    <input type="text" name="name" >
    <span class="error"><?php echo $nameError; ?></span>

    <label>Enter Email:</label>
    <input type="text" name="email" >
    <span class="error"><?php echo $emailError; ?></span>

    <label>Enter Qualification:</label>
    <select name="qualification">
        <option value="0">--Select Option--</option>
        <option value="BSC(IT)" >B.SC(IT)</option>
        <option value="MSC(IT)" >M.SC(IT)</option>
    </select>
    <span class="error"><?php echo $qualificationError; ?></span>

    <label>Select Year:</label>
    <div class="checkbox-group">
        <label><input type="checkbox" name="year[]" value="1" >1</label>
        <label><input type="checkbox" name="year[]" value="2" >2</label>
        <label><input type="checkbox" name="year[]" value="3" >3</label>
        <label><input type="checkbox" name="year[]" value="4" >4</label>
        <label><input type="checkbox" name="year[]" value="5" >5</label>
    </div>
    <span class="error"><?php echo $yearError; ?></span>

    <label>Select Profile Image:</label>
    <input type="file" name="image">
    <span class="error"><?php echo $imageError; ?></span>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
