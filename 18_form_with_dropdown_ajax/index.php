<?php

$host = '127.0.0.1';
$dbname = 'sem5_97';
$username = 'root';
$password = '';


$conn = mysqli_connect($host,$username,$password,$dbname);


if($conn)
{
    // echo "Connection Success";
}else
{
    "Connection Failed";
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
        <h2 class="text-center text-danger">Get data from Database</h2>

        <form>

        Username : <input type="text" name="" class="form-control"><br><br>
        Password : <input type="text" name="" class="form-control"><br><br>
        Degree : 
        <select name="" id="" class="form-control" onchange="myFunc(this.value)">
            <option value="0">Select Degree</option>

            <?php
            $query = "select * from degree";
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result))
            {
                ?>
                    <option value="<?php echo $row['mid']?>"> <?php echo $row['degree']?></option>
                <?php
            }
                ?>
            
            


        </select>
        <br><br>


        Year : <select class="form-control" id="getYear">
            <option value="0">Select Year</option>

            
        </select>

        <br><br>
        <button class="btn btn-primary form-control">Submit</button>
        </form>
    </div>


    <script>

        function  myFunc(data)
        {

            $.ajax({

                url: 'class.php',
                type: 'POST',
                data: {datapost : data},
                success : function(result){

                    $('#getYear').html(result);

                }


            });
        }
    </script>
</body>
</html>