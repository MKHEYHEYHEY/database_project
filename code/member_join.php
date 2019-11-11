<?php

	header("Content-Type: text/html; charset=UTF-8");
	
	require_once ('connMysql.php');			//引用connMysql.php 來連接資料庫
	
	$sql = "SELECT ac FROM member WHERE ac='".$_POST["ac"]."'";		//從member 資料表中選取 ac 欄位, 並找出 ac=$_POST["ac"] 的資料
	
	$record = mysql_query($sql);
	
	$record=$conn->query($sql);									//把上面查詢到的結果掉到 mysql_query 再查詢一次, 由record得到查詢的結果
	
	$row=$record->fetch_array();
	
	$_zero = 0;
	
	if ($row['ac'] == $_POST["ac"] )			//查詢資料庫看到註冊的帳號已存在, 會返回註冊頁面
	{
		header ("Location: member_join_form.php?registered=true&ac=".$_POST["ac"]);
	}
	else
	{
			
		if ($_POST["mail"]=="")
			$_POST["mail"] = NULL;
		if ($_POST["addr"]=="")
			$_POST["addr"] = NULL;
		if ($_POST["telephone"]=="")
			$_POST["telephone"] = NULL;
		$sql = "INSERT INTO member (ac, pw, name, sex, birthday, mail, telephone, addr, in_school, left_school, state, access) 
				VALUES ('".$_POST["ac"]."','".$_POST["pw1"]."','".$_POST["name"]."','".$_POST["sex"]."','"
				.$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."','"
				.$_POST["mail"]."','".$_POST["telephone"]."','".$_POST["addr"]."','"
				.$_POST["year1"]."-".$_POST["month1"]."-".$_POST["day1"]."','"."NULL"."','"
				.$_zero."','".$_POST["access"]."')";
				
		if($result = $conn->query($sql))
		{
			echo "ok";
		}
		else
		{	echo "fuck";	}
	}
?>
<script language="javascript">
	alert("註冊成功\n");
	window.location.href = "member_join_form.php";
</script>
