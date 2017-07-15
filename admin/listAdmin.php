<?php
require_once '../include.php';
chechLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="./styles/backstage.css">
</head>

<body>
	<div class="head">
		<div class="logo fl">
			<a href="#"></a>
		</div>
		<h3 class="head_text fr">慕课电子商务后台管理系统</h3>
	</div>
	<div class="operation_user clearfix">
		<div class="link fl">
			<a href="#">慕课</a>
		</div>
		<div class="link fr">
			<b>欢迎您
        	<?php
        if (isset($_SESSION['adminName'])) {
            echo $_SESSION['adminName'];
        } elseif (isset($_COOKIE['adminName'])) {
            echo $_COOKIE['adminName'];
        }
        ?>
        	 </b> <a href="#" class="icon icon_i">首页</a><span></span><a
				href="#" class="icon icon_j">前进</a><span></span><a href="#"
				class="icon icon_t">后退</a><span></span><a href="#"
				class="icon icon_n">刷新</a><span></span><a
				href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
		</div>
	</div>
	<div class="content clearfix">
		<div class="main">
			<!--右侧内容-->
			<div class="cont">
				<div class="title">后台管理</div>
				<div class="details">
					<div class="details_operation clearfix">
						<div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">管理员名称</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
					</div>
					<!--表格-->

				</div>
			</div>
		</div>
		<!--左侧列表-->
		<div class="menu">
			<?php 
			require_once './common/menu.php';
			?>
		</div>
	</div>
</body>
<script type="text/javascript">

	function addAdmin(){
		window.location="addAdmin.php";	
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delAdmin&id="+id;
			}
	}
</script>
</html>