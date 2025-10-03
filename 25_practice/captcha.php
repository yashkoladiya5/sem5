<?php
session_start();

$image_text = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);
$_SESSION['captcha'] = $image_text;

// create image
$img = imagecreate(250, 50);
$bg = imagecolorallocate($img, 200, 200, 200); // light gray background
$fg = imagecolorallocate($img, 0, 0, 0);       // black text

imagestring($img, 5, 90, 15, $image_text, $fg);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);

?>