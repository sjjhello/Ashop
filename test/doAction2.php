<?php
require_once 'upload.func.php';
require_once '../lib/string.func.php';
header("content-type:text/html;charset=utf-8");
//多个单文件上传
//print_r($_FILES);
foreach ($_FILES as $val){
    $mes = uploadFile($val);
    echo $mes;
}