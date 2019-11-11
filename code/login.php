<?php

	header("Content-Type: text/html; charset=UTF-8");
	
	require_once ('connMysql.php');			//引用connMysql.php 來連接資料庫
	
	session_start();						//用 session 函式
	
	$sql = "SELECT ac,pw,access FROM member WHERE ac='".$_POST["ac"]."'";		//sql 查詢語法, 查詢後會把結果返回到 $sql
		
	$result=$conn->query($sql);									//把上面查詢指令掉到 mysql_query 查詢, 由result得到查詢的結果
	
	$row=$result->fetch_array();								//只要一行資料
		
	$ac = $row['ac'];
		
	$pw = $row['pw'];
	
	$access = $row['access'];
	
	if (	isset($_SESSION["ac"]) && ($_SESSION ["ac"] != "")	)
	{	
		if ($row['access']=="root")													//登錄時, 這裏就分開了, 它會跟據你帳號本身的權限引導你去不同的頁面
			header("Location: root_center.php?page=member_info.php");
		else if ($row['access']=="student")
			header("Location: student_center.php?page=member_info.php"); 
		else if ($row['access']=="teacher")
			header("Location: teacher_center.php?page=member_info.php"); 
	}
	if (	!isset($_SESSION["ac"]) && !isset($_SESSION ["pw"])	)
	{
		
		if ($_POST["pw"] == $pw)		//如果密碼正確
		{
			$_SESSION["ac"] = $ac;
			$_SESSION["access"] = $access;
			if(	isset($_POST["rememberme"]) && ( $_POST["rememberme"] == "true" )	)		//如果看到 index 中的 rememberme 有勾選, 就setcookie
			{	
				setcookie("ac", $_POST["ac"], time()+365*24*60*60);							//cookie 名為 ac, 它的值是 $_POST["ac"], 時間是一年
				setcookie("pw", $_POST["pw"], time()+365*24*60*60);
			}
			else
			{
				setcookie("ac", $_POST["ac"], time()+365*24*60*60);
				setcookie("pw", $_POST["pw"], time()-100);
			}
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"登入成功\");";
			echo	"</script>";

			if ($row['access']=="root")
				header("Location: root_center.php?page=member_info.php");
			else if ($row['access']=="student")
				header("Location: student_center.php?page=member_info.php"); 
			else if ($row['access']=="teacher")
				header("Location: teacher_center.php?page=member_info.php"); 
			
		}
		else							//如果密碼不正確
		{
			header("Location: index.php?loginfail=true");
		}
		
	}

?>