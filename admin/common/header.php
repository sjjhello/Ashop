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
        	 </b> <a href="./index.php" class="icon icon_i">首页</a><span></span><a
				href="#" class="icon icon_j">前进</a><span></span><a href="#"
				class="icon icon_t">后退</a><span></span><a href="#"
				class="icon icon_n">刷新</a><span></span><a
				href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
		</div>
	</div>