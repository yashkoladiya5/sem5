<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Enter your fav color :
        <input type="text" name="favColor" id="favColor">
        <input type="submit" name = "submit" value = "Check now">
    </form>
    <p>

        <?php
        if(isset($_POST['submit']))
        {
            $favColor = $_POST['favColor'];
            switch($favColor)
            {
                case "blue" : echo "Your Fav color is Blue";
                break;
                case "red" : echo "Your Fav color is Red" ;
                break;
                case "pink" : echo "Your Fav color is Pink";
                break;
                default:
                echo "Your Fav Color is $favColor";
            }
        }

?>
</p>
</body>
</html>