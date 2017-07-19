<?php
/* require_once '../include.php';
$sql = "select * from imooc_admin";
$totalRows = getResultNum($sql);
$pageSize = 2;
$totalPage = ceil($totalRows/$pageSize);
//得到总页码数
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1 || $page==null || !is_numeric($page)){
    $page = 1;
}
if($page>=$totalPage){
    $page = $totalPage;
}
$offset = ($page-1)*$pageSize;
$sql = "select * from imooc_admin limit {$offset},{$pageSize}";
//echo $sql;
$rows = fetchAll($sql);
// print_r($rows);
foreach ($rows as $row){
    echo "编号:".$row['id'],"<br/>";
    echo "管理员名称".$row['username'],"<hr/>";
}
echo showPage($page, $totalPage); */
function showPage($page,$totalPage){
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}'>尾页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page=" . ($page - 1) . "'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page=" . ($page + 1) . "'>下一页</a>";
    $str = "总共{$totalPage}页/当前是第{$page}页";
    $p = "";
    for ($i = 1; $i <= $totalPage; $i ++) {
        // 当前页码没有连接
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
        }
    }
    
    $pageStr = $index . $p . $prev . $next . $last . "<br/>" . $str;
    return $pageStr;
}
