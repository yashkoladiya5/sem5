<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'sem5_97';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (isset($_POST['display'])) {
    $data = '<table class="table table-bordered table-striped">
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
      
        
    </tr>
    
    ';

    $query = "select * from ajaxpractice";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $data .= '
            <tr class="text-center">
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td><img src="uploads/' . $row['image'] . '" height="30px" width="50px"></img></td>
             
            </tr>
            ';
        }
    }
    $data .= '</table>';

    echo $data;
}



?>