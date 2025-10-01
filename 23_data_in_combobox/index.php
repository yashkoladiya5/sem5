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
        <h2 class="text-primary text-center">Data inside ComboBox</h2>

        <form>
            <label>Name : </label>
            <input type="text" class="form-control" id="name" name="name"><br>

            <label>Email : </label>
            <input type="text" class="form-control" id="email" name="email"><br>


            <label>State : </label>
            <select class="form-control" onchange="changeCity(this.value)" id="state" name="state">
                <option value="0">--select state</option>
                <?php

                $host = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "sem5_97";

                $conn = mysqli_connect($host, $username, $password, $dbname);
                if ($conn) {
                    $query = "select * from state";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['sid'] ?>"><?php echo $row['state'] ?></option>
                            <?php
                        }

                    }
                }

                ?>
            </select>
            <label>City : </label>
            <select class="form-control" id="city" name="city">
            </select><br>

            <button class="btn btn-primary" onclick="insertData(event)">Insert</button>

        </form>

    </div>

    <script>
        function changeCity(stateId) {
            $.ajax({
                url: 'city.php',
                type: 'POST',
                data: { stateId: stateId },
                success: function (response) {
                    $("#city").html(response);
                }
            });
        }

        function insertData(e) {
            var name = $("#name").val();
            var email = $("#email").val();
            var state = $("#state").val();
            var city = $("#city").val();
            e.preventDefault();

            $.ajax({
                url: 'city.php',
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    state: state,
                    city: city
                },
                success: function (response) {
                    alert("Data inserted Success");
                    window.location.href = "display.php";
                }
            })
        }
    </script>
</body>

</html>