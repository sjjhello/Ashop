<?php
//实例图片
$filename = "des_big.jpg";
//getimagesize()=>取得图像大小和类型
list($src_w,$src_h,$imagetype)=getimagesize($filename);
//取得 getimagesize所返回的图像类型的 MIME 类型
$mime = image_type_to_mime_type($imagetype);
//echo $mime;//image/jpeg,image/gif=>imagecreatefromjpeg,imagecreategif
$createFun = str_replace("/", "createfrom", $mime);
//image/jpeg=>imagejpeg
$outFun = str_replace("/", null, $mime);
$src_image = $createFun($filename);
//imagecreatetruecolor()=>新建一个真彩色图像
$dst_50_image = imagecreatetruecolor(50, 50);
$dst_220_image = imagecreatetruecolor(220, 220);
$dst_350_image = imagecreatetruecolor(350, 350);
$dst_800_image = imagecreatetruecolor(800, 800);
//imagecopyresampled()=>重采样拷贝部分图像并调整大小 
imagecopyresampled($dst_50_image, $src_image, 0,0,0,0, 50, 50, $src_w, $src_h);
imagecopyresampled($dst_220_image, $src_image, 0,0,0,0, 220, 220, $src_w, $src_h);
imagecopyresampled($dst_350_image, $src_image, 0,0,0,0, 350, 350, $src_w, $src_h);
imagecopyresampled($dst_800_image, $src_image, 0,0,0,0, 800, 800, $src_w, $src_h);
//上面的$dst_50_image已经有值
$outFun($dst_50_image,"upload/image_50/".$filename);
$outFun($dst_220_image,"upload/image_220/".$filename);
$outFun($dst_350_image,"upload/image_350/".$filename);
$outFun($dst_800_image,"upload/image_800/".$filename);
//销毁
imagedestroy($src_image);
imagedestroy($dst_50_image);
imagedestroy($dst_220_image);
imagedestroy($dst_350_image);
imagedestroy($dst_800_image);
