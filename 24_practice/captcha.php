<?php

session_start();

$image_text = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, rand(6, 8));

$_SESSION['captcha'] = $image_text;

header("Content-type: image/png");
$img = imagecreate(150, 50);

$bg = imagecolorallocate($img, 0, 255, 255);
$fg = imagecolorallocate($img, 0, 0, 0);

imagestring($img, 5, 40, 15, $image_text, $fg);

imagepng($img);
imagedestroy($img);




?>