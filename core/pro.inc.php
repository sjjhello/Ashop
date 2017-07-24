<?php
function addPro(){
    $arr = $_POST;
    $arr['pubTime']=time();
    $path = "./upload";
    $uploadFiles = uploadFile($path);
    if(is_array($uploadFiles) && $uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFile){
            thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
            thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
            thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
            thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
        }
    }
    $res = insert("imooc_pro", $arr);
    $pid = $res;
    if($res && $pid){
       foreach ($uploadFiles as $uploadFile){
           $arr1['pid'] = $pid;
           $arr1['albumPath'] = $uploadFile['name'];
           addAlbum($arr1);
       }
       $mes = "添加成功！<br><a href='addPro.php'>继续添加</a>|<a href='listPro.php'>查看商品</a>";
    }else{
        foreach ($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
                unlink("../image_800/".$uploadFile['name']);
            }
            if(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            if(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            if(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        }
        $mes = "添加失败！<br><a href='addPro.php'>重新添加</a>";
    }
    return $mes;
}