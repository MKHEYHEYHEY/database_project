<?php
	session_start();
	
	require_once ('connMysql.php');
	
	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了
	
	//require_once("login_check.php");
	
	$sql = "delete
		from class_list
		where student_ac = '".$_GET['ac']."'";
	if ($conn->query($sql))
	{		header ("Location: new_class_list_form.php");	}
	else
	{		header ("Location: new_class_list_form.php");	}

//header ("Location: get_member_list.php?asl_ac=$_GET['ask_ac']&ask_name=$_GET['ask_name']");
?>