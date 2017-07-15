<?php
require_once 'string.func.php';
//create verify by GD library
function verifyImage($type=1,$length=4,$pixel=50,$line=5,$sess_name = "verify"){
//     session_start();
    // create a canvas
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    // Fill the canvas with a fill rectangle
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
//     $type = 1;
//     $length = 4;
    $chars = buildRandomString($type, $length);
//     $sess_name = "verify";
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array(
        "SIMYOU.TTF"
    );
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(- 15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $fontfile = "../fonts/" . $fontfiles[0];
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
//     $pixel = 50;
    if ($pixel) {
        for ($i = 0; $i < 50; $i ++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
//     $line = 5;
    if ($line) {
        for ($i = 1; $i < $line; $i ++) {
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
        }
    }
    
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}