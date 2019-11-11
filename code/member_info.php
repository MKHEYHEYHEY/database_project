<?php

	header("Content-Type: text/html; charset=UTF-8");
	
	session_start();						//用 session 函式, 看用戶是否已經登錄了
	
	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
	require_once("login_check.php");
	
	$sql = "SELECT name,access,state FROM member WHERE ac='".$_SESSION["ac"]."'";
	
	$result=$conn->query($sql);									//把上面查詢指令掉到 mysql_query 查詢, 由result得到查詢的結果
	
	$row=$result->fetch_array();								//只要一行資料
	
	if (isset($_GET["change_pw"])) 
	{ 
		if ($_GET["change_pw"]==true)
		{
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"密碼修改成功\");";
			echo	"</script>";
		}
		else
		{
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"密碼未能修改\");";
			echo	"</script>";
		}
	} 
	else if (isset($_GET["change_info"]))
	{
		if ($_GET["change_info"]==true)
		{
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"個人資料修改成功\");";
			echo	"</script>";
		}
		else
		{
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"個人資料未能修改\");";
			echo	"</script>";
		}
	}
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link href="style_test.css" rel="stylesheet">
		<title>會員管理系統</title>
	</head>
	
	<body>
		<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
			<tr valign="top">
				<td>
					<p>
						<font size="6" color="FF0000">個人中心</font>
					</p>
					<hr size="1" />
					<p>xxxxxxxxx</p>
					<ol>
						<?php
							if ($row['state'] < 2 && $row['access'] == 'root')
								echo "<li><a href=\"member_update_form.php\"> 修改個人資料 </a></li>";
							//	else
							//		echo "<li>由於你已不在校,無法修改個人資料</li>";
						?>
						<li><a href="member_change_password_form.php">修改個人密碼</a></li>
					</ol>
				</td>
			</tr>
		</table>
	</body>
</html>