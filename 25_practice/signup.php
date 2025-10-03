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

        <h2 class="text-primary text-center">SIGN UP FORM</h2>

        <form id="signupForm">
            <label>Username : </label>
            <input type="text" id="username" name="username" class="form-control"><br>
            <label>Email : </label>
            <input type="text" id="email" name="email" class="form-control"><br>

            <label>Password : </label>
            <input type="text" id="password" name="password" class="form-control"><br>
            <label>Image : </label>
            <input type="file" id="fileToUpload" name="fileToUpload" class="form-control"><br>
            <button class="btn btn-primary">Submit</button>



        </form>

    </div>

    <script>
        $("#signupForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'signup-backend.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    alert("Sign up success");
                    window.location.href = "home.php";
                }
            })
        })
    </script>

</body>

</html>