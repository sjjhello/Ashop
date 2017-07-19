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

function getAllAdmin(){
    $sql = "select id,username,email from imooc_admin";
    $rows = fetchAll($sql);
    return $rows;
}

function getAdminByPage($pageSize=2){
    $sql = "select * from imooc_admin";
    $totalRows = getResultNum($sql);
//     $pageSize = 2;
    global $totalPage,$page;
    $totalPage = ceil($totalRows/$pageSize);
    $page = isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
    if($page<1 || $page==null || !is_numeric($page)){
        $page = 1;
    }
    if($page>=$totalPage){
        $page = $totalPage;
    }
    $offset = ($page-1)*$pageSize;
    $sql = "select id,username,email from imooc_admin limit {$offset},{$pageSize}";
    $rows =fetchAll($sql);
    return $rows;
}

function editAdmin($id){
    $arr = $_POST;
    if(update("imooc_admin", $arr,"id={$id}")){
        $mes = "编辑成功!|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "编辑失败!|<a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}

function delAdmin($id){
    $arr = $_POST;
    if(delete("imooc_admin","id={$id}")){
        $mes = "删除成功!|<a href='listAdmin.php'>查看管理员列表</a>";
    }else {
        $mes = "删除失败!|<a href='listAdmin.php'>请重新删除</a>";
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