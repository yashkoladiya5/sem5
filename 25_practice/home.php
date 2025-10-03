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

        <h2 class="text-center text-primary">HOME PAGE</h2>
        <br><br><br>
        <div class="text-center">

            <button class="btn btn-primary" id="insertBtn">Insert Data</button>
            <button class="btn btn-primary" id="displayBtn">Display Data</button>
        </div>
        <br><br><br>

        <!-- INSERT FORM -->
        <div class="text-center">

            <form style="display:none;" id="insertForm">
                <h2 class=" text-primary text-center">INSERT FORM</h2><br>
                <label>Enter Name : </label>
                <input type="text" id="insertName" name="insertName" class="form-control"><br>
                <label>Enter Age : </label>
                <input type="text" id="insertAge" name="insertAge" class="form-control"><br>
                <label>Enter State : </label>
                <select name="insertState" id="insertState" class="form-control" onchange="changeState(this.value);">
                    <option value="0">Select State</option>
                    <?php

                    include("connection.php");

                    $query = "select * from state";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['state'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select><br>
                <label>Select City : </label>
                <select name="insertCity" id="insertCity" class="form-control">
                    <option value="0">Select City</option>
                </select>
                <br>
                <button class="btn btn-primary" id="submit" name="submit">Submit</button>
            </form>
        </div>


        <p id="displayData"></p>



        <div class="text-center">

            <form style="display:none;" id="editForm">
                <h2 class=" text-primary text-center">UPDATE FORM</h2><br>
                <input type="hidden" id="upId" name="upId">
                <label>Enter Name : </label>
                <input type="text" id="updateName" name="updateName" class="form-control"><br>
                <label>Enter Age : </label>
                <input type="text" id="updateAge" name="updateAge" class="form-control"><br>
                <label>Enter State : </label>
                <select name="updateState" id="updateState" class="form-control"
                    onchange="changeUpdateState(this.value);">
                    <option value="0">Select State</option>
                    <?php

                    include("connection.php");

                    $query = "select * from state";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['state'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select><br>
                <label>Select City : </label>
                <select name="updateCity" id="updateCity" class="form-control">
                    <option value="0">Select City</option>
                </select>
                <br>
                <button class="btn btn-primary" id="submit" name="submit">Submit</button>
            </form>
        </div>


    </div>

    <script>
        $("#insertBtn").click(function () {
            $("#insertForm").slideToggle();
        })

        $("#displayBtn").click(function () {
            var display = 'display';
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: { display: display },
                success: function (response) {
                    $("#displayData").html(response);
                }
            })
        })

        function changeState(stateId) {
            $.ajax({
                url: 'city.php',
                type: 'POST',
                data: { stateId: stateId },
                success: function (response) {
                    $("#insertCity").html(response);
                }
            })
        }

        function changeUpdateState(stateId) {
            $.ajax({
                url: 'city.php',
                type: 'POST',
                data: { stateId: stateId },
                success: function (response) {
                    $("#updateCity").html(response);
                }
            })
        }

        $("#insertForm").submit(function (e) {
            var formData = new FormData(this);
            e.preventDefault();
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    if (response.includes("Data inserted Success")) {
                        alert("Data inserted Success");
                        $("#insertForm").slideToggle();
                    }
                }
            })
        })

        function EditDetails(editId) {
            $("#editForm").slideToggle();
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: { editId: editId },
                success: function (response) {
                    var user = JSON.parse(response);
                    $("#upId").val(user.id);
                    $("#updateName").val(user.name);
                    $("#updateAge").val(user.age);
                    $("#updateState").val(user.state);

                    console.log("State id : " + user.state);


                    var cityId = user.city;
                    var stateId = user.state;
                    var update = 'update';
                    $.ajax({
                        url: 'city.php',
                        type: 'POST',
                        data: { cityId: cityId, stateId: stateId, update: update },
                        success: function (response) {
                            $("#updateCity").html(response);
                        }
                    })
                }
            })
        }

        $("#editForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $("#editForm").slideToggle();
                    var display = 'display';
                    $.ajax({
                        url: 'home-backend.php',
                        type: 'POST',
                        data: { display: display },
                        success: function (response) {
                            $("#displayData").html(response);
                        }
                    })
                }
            })
        })

        function DeleteDetails(deleteId) {
            var display = 'display';
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: { deleteId: deleteId },
                success: function (response) {
                    alert("Data Deleted Success");
                    $.ajax({
                        url: 'home-backend.php',
                        type: 'POST',
                        data: { display: display },
                        success: function (response) {
                            $("#displayData").html(response);
                        }
                    })
                }
            })
        }
    </script>

</body>

</html>