<?php
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
    <p><img src="captcha.php" alt="No Captcha found"></p><br>
    Enter Captcha Code : <input type="text" name="captcha"><br><br>
    <input type="submit" name="submit" >
    </form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    if($_SESSION['captcha'] == $_POST['captcha'])
    {
        echo "Captcha matched";
    }else
    {
        echo "Captcha invalid";
    }
}

?>