<?php
function buildRandomString($type = 1, $length = 4)
{
    if ($type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($type == 2) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($type == 3) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
    }
    if ($length > strlen($chars)) {
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}

function getUniName(){
    return md5(uniqid(microtime(true),true));
}

function getExt($filename){
    $name = explode(".","$filename");
    return strtolower(end($name));
    //因为end函数只接受一个引用，所以尽量让end()里面只有一个值
}