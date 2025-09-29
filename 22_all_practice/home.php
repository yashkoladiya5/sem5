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

        <h2 class="text-center text-primary">AJAX CRUD EXAMPLE</h2>
        <br><br><br>
        <div class="text-center">

            <Button class=" btn btn-primary" id="insertButton">Insert Data</Button>
            <Button class=" btn btn-primary" id="displayButton">Display Data</Button>
        </div>

        <br><br><br><br>

        <div id="displayData"></div>


        <form id="updateForm" style="display:none;" method="post">
            <h2 class="text-primary text-center">UPDATE FORM</h2>
            <!-- <label>Enter Book ID : </label> -->
            <input type="hidden" class="form-control" id="upbookId" name="upbookId"><br>
            <label>Enter Book name : </label>
            <input type="text" class="form-control" id="upbookName" name="upbookName"><br>
            <label>Enter Book Price : </label>
            <input type="text" class="form-control" id="upbookPrice" name="upbookPrice"><br>
            <button id="upsubmit" name="upsubmit" class="btn btn-primary">Submit</button>
        </form>

        <form id="insertForm" style="display:none;" method="post">
            <h2 class="text-primary text-center">INSERT FORM</h2>
            <label>Enter Book ID : </label>
            <input type="text" class="form-control" id="bookId" name="bookId"><br>
            <label>Enter Book name : </label>
            <input type="text" class="form-control" id="bookName" name="bookName"><br>
            <label>Enter Book Price : </label>
            <input type="text" class="form-control" id="bookPrice" name="bookPrice"><br>
            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
        $(document).ready(function () {
            $("#insertButton").click(function (e) {
                $("#insertForm").slideToggle();
            });

            $("#insertForm").submit(function (e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: 'home-backend.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function (response) {
                        console.log(response);
                        if (response.includes("Success")) {
                            alert("Data inserted Success");
                            $("#insertForm").slideToggle();
                        }
                    }
                })
            });

            $("#displayButton").click(function (e) {
                $.ajax({
                    url: 'home-backend.php',
                    type: 'POST',
                    data: { data: "display" },
                    success: function (response) {
                        $("#displayData").html(response);
                    }
                })
            })
        })

        function GetUserDetails(bId) {
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: { bId: bId },
                success: function (response) {
                    var user = JSON.parse(response);

                    if (user.error) {
                        alert(user.error);
                        return;
                    }

                    $("#upbookId").val(user.bid);
                    $("#upbookName").val(user.bname);
                    $("#upbookPrice").val(user.bprice);
                    $("#updateForm").slideDown();
                }
            });

            $("#updateForm").submit(function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: 'home-backend.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert("data updated Success");
                        $("#updateForm").slideUp();

                        $.ajax({
                            url: 'home-backend.php',
                            type: 'POST',
                            data: { data: "display" },
                            success: function (response) {
                                $("#displayData").html(response);
                            }
                        });
                    }

                })
            })



        }

        function DeleteBook(deleteId) {
            $.ajax({
                url: 'home-backend.php',
                type: 'POST',
                data: { deleteId: deleteId },
                success: function (response) {
                    alert("Data deleted Success");
                    $.ajax({
                        url: 'home-backend.php',
                        type: 'POST',
                        data: { data: "display" },
                        success: function (response) {
                            $("#displayData").html(response);
                        }
                    });
                }
            })
        }

    </script>
</body>

</html>