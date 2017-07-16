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
	<?php 
			require_once './common/header.php';
	?>
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