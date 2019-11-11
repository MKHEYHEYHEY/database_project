<?php

	header("Content-Type: text/html; charset=UTF-8");
			
	if(!isset($_SESSION))
	{  		session_start();	}			//用 session 函式, 看用戶是否已經登錄了

	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
	require_once("login_check.php");
	
	$sql = "SELECT name,access FROM member WHERE ac='".$_SESSION["ac"]."'";
	
	$result=$conn->query($sql);									//把上面查詢指令掉到 mysql_query 查詢, 由result得到查詢的結果
	
	$row=$result->fetch_array();								//只要一行資料
	

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="style_test.css">
		<title>會員管理系統</title>
	</head>
	
	<body>
		<table width="90%" height="80%" border="0" align="center" cellpadding="4" cellspacing="0">
			<tr valign="top">
				<td width="15%">
					<div align="center"
						<p>
							<strong>
								<?php 
									echo $row["name"]; 
								?>
							</strong>
							同學  歡迎登入
						</p>
						<p align="center">
							<a href="student_center.php?page=member_info.php"> 個人中心 </a><br>		<!-- menu.php 是一欄選單,無論那一個頁面都會看到的一欄,就像facebook 左手邊那一欄東西 -->
							<a href="student_center.php?page=student_get_my_class_list.php">大學生涯會談記錄</a><br>
							<a href="student_center.php?page=message_board.php">留言版</a><br>
							<a href="logout.php">登出系統</a><br>
						</p>
					</div>
				</td>

				<td width="75%" height="550">				<!-- 這裏是一個子網頁區域, 它會跟據你 $_GET['page'] 的php 檔名, 來把php 網頁顯示這一小區域中 -->
				<iframe src="
				<?php 	
					echo $_GET['page'];
				?>
				" scrolling="YES" width="100%" height="100%"></iframe>
<!--			<iframe name="框架名稱" src="網址"
				width="寬" height="高" marginwidth="框架內容水平方向留空白" marginheight="框架內容垂直方向留空白"
				border="0" frameborder="控製框架線段存在與否。" scrolling="NO為取消自動捲軸，若要保留自動捲軸，可填入YES。預設值為auto"></iframe>	-->	
				</td>
				
			</tr>
		</table>
	</body>
</html>