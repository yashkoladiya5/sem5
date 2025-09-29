<?php

// print_r();

if($_FILES['fileToUpload'])
{
    $path = $_FILES['fileToUpload']['name'];
    // echo $path;



    $uploadPath = "./uploads/".$path;
    // echo $uploadPath;


    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadPath))
    {
        echo "<script>alert('File Uploaded successfully')</script>";
    }else
    {
        echo "<script>alert('File Not Uploaded)</script>";
    }

}else
{
    die("No File found");
}

?>