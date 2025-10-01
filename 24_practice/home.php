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

        <h2 class="text-primary text-center">HOME PAGE</h2>
        <br><br><br><br>
        <div class="text-center">

            <button class="btn btn-primary" id="btn">Display Data</button>
            <button class="btn btn-primary" id="btn">Insert Data</button>
        </div>
        <br><br><br>
        <p id="displayData"></p>

    </div>

    <script>
        $("#btn").click(function () {
            var display = 'display';
            $.ajax({
                url: 'display-backend.php',
                type: 'POST',
                data: { display: display },
                success: function (response) {
                    $("#displayData").html(response);
                }

            })
        })
    </script>
</body>

</html>