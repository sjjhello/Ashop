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
						<h3>添加管理员</h3>
						<form action="doAdminAction.php?act=addAdmin" method="post">
							<table width="70%" border="1" cellpadding="5" cellspacing="0"
								bgcolor="#cccccc">
								<tr>
									<td>管理员名称</td>
									<td><input type="text" name="username" placeholder="请输入管理员名称" /></td>
								</tr>
								<tr>
									<td>管理员密码</td>
									<td><input type="password" name="password" /></td>
								</tr>
								<tr>
									<td>管理员邮箱</td>
									<td><input type="text" name="email" placeholder="请输入管理员邮箱" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" value="添加管理员" /></td>
								</tr>
							</table>
						</form>


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
</html>