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

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link href="style_test.css" rel="stylesheet">
	<title>find member info form</title>
	<script langauge="javescript">
		function check_form()
		{
			var acct = document.form1.ac.value;
			var name = document.form1.name.value;
			if (acct=="" && name=="")								//檢查到沒有填寫帳號
			{	alert("不可兩欄同時為空");	return false;	}
			if (acct!="" && name!="")								//檢查到沒有填寫帳號
			{	alert("不可同時填寫兩欄");	return false;	}
			if (acct.length != 8)
			{	alert("帳號長度必定是 8 個字元");	return false;	}
		}
	</script>
</head>

<body>
	<form name="form1" method="get" action="get_member_list.php" onSubmit="return check_form();>
		<table width="250" border="1" align="center">
			<tr valign="top"><td align="center">
			<p> 搜尋用戶 </p>
			<p>學生/教師編號 : <br>
				<input name="ask_ac" type="text" value="">
			</p>
			<p>用戶名稱 : <br>
				<input name="ask_name" type="text" value="">
			</p>
			<p>
				上述欄位只填一欄,以編號搜索得出更精確結果
			</p>
			<p align="center">
				<input type="submit" name="find" value="搜尋">
			</p>
			<!-- --------------------------------------------------新增帳號------------------------------------------------- -->
			
			</td></tr>
		</table>
	</form>
</body>

</html>