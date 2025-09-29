<?php
// echo $_GET['id'];

$id = $_GET['id'];

include("pdo_connection.php");

$query = $conn->prepare("select * from register_table where id=$id");

$query->execute();

$student = $query->fetchAll();

$name = $student[0]['name'];
$degree = $student[0]['degree'];
$mobile =$student[0]['mobile'];
$email = $student[0]['email'];
$refer = $student[0]['refer'];
$jobpost = $student[0]['jobpost'];




?>
<h1>Edit Form</h1>
<form method="post">
    Edit Name : 
    <input type="text" name="name" value = "<?php echo $name?>"><br><br>
    
    Edit Degree : 
    <input type="text" name = "degree" value = "<?php echo $degree?>"><br><br>

    Edit Mobile : 
    <input type="text" name = "mobile" value = "<?php echo $mobile?>"><br><br>

    Edit Email : 
    <input type="text" name = "email" value = "<?php echo $email?>"><br><br>

    Edit Refer : 
    <input type="text" name = "refer" value = "<?php echo $refer?>"><br><br>

    Edit Job Post : 
    <input type="text" name = "jobpost" value = "<?php echo $jobpost?>"><br><br>

    <button name = "update" value="<?php echo $id?>">Edit</button>


</form>

<?php

if(isset($_POST['update']))
{
    $name = $_POST['name'];
$degree = $_POST['degree'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$refer = $_POST['refer'];
$jobpost = $_POST['jobpost'];

// include("pdo_connection.php");

$id = $_POST['update']; // get ID
$sql = "UPDATE register_table 
        SET name = :name, degree = :degree, mobile = :mobile, email = :email, refer = :refer, jobpost = :jobpost 
        WHERE id = :id";


$query = $conn->prepare($sql);
$result = $query->execute([
    ':name' => $name,
    ':degree' => $degree,
    ':mobile' => $mobile,
    ':email' => $email,
    ':refer' => $refer,
    ':jobpost' => $jobpost,
    ':id' => $id
]);

if($result) {
    echo "<script>alert('Record updated'); window.location.href='delete.php';</script>";
}


}else
{
    echo " Form not submitted";
}

?>