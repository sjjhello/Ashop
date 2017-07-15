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
						
							<h3>系统信息</h3>
							<table width="70%" border="1" cellpadding="5" cellspacing="0"
								bgcolor="#cccccc">
								<tr>
									<th>操作系统</th>
									<td><?php echo PHP_OS;?></td>
								</tr>
								<tr>
									<th>Apache版本</th>
									<td><?php echo apache_get_version();?></td>
								</tr>
								<tr>
									<th>PHP版本</th>
									<td><?php echo PHP_VERSION;?></td>
								</tr>
								<tr>
									<th>运行方式</th>
									<td><?php echo PHP_SAPI;?></td>
								</tr>
							</table>
							<h3>软件信息</h3>
							<table width="70%" border="1" cellpadding="5" cellspacing="0"
								bgcolor="#cccccc">
								<tr>
									<th>系统名称</th>
									<td>慕课网电子商城</td>
								</tr>
								<tr>
									<th>开发团队</th>
									<td>King&慕课网的小伙伴</td>
								</tr>
								<tr>
									<th>公司网址</th>
									<td><a href="http://www.imooc.com">http://www.imooc.com</a></td>
								</tr>
								<tr>
									<th>成功案例</th>
									<td>慕课网</td>
								</tr>
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
</html>