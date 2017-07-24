<?php
require_once '../lib/string.func.php';
header("content-type:text/html;charset=utf-8");
// $filename = $_FILES['myFile']['name'];
// $type = $_FILES['myFile']['type'];
// $tmp_name = $_FILES['myFile']['tmp_name'];
// $error = $_FILES['myFile']['error'];
// $size = $_FILES['myFile']['size'];

function uploadFile($fileInfo,$path = "upload",$allowExt=array("gif","jpeg","jpg","png","wbmp"),$maxSize = 1048576,$imgFlag = true){
    //$allowExt = array("gif","jpeg","jpg","png","wbmp");
    //$maxSize = 1048576;
    //$imgFlag = true;
    //判断错误信息
    if ($fileInfo['error'] == UPLOAD_ERR_OK){
        //限制文件类型
        $ext = getExt($fileInfo['name']);
        if (!in_array($ext, $allowExt)){
            exit("非法文件类型");
        }
        if($fileInfo['size'] > $maxSize){
            exit("文件过大");
        }
        if($imgFlag){
            //如何验证一张图片是否是一个真正的图片类型
            //getimagesize($tmp_name);调用该函数
            $info = getimagesize($fileInfo['tmp_name']);
            if(!$info){
                exit("别玩小把戏");
            }
        }
        //寻要判断文件是否是通过HTTP POST方式上传上来
        //is_uploaded_file($tmp_name):
        $filename = getUniName().".".$ext;
        
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $destination = $path."/".$filename;
        if(is_uploaded_file($fileInfo['tmp_name'])){
            if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
                $mes = "文件上传成功";
            }else{
                $mes = "文件移动失败";
            }
    
        }else {
            $mes = "文件不是通过HTTP POST方式 上传上来的";
        }
    }else{
        switch ($fileInfo['error']){
            case 1:
                $mes = "超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
                break;
            case 2:
                $mes = "超过了表单设置上传文件的大小";//UPLOAD_ERR_FORM_SIZE
                break;
            case 3:
                $mes = "文件部分被上传";//UPLOAD_ERR_PARTIAL
                break;
            case 4:
                $mes = "没有文件上传";//UPLOAD_ERR_NO_FILE
                break;
            case 6:
                $mes = "没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
                break;
            case 7:
                $mes = "文件不可写";//UPLOAD_ERR_CANT_WRITE
                break;
            case 8:
                $mes ="由于php扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
                break;
        }
    }
    return $mes;
}
