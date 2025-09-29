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
    <div>

        <h1 id="loaddate">This is going to be changed</h1>
        <button id="click" class="btn btn-success">Submit</button>
    </div>

    <script>
        $(document).ready(function(){
            $('#click').click(function(){
                $('#loaddate').load('load.html');
                alert('the text is gonna be changed');
            })
        })
    </script>
</body>
</html>