<?php
session_start();

// Generate random text (6–8 chars)
                //this will give random numbers from this              //0 to 6 or 8 characters
$captcha_text = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789", 0, rand(6,8)));

//store inside captcha of session
$_SESSION['captcha'] = $captcha_text;

// Create image
$img = imagecreate(500, 60); //500 is width and 60 is height
$bg  = imagecolorallocate($img, 255, 255, 200); // white color background
$fg  = imagecolorallocate($img, 0, 0, 0);       // black color text on image

// Write text on image
                //5 is font size php allows font size from 1 to 5
imagestring($img, 5, 150, 10, $captcha_text, $fg); //150 is left padding, 10 is top padding

// Show as PNG
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
