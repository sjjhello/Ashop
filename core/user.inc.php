<?php
function reg(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    $arr['regTime'] = time();
    $uploadFile = uploadFile();
    
    if($uploadFile && is_array($uploadFile)){
        $arr['face'] = $uploadFile[0]['name'];
    }else{
        return "注册失败";
    }
    
    if(insert("imooc_user", $arr)){
        $mes="注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=login.php'/>";
    }else{
        $filename = "upload/".$uploadFile[0]['name'];
        if(file_exists($filename)){
            unlink($filename);
        }
        $mes = "注册失败!<br/><a href='reg.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
    }
    return $mes;
}
