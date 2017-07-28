<?php

function addAlbum($arr){
    insert("imooc_album", $arr);
}
/**
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
    $sql = "select albumPath from imooc_album where pid={$id} limit 1";
    $row = fetchOne($sql);
    return $row;
}
/**
 * 根据商品id得到所有的图片
 * @param int $id
 * @return array
 */
function getProImgsByid($id){
    $sql = "select albumPath from imooc_album where pid={$id}";
    $rows = fetchAll($sql);
    return $rows;
}