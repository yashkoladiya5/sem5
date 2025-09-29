<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Bootstrap JS (needed for modal) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-primary text-center">AJAX CRUD OPERATION</h1>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
        <h2 class="text-danger">All Records</h2>
        <div id="records_content"></div>

   <!-- Update Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
      </div>
      <div class="modal-body">
        <form class="form-group">
          <label>Firstname : </label>
          <input type="text" class="form-control" id="update-firstname">
          <label>Lastname : </label>
          <input type="text" class="form-control" id="update-lastname">
          <label>Email ID : </label>
          <input type="text" class="form-control" id="update-email">
          <label>Mobile : </label>
          <input type="text" class="form-control" id="update-mobile">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="updateRecord()">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="hidden" id="hidden_id">
      </div>
    </div>
  </div>
</div>  <!-- ✅ properly closed updateModal -->


<!-- Add Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
      </div>
      <div class="modal-body">
        <form class="form-group">
          <label>Firstname : </label>
          <input type="text" class="form-control" id="firstname">
          <label>Lastname : </label>
          <input type="text" class="form-control" id="lastname">
          <label>Email ID : </label>
          <input type="text" class="form-control" id="email">
          <label>Mobile : </label>
          <input type="text" class="form-control" id="mobile">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="addRecord()" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

             <!-- Modal content-->
                <div class="modal-content">
                 <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                </div>
                <div class="modal-body">
                <form class="form-group">
                <label>Firstname : </label>
                <input type="text" class="form-control" id="firstname">
                <label>Lastname : </label>
                <input type="text" class="form-control" id="lastname">
                <label>Email ID : </label>
                <input type="text" class="form-control" id="email">
                <label>Mobile : </label>
                <input type="text" class="form-control" id="mobile">
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      
    </div>

  </div>
</div>
    </div>

    <script>
        $(document).ready(function()
    {
        readRecords();
    })

        function readRecords()
        {
            var readRecord = "readrecord";

            $.ajax({
                url : "backend1.php",
                type: 'POST',
                data : {readRecord : readRecord},
                success : function(data,status)
                {
                        $('#records_content').html(data);
                }
            })
        }
            function addRecord()
            {
                var firstnames = $("#firstname").val();
                var lastnames = $("#lastname").val();
                var emails = $("#email").val();
                var mobiles = $("#mobile").val();

                $.ajax({
                    url: 'backend1.php',
                    type : 'POST',
                    data : {firstname : firstnames,
                        lastname : lastnames,
                        email : emails,
                        mobile : mobiles
                    },
                    success : function(data,status)
                    {
                        readRecords();
                    }
                })

            }

            function DeleteUser(deleteId)
            {
                var conf = confirm("Are you sure");
                if(conf == true)
                {
                    $.ajax({
                        url: 'backend1.php',
                        type:'POST',
                        data: {deleteId:deleteId},
                        success : function(data,status)
                        {
                            readRecords();
                        }
                    })
                } 
            }

            function GetUserDetails(id)
            {

                $('#hidden_id').val(id);

                $.post('backend1.php',{
                    id : id
                },
                function (data,status)
                {
                    try {
            var user = JSON.parse(data); // now valid JSON
            $("#update-firstname").val(user.firstname);
            $("#update-lastname").val(user.lastname);
            $("#update-email").val(user.email);
            $("#update-mobile").val(user.mobile);

            $("#updateModal").modal("show");
        } catch (e) {
            console.error("Invalid JSON:", data);
        }
                }
            );

            $("#updateModal").modal("show");
            }


            function updateRecord()
            {

                  var firstnameupd = $("#update-firstname").val();
    var lastnameupd = $("#update-lastname").val();
    var emailupd = $("#update-email").val();
    var mobileupd = $("#update-mobile").val();

    var hidden_idupd = $("#hidden_id").val();

                $.post('backend1.php',{
                    hidden_idupd : hidden_idupd,
                    firstnameupd : firstnameupd,
                    lastnameupd : lastnameupd,
                    emailupd : emailupd,
                    mobileupd : mobileupd
                },
                function (data,status)
                {
                    $("#updateModal").modal("hide");
                    readRecords();
                }
            
            )

            }

    </script>
</body>
</html>