<?php

	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
	$sql = "SELECT * FROM member WHERE ac='".$_SESSION["ac"]."'";
	
	$result=$conn->query($sql);									//把上面查詢指令掉到 mysql_query 查詢, 由result得到查詢的結果
	
	$row=$result->fetch_array();								//只要一行資料
?>


<div align="center"
	<p>帳號名稱 : 
		<strong>
			<?php 
				echo $row["name"]; 
			?>
		</strong>
	</p>
	<p align="center">
		<a href="member_center.php"> 個人中心 </a><br>				<!-- menu.php 是一欄選單,無論那一個頁面都會看到的一欄,就像facebook 左手邊那一欄東西 -->
		<a href="member_join_form.php">新增帳號</a><br>
		<a href="logout.php">登出系統</a><br>
	</p>
</div>