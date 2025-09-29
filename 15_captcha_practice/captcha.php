<?php

session_start();

$captcha_text = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, rand(6,8));


$_SESSION['captcha'] = $captcha_text;

$img = imagecreate(200,60);

$bg = imagecolorallocate($img,255,255,255);
$fg = imagecolorallocate($img,0,0,0);

imagestring($img,5,50,10,$captcha_text,$fg);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);


?>