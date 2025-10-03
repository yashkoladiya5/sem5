<?php session_start(); ?>

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
        <h2 class="text-center text-primary">LOGIN FORM</h2>
        <form id="myForm">
            <label>User name : </label>
            <input type="text" id="name" name="name" class="form-control">
            <span id="nameError" class="text-danger"></span><br>

            <label>User Password : </label>
            <input type="password" id="password" name="password" class="form-control">
            <span id="passwordError" class="text-danger"></span><br>

            <label>Captcha : </label>
            <img id="captchaImage" src="captcha.php" alt="No image found">
            <br><br>

            <label>Enter Text shown in image : </label>
            <input type="text" id="captcha" name="captcha" class="form-control">
            <span id="captchaError" class="text-danger"></span><br>

            <button class="btn btn-primary form-control" id="loginButton">LOGIN</button>
        </form>

        <br>
        <div class="text-center">

            <label>Don't Have account?</label>
            <a href="signup.php" class="text-primary">Sign up</a>
        </div>
    </div>

    <script>
        $("#loginButton").click(function (e) {
            e.preventDefault();

            var username = $("#name").val().trim();
            var password = $("#password").val().trim();
            var captcha = $("#captcha").val().trim();
            var isValid = true;

            // Clear old errors
            $(".text-danger").text("");

            // Field-level validation
            if (username === "") {
                $("#nameError").text("Username is required");
                isValid = false;
            }
            if (password === "") {
                $("#passwordError").text("Password is required");
                isValid = false;
            }
            if (captcha === "") {
                $("#captchaError").text("Captcha is required");
                isValid = false;
            }

            // Stop if validation fails
            if (!isValid) {
                return;
            }

            // ✅ If all fields filled → continue AJAX
            $.ajax({
                url: 'login-backend.php',
                type: 'POST',
                data: {
                    username: username,
                    password: password,
                    captcha: captcha
                },
                success: function (response) {
                    if (response.includes('Captcha Validation Failed')) {
                        alert("Enter Valid Captcha");
                        $("#myForm")[0].reset();
                        $("#captchaImage").attr("src", "captcha.php?" + new Date().getTime());

                    } else if (response.includes('No user found')) {
                        alert("We are not able to find any user with these credentials, try again");
                        $("#myForm")[0].reset();
                        $("#captchaImage").attr("src", "captcha.php?" + new Date().getTime());

                    } else {
                        alert("Login Success");
                        window.location.href = "home.php";
                    }
                }
            });
        });
    </script>
</body>

</html>