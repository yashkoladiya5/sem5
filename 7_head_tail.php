<?php

$number = rand(1,2);
$num1 = 0;
$num2 = 0;

for($i = 0 ;$i<=100;$i++)
{
    $number = rand(1,2);
    if($number == 1)
    {
        $num1++;
    }else
    {
        $num2++;
    }
}

if($num1 > $num2 )
{

    echo "I Win" ."<br>Total Head $num1 and tails $num2";
}else
{
    echo "You Win" ."<br>Total Head $num1 and tails $num2";
}

?>