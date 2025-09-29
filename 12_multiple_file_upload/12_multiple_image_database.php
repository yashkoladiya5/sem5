<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" multiple name="images[]"><br><br>
        <input type="submit" name="submit">

    </form>
</body>
</html>



<?php
if(isset($_POST['submit']))
{
    // echo "FILES DATA COUNT :::" .$_FILES['files'];
    for($i=0;$i<count($_FILES['images']['name']);$i++)
    {
        $file_name = $_FILES['images']['name'][$i];
        $tmp_name = $_FILES['images']['tmp_name'][$i];
        $file_type = $_FILES['images']['type'][$i];
        $file_size = $_FILES['images']['size'][$i];
        $folder = "uploads/";
        
        if(strtolower($file_type) == "image/jpeg" || strtolower($file_type) == "image/jpg" || strtolower($file_type) == "image/png")
        {
            if($file_size < 9000000)
            {
                    $folder = $folder .$file_name;
                    move_uploaded_file($tmp_name,$folder);

            }else
            {
                echo "<script>alert('File is bigger please pick image less than') </script>";
            }
        }else
        {
            echo "<script>alert('Only Image file is allowed')</script>";
            exit;
        }
       
    }
    echo "<script>alert('files uploaded successfully')</script>";
}else
{

}


?>

