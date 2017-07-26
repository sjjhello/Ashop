<?php
/**
 * 添加分类操作
 * @return string
 */
function addCate(){
    $arr = $_POST;
    if(insert("imooc_cate", $arr)){
            $mes = "添加成功！<br><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
        }else{
            $mes = "添加失败！<br><a href='addCate.php'>重新添加</a>";
        }
        return $mes;
}

function editCate($id){
    $arr = $_POST;
    if(update("imooc_cate", $arr,"id={$id}")){
        $mes = "编辑成功!|<a href='listCate.php'>查看分类列表</a>";
    }else{
        $mes = "编辑失败!|<a href='listCate.php'>请重新修改</a>";
    }
    return $mes;
}

function delCate($id){
    $res = checkProExist($id);
    if(!$res){
      if (delete("imooc_cate", "id={$id}")) {
            $mes = "删除成功!|<a href='listCate.php'>查看分类列表</a>";
        } else {
            $mes = "删除失败!|<a href='listCate.php'>请重新删除</a>";
        }
        return $mes;  
    }else{
        alertMes("不能删除分类，请先删除该分类下的商品","listPro.php");
    }
    
}

function getCateById($id){
    $sql = "select id,cName from imooc_cate where id={$id}";
    return fetchOne($sql);
}

function getAllCate(){
    $sql = "select id,cName from imooc_cate";
    $rows = fetchAll($sql);
    return $rows;
} 