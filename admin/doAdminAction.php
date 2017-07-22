<?php
require_once '../include.php';
checkLogined();
@$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];
if ($act=="logout") {
    logout();
} elseif ($act == "addAdmin") {
    $mes = addAdmin();
} elseif ($act == "editAdmin"){
    $mes = editAdmin($id);
}elseif ($act == "delAdmin"){
    $mes = delAdmin($id);
}elseif ($act == "addCate"){
    $mes = addCate();
}elseif ($act == "editCate"){
    $mes = editCate($id);
}elseif ($act == "delCate"){
    $mes = delCate($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>result</title>
</head>
<body>
<?php
    if(isset($mes)){
        echo $mes;
    }
?>
</body>
</html>

