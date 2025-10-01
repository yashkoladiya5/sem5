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
        <form id="myForm">

            <label>Enter name : </label>
            <input type="text" id="name" name="name" class="form-control"><br>
            <label>Enter Email : </label>
            <input type="text" id="email" name="email" class="form-control"><br>
            <label>Upload Profile Image : </label>
            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload"><br>
            <label>Enter Password : </label>
            <input type="text" id="password" name="password" class="form-control"><br>
            <button class="btn btn-primary" id="signUpButton">Sign Up</button>
        </form>
    </div>

    <script>
        $("#myForm").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'signup-backend.php',
                type: 'POST',
                contentType: false,
                processData: false,  // important for file upload
                data: formData,

                success: function (response) {
                    if (response.includes("Data inserted")) {
                        alert("Data inserted Success");
                        $("#myForm")[0].reset();
                        window.location.href = 'home.php';
                    }
                }
            })
        })
    </script>
</body>

</html>