<?php
$id = $_GET['id'];
include("./connection.php");

$query = "SELECT * FROM user_table WHERE id = $id";
$output = mysqli_query($conn, $query);
$rows = mysqli_num_rows($output);

if($rows > 0)
{
    $res = mysqli_fetch_assoc($output);
    $name = $res['name'];
    $email = $res['email'];
    $qualification = $res['qualification'];
    $selectedYears = explode(",", $res['year']);
    $image = $res['image'];
}

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];
    $year = implode(",", $_POST['year']);
    
    $updateQuery = "UPDATE user_table SET name='$name', email='$email', qualification='$qualification', year='$year' WHERE id=$id";
    $res = mysqli_query($conn, $updateQuery);

    if($res) {
        echo "<script>alert('Data Updated Successfully');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data Not Updated');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f8;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        width: 400px;
    }
    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }
    input[type="text"], select {
        width: 100%;
        padding: 10px 12px;
        margin: 6px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
    }
    input[type="checkbox"] {
        margin-right: 8px;
        transform: scale(1.2);
    }
    label {
        margin-right: 12px;
        font-size: 14px;
        color: #555;
    }
    .checkbox-group {
        margin-bottom: 15px;
    }
    input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .profile-img {
        display: block;
        margin: 15px auto;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #4CAF50;
    }
</style>
</head>
<body>
<div class="form-container">
    <h1>Edit User Details</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label for="qualification">Qualification:</label>
        <select name="qualification" id="qualification">
            <option value="BSC(IT)" <?php if($qualification == "BSC(IT)") echo "selected"; ?>>B.SC(IT)</option>
            <option value="MSC(IT)" <?php if($qualification == "MSC(IT)") echo "selected"; ?>>M.SC(IT)</option>
        </select>

        <div class="checkbox-group">
            <label>Year:</label><br>
            <label><input type="checkbox" name="year[]" value="1" <?php if(in_array("1", $selectedYears)) echo "checked"; ?>>1</label>
            <label><input type="checkbox" name="year[]" value="2" <?php if(in_array("2", $selectedYears)) echo "checked"; ?>>2</label>
            <label><input type="checkbox" name="year[]" value="3" <?php if(in_array("3", $selectedYears)) echo "checked"; ?>>3</label>
            <label><input type="checkbox" name="year[]" value="4" <?php if(in_array("4", $selectedYears)) echo "checked"; ?>>4</label>
            <label><input type="checkbox" name="year[]" value="5" <?php if(in_array("5", $selectedYears)) echo "checked"; ?>>5</label>
        </div>

        <?php if(!empty($image)): ?>
            <img src="<?php echo $image; ?>" alt="Profile Image" class="profile-img">
        <?php endif; ?>

        <input type="submit" name="submit" value="Update">
    </form>
</div>
</body>
</html>
