<?php
function addCate(){
    $arr = $_POST;
    if(insert("imooc_cate", $arr)){
            $mes = "添加成功！<br><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看管理员</a>";
        }else{
            $mes = "添加失败！<br><a href='addCate.php'>重新添加</a>";
        }
        return $mes;
}