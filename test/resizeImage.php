<?php
//获取文件名
$filename = "des_big,jpg";
//由文件或 URL 创建一个新图象
$src_image = imagecreatefromjpeg($filename);
//获取图像的长高
list($src_w,$src_h) = getimagesize($filename);
//比例
$scale = 0.5;
//设置新图片的长宽
$dst_w = ceil($src_w*$scale);
$dst_h = ceil($dst_h*$scale);
//新建一个真彩色图像
$dst_image = imagecreatetruecolor($dst_w, $dst_h);
//重采样拷贝部分图像并调整大小
imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
header("content-type:image/jpeg");
//输出图象到浏览器或文件
imagejpeg($dst_image);
imagedestroy($src_image);
imagedestroy($dst_image);

