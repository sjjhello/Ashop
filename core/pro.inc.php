<?php

/**
 * 添加商品
 * @return string
 */
function addPro()
{
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./upload";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../image_350/" . $uploadFile['name'], 350, 350);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res = insert("imooc_pro", $arr);
    $pid = $res;
    if ($res && $pid) {
        foreach ($uploadFiles as $uploadFile) {
            $arr1['pid'] = $pid;
            $arr1['albumPath'] = $uploadFile['name'];
            addAlbum($arr1);
        }
        $mes = "添加成功！<br><a href='addPro.php'>继续添加</a>|<a href='listPro.php'>查看商品</a>";
    } else {
        foreach ($uploadFiles as $uploadFile) {
            if (file_exists("../image_800/" . $uploadFile['name'])) {
                unlink("../image_800/" . $uploadFile['name']);
            }
            if (file_exists("../image_50/" . $uploadFile['name'])) {
                unlink("../image_50/" . $uploadFile['name']);
            }
            if (file_exists("../image_220/" . $uploadFile['name'])) {
                unlink("../image_220/" . $uploadFile['name']);
            }
            if (file_exists("../image_350/" . $uploadFile['name'])) {
                unlink("../image_350/" . $uploadFile['name']);
            }
        }
        $mes = "添加失败！<br><a href='addPro.php'>重新添加</a>";
    }
    return $mes;
}

function editPro($id)
{
    $arr = $_POST;
    $path = "./upload";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFile) {
            thumb($path . "/" . $uploadFile['name'], "../image_50/" . $uploadFile['name'], 50, 50);
            thumb($path . "/" . $uploadFile['name'], "../image_220/" . $uploadFile['name'], 220, 220);
            thumb($path . "/" . $uploadFile['name'], "../image_350/" . $uploadFile['name'], 350, 350);
            thumb($path . "/" . $uploadFile['name'], "../image_800/" . $uploadFile['name'], 800, 800);
        }
    }
    $res = update("imooc_pro", $arr, "id={$id}");
    $pid = $id;
    if ($res && $pid) {
        if (is_array($uploadFiles) && $uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['pid'] = $pid;
                $arr1['albumPath'] = $uploadFile['name'];
                addAlbum($arr1);
            }
        }
        $mes = "编辑成功！<br><a href='listPro.php'>查看商品</a>";
    } else {
        if (is_array($uploadFiles) && $uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                if (file_exists("../image_800/" . $uploadFile['name'])) {
                    unlink("../image_800/" . $uploadFile['name']);
                }
                if (file_exists("../image_50/" . $uploadFile['name'])) {
                    unlink("../image_50/" . $uploadFile['name']);
                }
                if (file_exists("../image_220/" . $uploadFile['name'])) {
                    unlink("../image_220/" . $uploadFile['name']);
                }
                if (file_exists("../image_350/" . $uploadFile['name'])) {
                    unlink("../image_350/" . $uploadFile['name']);
                }
            }
        }
        $mes = "编辑失败！<br><a href='listPro.php'>重新编辑</a>";
    }
    return $mes;
}

/**
 * 得到商品的所有信息
 * 
 * @return mixed
 */
function getAllProByAdmin()
{
    $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 得到商品图片保存名称
 * 
 * @param unknown $id            
 * @return mixed
 */
function getAllImgByProId($id)
{
    $sql = "select a.albumPath from imooc_album a where pid={$id}";
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 根据id得到商品的详细信息
 * 
 * @param int $id            
 * @return array
 */
function getProById($id)
{
    $sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.id={$id}";
    $row = fetchOne($sql);
    return $row;
}