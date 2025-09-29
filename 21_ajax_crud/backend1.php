<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
$host = "127.0.0.1";
$username = "root";
$password = "";
$db = "sem5_97";

$conn = mysqli_connect($host,$username,$password,$db);

extract($_POST);


if(isset($_POST['readRecord']))
{
    $data = '
    <table class="table table-bordered table-striped">
    <tr>
        <th>No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
    ';
    
    $query = "select * from ajaxcrud";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_array($result))
        {
            $data .= '
            <tr>
                <td>'.$number.'</td>
                <td>'.$row['firstname'].'</td>
                <td>'.$row['lastname'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['mobile'].'</td>
                <td>
                <button class="btn btn-primary" onclick="GetUserDetails('.$row['id'].')">Edit
                </button>
                </td>
                <td>
                <button class="btn btn-danger" onclick="DeleteUser('.$row['id'].')">Delete
                </button>
                </td>
            </tr>
            
            ';
            $number++;
        }
    }

    $data .= '</table>';
    echo $data;

}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
{
    $query = "insert into ajaxcrud (firstname,lastname,email,mobile) values ('$firstname','$lastname','$email','$mobile')";

    $result = mysqli_query($conn,$query);

}


if(isset($_POST['deleteId']))
{
    $userId = $_POST['deleteId'];
    $query = "delete from ajaxcrud where id = $userId";
    $result = mysqli_query($conn,$query);

}


if(isset($_POST["id"]))
{
    $userId = $_POST['id'];
    $query = "select * from ajaxcrud where id = $userId";

    $result = mysqli_query($conn,$query);

    $response = array();

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $response = $row;
        }
    }else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found";
    }

    echo json_encode($response);
}

if(isset($_POST['hidden_idupd']))
{
    $hidden_id = $_POST['hidden_idupd'];
    $firstname = $_POST['firstnameupd'];
    $lastname = $_POST['lastnameupd'];
    $email = $_POST['emailupd'];
    $mobile = $_POST['mobileupd'];

    $query = "update ajaxcrud set firstname = '$firstname' , lastname = '$lastname' , email = '$email' , mobile = '$mobile' where id = $hidden_id";

    mysqli_query($conn,$query);
}

?>