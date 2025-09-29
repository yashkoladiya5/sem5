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
        <h1 class="text-center">INSERT DATA USING AJAX</h1>

        <form id="myForm" action="insert.php" method="post">

        <label for="">Username</label>
        <input type="text" class="form-control" name="username"><br>

        <label for="">Password</label>
        <input type="text" class="form-control" name="password"><br>

        <input type="submit" value="submit" name="submit" class="btn btn-primary" id="submit">
        </form>

        <br><br>
        <div>
            <h2>Display Data using AJAX and MySQLI</h2>

            <button id="displayData" class="btn-danger">Display Data</button>
            <br><br>
            <table class="table table-striped table-bordered text-center">

            <thead>
                <th>ID</th>
                <th>name</th>
                <th>Password</th>
            </thead>

            <tbody id="response">
                
            </tbody>

            </table>
        </div>
    </div>


    <script>

        $(document).ready(function(){
            var form = $('myForm');
            
            $('#submit').click(function(){
                $.ajax({
                    url: 'insert.php',
                    type: 'POST',
                   data : ("#myForm input").serialize(),

                   success  : function(result)
                   {
                    console.log(result);
                    
                   }
                })
            });

            $("#displayData").click(function(){

                $.ajax({
                    url: 'display.php',
                    type: 'POST',
                    success: function(result)
                    {
                        $('#response').html(result);
                    }
                })
            })
        })
    </script>
</body>
</html>