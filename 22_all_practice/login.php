<?php session_start();?>
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

        <h1 class="text-center text-primary">Login Form</h1>
        
        <form method="post" id="loginForm">
            <label>Username : </label>
            <input type="text" class="form-control" id="loginUsername" name="username"> <br>
            
            <label>Password : </label>
            <input type="password" class="form-control" id="loginPassword" name="password"><br>
            
            <label>Captcha : </label> 
            <img src="captcha.php" alt=""><br><br>
            
            <label>Enter Code : </label>
            <input type="text" class="form-control" id="loginCaptcha" name="captcha"><br>
            
            <button type="submit" name="submit" class="btn btn-primary form-control">LOGIN</button>
        </form>
        
        <br>
        <div class="text-center">
            <label>Don't have account?</label>
            <a href="signup.php">Sign Up</a>
        </div>
        
        <!-- Show captcha result -->
        <p id="captchaOutput" class="text-danger">
            <?php echo $message; ?>
        </p>
    </div>

    <script>
        $(document).ready(function(){
            $("#loginForm").submit(function(e){
                e.preventDefault(); // stop page reload
                var username = $("#loginUsername").val();
                var password = $("#loginPassword").val();
                var captcha = $("#loginCaptcha").val();
               
                console.log("Form submitted");

                $.post('login-backend.php',{username,password,captcha},function(response)
            {
                console.log(response);

                if(response.includes("Record Found"))
            {
                window.location.href = "home.php";
            }else
            {
                alert("Username or password is wrong");
                location.reload();
            }
                
            })
                
            })
        })
    </script>
</body>
</html>


    

