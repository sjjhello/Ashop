<?php
require_once '../include.php';
checkLogined();
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
						<h3>添加用户</h3>
						<form action="doAdminAction.php?act=addUser" method="post" enctype="multipart/from-data">
							<table width="70%" border="1" cellpadding="5" cellspacing="0"
								bgcolor="#cccccc">
								<tr>
									<td>用户名</td>
									<td><input type="text" name="username" placeholder="请输入用户名" /></td>
								</tr>
								<tr>
									<td>密码</td>
									<td><input type="password" name="password" /></td>
								</tr>
								<tr>
									<td>邮箱</td>
									<td><input type="text" name="email" placeholder="请输入邮箱" /></td>
								</tr>
								<tr>
									<td>性别</td>
									<td><input type="radio" name="sex" value="0" checked="checked"/>保密
									<input type="radio" name="sex" value="1"/>男
									<input type="radio" name="sex" value="2"/>女
									</td>
								</tr>
								<tr>
									<td>头像</td>
									<td><input type="file" name="myFile" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" value="添加用户" /></td>
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