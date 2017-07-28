<?php 

/**
 * 构建上传文件信息
 * @return array
 */
function buildInfo(){
	if(!$_FILES){
		return ;
	}
	$i=0;
	foreach($_FILES as $v){
		//单文件
		if(is_string($v['name'])){
			$files[$i]=$v;
			$i++;
		}else{
			//多文件
			foreach($v['name'] as $key=>$val){
				$files[$i]['name']=$val;
				$files[$i]['size']=$v['size'][$key];
				$files[$i]['tmp_name']=$v['tmp_name'][$key];
				$files[$i]['error']=$v['error'][$key];
				$files[$i]['type']=$v['type'][$key];
				$i++;
			}
		}
	}
	return $files;
}
/**
 * 
 * @param string $path
 * @param unknown $allowExt
 * @param number $maxSize
 * @param string $imgFlag
 * @return string
 */
function uploadFile($path = "upload",$allowExt=array("gif","jpeg","jpg","png","wbmp"),$maxSize = 1048576,$imgFlag = true){
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i = 0;
    $files = buildInfo();
    if(!($files&&is_array($files))){
        return ;
    }
    foreach ($files as $file){
        if($file['error'] === UPLOAD_ERR_OK){
            $ext = getExt($file['name']);
            
            if(!in_array($ext, $allowExt)){
                exit("非法文件类型");
            }
            if($imgFlag){
                if(!getimagesize($file['tmp_name'])){
                    exit("不是真正的图片类型");
                }
            }
            if($file['size'] > $maxSize){
                exit("文件过大");
            }
            
            if(!is_uploaded_file($file['tmp_name'])){
                exit("不是通过HTTP POST方式上传上来的");
            }
            $filename = getUniName().".".$ext;
            $destination = $path."/".$filename;
            if(move_uploaded_file($file['tmp_name'], $destination)){
                $file['name'] = $filename;
                unset($file['tmp_name'],$file['type'],$file['size']);
                $uploadedFiles[$i] = $file;
                $i++;
            }
        }else{
            switch ($file['error']){
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
            echo $mes;
        }
    }
    return $uploadedFiles;
}
