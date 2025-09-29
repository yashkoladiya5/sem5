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

        <h2 class="text-center text-primary">SIGN UP FORM</h2>
        <form id="myForm">
            <label>Username</label>
            <input type="text" class="form-control" id = "signupUsername" name="username"><br>
            <label>Email</label>
            <input type="text" class="form-control" id = "signupEmail" name = "email"><br>
            <label>Password</label>
            <input type="text" class="form-control" id="signupPassword" name="password"><br>
            <label>Profile Image : </label>
            <input type="file" class="form-control" id = "signupImage" name = "fileToUpload"><br>

            <button value="submit" id="submit" class="btn btn-primary">Submit </button>
        </form> 
    </div>

    <script>
        $(document).ready(function()
    {   
        $("#myForm").submit(function(e){
            let formData = new FormData(this);
            e.preventDefault();
           $.ajax({
            url: 'signup-backend.php',
            type: 'POST',
            data: formData,
            contentType: false,  // important for file upload
            processData: false,  // important for file upload
            success: function(response)
            {
                if(response.trim() == "success"){
                alert("User Sign Up Success");
                window.location.href = "home.php";  // redirect here
            } else {
                alert("Error: " + response);
            }
                
            }
           })
        }
    )
        
    })
    </script>
</body>
</html>