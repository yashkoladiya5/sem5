<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
include("connection.php");
if(isset($_POST['bookId']))
{
    $bookId = $_POST['bookId'];
    $bookName = $_POST['bookName'];
    $bookPrice = $_POST['bookPrice'];

    $query = "insert into book values($bookId,'$bookName','$bookPrice')";
    mysqli_query($conn,$query);
    echo "Success";
}

if(isset($_POST['data']))
{
    // echo "Display Called";

    $query = "select * from book";
    $result = mysqli_query($conn,$query);
    $data = 
    "<table class='table table-bordered table-striped'>
        <tr>
            
            <th>BookID</th>
            <th>Book Name</th>
            <th>Book Price</th>
            <th>Action 1</th>
            <th>Action 2</th>
        </tr>
    ";
    if(mysqli_num_rows($result) > 0)
    {
        $number =1;
        while($row = mysqli_fetch_array($result))
        {
            $data .= '
            <tr>
                
                <td>'.$row['bid'].'</td>
                <td>'.$row['bname'].'</td>
                <td>'.$row['bprice'].'</td>
                <td><button class="btn btn-primary" onClick="GetUserDetails('.$row['bid'].')">Edit</button></td>
                <td><button class="btn btn-danger" onClick="DeleteBook('.$row['bid'].')">Delete</button></td>
                
            </tr>

            ';
            // $number++;
        }

        $data .= '</table>';
    }

    echo $data;
}

if(isset($_POST['bId']))
{
    include("connection.php");
    $bid = $_POST['bId'];

    $query = "SELECT * FROM book WHERE bid = $bid";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);  // fetch single row
        echo json_encode([
            "bid" => $row['bid'],
            "bname" => $row['bname'],
            "bprice" => $row['bprice']
        ]);
    }
    else
    {
        echo json_encode(["error" => "No data found"]);
    }
    exit;  // important to stop extra output
}


if(isset($_POST['upbookId']))
{
    echo "Book ID Get Success For Update";
    $bookId = $_POST['upbookId'];
    $bookName = $_POST['upbookName'];
    $bookPrice = $_POST['upbookPrice'];

    $query = "update book set bname = '$bookName' , bprice = '$bookPrice' where bid = $bookId";
    mysqli_query($conn,$query);
}

if(isset($_POST['deleteId']))
{
    $deleteId = $_POST['deleteId'];
    $query = "delete from book where bid = $deleteId";

    mysqli_query($conn,$query);
}

?>