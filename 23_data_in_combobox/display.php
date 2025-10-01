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

        <h2 class="text-primary text-center">DISPLAY DATA</h2>

        <p id="tableData"></p>

        <br><br>
        <h2 class="text-center text-primary" style="display:none;" id="upHead">UPDATE FORM</h2>
        <form style="display:none;" id="upForm">
            <input type="hidden" id="upid" name="upid">
            <label>Name : </label>
            <input type="text" name="upname" id="upname" class="form-control"><br>
            <label>Email : </label>
            <input type="text" name="upemail" id="upemail" class="form-control"><br>
            <label>State : </label>
            <select name="upstate" id="upstate" class="form-control" onchange="changeCityUpdate(this.value)">
                <option value="0">Select State</option>
                <?php
                $host = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "sem5_97";

                $conn = mysqli_connect($host, $username, $password, $dbname);
                if ($conn) {
                    $query = "SELECT * FROM state";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['sid']}'>{$row['state']}</option>";
                    }
                }
                ?>
            </select>


            <br>
            <label>City : </label>
            <select name="upcity" id="upcity" class="form-control">



            </select> <br>
            <button id="submit" name="submit" class="btn btn-primary form-control"
                onclick="updateUser()">Submit</button><br><br><br>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'display-backend.php',
                type: 'POST',
                data: {},
                success: function (response) {
                    $("#tableData").html(response);
                }
            })
        })

        function GetUserDetails(updateId) {
            $("#upForm").slideToggle();
            $("#upHead").slideToggle();
            $.ajax({
                url: 'display-backend.php',
                type: 'POST',
                data: { updateId: updateId },
                success: function (response) {
                    var user = JSON.parse(response);
                    $("#upid").val(user.id);
                    $("#upname").val(user.name);
                    $("#upemail").val(user.email);

                    // Set state
                    $("#upstate").val(user.state);

                    // Load city dropdown for that state and pre-select the user's city
                    changeCityUpdate(user.state, user.city);
                }
            });
        }

        function changeCityUpdate(stateId, selectedCityId = null) {
            $.ajax({
                url: 'city.php',
                type: 'POST',
                data: { stateId: stateId },
                success: function (response) {
                    $("#upcity").html(response);

                    // If editing, set the user's current city
                    if (selectedCityId) {
                        $("#upcity").val(selectedCityId);
                    }
                }
            });
        }

        function updateUser() {
            var upId = $("#upid").val();
            var upName = $("#upname").val();
            var upEmail = $("#upemail").val();
            var upState = $("#upstate").val();
            var upCity = $("#upcity").val();

            $.ajax({
                url: 'display-backend.php',
                type: 'POST',
                data: {
                    upId: upId,
                    upName: upName,
                    upEmail: upEmail,
                    upState: upState,
                    upCity: upCity
                },
                success: function (response) {
                    print("Data updated Success");
                    $.ajax({
                        url: 'display-backend.php',
                        type: 'POST',
                        data: {},
                        success: function (response) {
                            $("#tableData").html(response);
                        }
                    })
                }
            })
        }

        function DeleteUser(deleteId) {
            $.ajax({
                url: 'display-backend.php',
                type: 'POST',
                data: { deleteId: deleteId },
                success: function (response) {
                    alert("Data Deleted Success");
                    $.ajax({
                        url: 'display-backend.php',
                        type: 'POST',
                        data: {},
                        success: function (response) {
                            $("#tableData").html(response);
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>