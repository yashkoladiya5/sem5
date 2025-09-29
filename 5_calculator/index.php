<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    Enter Number 1 : <input type="text" name= "num1">
    <br>
    <br>
    
    Enter Number 2 : <input type="text" name= "num2">
    <br><br>
    Choose Operation : 
    <select name="operation" id="">
        <option value="0">Select Operation</option>
        <option value="add">Add</option>
        <option value="sub">Substraction</option>
        <option value="mult">Multiplication</option>
        <option value="div">Division</option>
    </select>
    <br><br>
    <input type="submit" value="check" name="submit">

    </form>

    <br><br>
    <p>
        <?php
            if(isset($_POST['submit']))
            {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $selectedOption = $_POST['operation'];
                $operation = '';

                switch($selectedOption)
                {
                    case "0":
                        echo " Please select Option First";
                        break;
                    
                        case "add":
                            $num3 = (float)$num1  + (float)$num2;
                            echo "Addition of both Number is $num3";
                            break;

                        case "sub":
                            $num3 = (float)$num1 - (float)$num2;
                            echo "Substraction of both Number is $num3";
                            break;

                        case "mult":
                            $num3 = (float)$num1 * (float)$num2;
                            echo "Multiplication of both Number is $num3";
                            break;

                        case "div":
                            $num3 = (float)$num1 / (float)$num2;
                            echo "Division of both Number is $num3";
                            break;
                        default:
                        echo "Something went wrong";
                        break;
                }
            }
        ?>
    </p>
</body>
</html>