<?php

include("./connection.php");

$query = "SELECT * FROM user_table";
$output = mysqli_query($conn, $query);
$rows = mysqli_num_rows($output);

echo "<h2 style='text-align:center;'>Total Users: $rows</h2>";

if ($rows > 0) {
    echo "<table style='width:90%; margin:auto; border-collapse:collapse; font-family:Arial, sans-serif;'>
            <thead>
                <tr style='background-color:#4CAF50; color:white;'>
                    <th style='padding:12px; border:1px solid #ddd;'>Name</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Email</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Qualification</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Year</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Image</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Edit</th>
                    <th style='padding:12px; border:1px solid #ddd;'>Delete</th>
                </tr>
            </thead>
            <tbody>";

    $i = 0;
    while ($res = mysqli_fetch_assoc($output)) {
        $bg = ($i % 2 == 0) ? '#f2f2f2' : '#ffffff';
        echo "<tr style='background-color:$bg; text-align:center;'>
                <td style='padding:10px; border:1px solid #ddd;'>{$res['name']}</td>
                <td style='padding:10px; border:1px solid #ddd;'>{$res['email']}</td>
                <td style='padding:10px; border:1px solid #ddd;'>{$res['qualification']}</td>
                <td style='padding:10px; border:1px solid #ddd;'>{$res['year']}</td>
                <td style='padding:10px; border:1px solid #ddd;'><img src='{$res['image']}' alt='Profile Image' style='width:80px; height:80px; object-fit:cover; border-radius:8px;'></td>
                <td style='padding:10px; border:1px solid #ddd;'><a href='update.php?id={$res['id']}' style='color:#2196F3; text-decoration:none; font-weight:bold;'>Edit</a></td>
                <td style='padding:10px; border:1px solid #ddd;'><a href='delete.php?id={$res['id']}' style='color:#f44336; text-decoration:none; font-weight:bold;'>Delete</a></td>
              </tr>";
        $i++;
    }

    echo "</tbody></table>";
}
?>
