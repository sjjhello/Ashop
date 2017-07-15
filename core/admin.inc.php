<?php
function checkAdmin($sql){
    return fetchOne($sql);
}

function chechLogined(){
    if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMes("请先登陆", "login.php"); 
    }
}

function addAdmin(){
    $arr = $_POST;
    if(insert("imooc_admin", $arr)){
        $mes = "添加成功！<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员</a>";
    }else{
        $mes = "添加失败！<br><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    alertMes("退出成功", "login.php");
}