<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

$host ='127.0.0.1';
$username = 'root';
$password = '';
$db = 'sem5_97';

$conn = mysqli_connect($host,$username,$password,$db);

if($conn)
{
    echo "Connection Success";

}else
{
    echo "Connection Failed";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">

        <h2 class="text-center text-success">INSERT USING AJAX JQUERY</h2>
        <form>
            <label>Username : </label>
            <input type="text" name="username" class="form-control"><br>
            <label>Password : </label>
            <input type="text" name="password" class="form-control">
            <label>State : </label>
            <select class="form-control" onchange="myFunc(this.value)">
                <option value="0">Select State</option>
                <?php
                $query = "select * from state";
                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result))
                {

                    ?>
                    <option value="<?php echo $row['sid']?>"><?php echo $row['state']?></option>
                    <?php
                }
                    ?>
            
            </select>
            <br>
            <label>City :</label>
            <select id="city" class="form-control">
                
            </select>
        </form>
    </div>

    <script>

           

                function myFunc(data)
                {
                    $.ajax({
                        url : 'city.php',
                        type : 'POST',
                        data : {data : data},
                        success : function(result)
                        {
                            $('#city').html(result);
                        }
                    });
                }

           

    </script>
</body>
</html>