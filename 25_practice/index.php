<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-primary">LOGIN FORM</h2>
        <br><br><br>

        <form id="loginForm">
            <label>Username:</label>
            <input type="text" id="username" name="username" class="form-control"><br>

            <label>Password:</label>
            <input type="password" id="password" name="password" class="form-control"><br>

            <label>Captcha:</label><br>
            <img src="captcha.php" alt="captcha" height="50px" width="250px" id="captchaImage"><br><br>

            <label>Enter Captcha:</label>
            <input type="text" id="captcha" name="captcha" class="form-control"><br>

            <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">Login</button>
        </form>

        <br><br>
        <div class="text-center">
            <label>New User?</label>
            <a href="signup.php" class="text-primary">Sign Up</a>
        </div>
    </div>

    <script>
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'login-backend.php',
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,
                success: function (response) {
                    response = response.trim(); // clean spaces

                    if (response === "Captcha invalid") {
                        alert("Captcha invalid, try again");
                        $("#captchaImage").attr("src", "captcha.php?" + new Date().getTime()); // reload captcha
                    } else if (response === "Record Found") {
                        alert("Login success");
                        window.location.href = "home.php";
                    } else {
                        alert("No User Found");
                        $("#captchaImage").attr("src", "captcha.php?" + new Date().getTime());
                    }

                    $("#loginForm")[0].reset();
                }
            });
        });
    </script>
</body>

</html>