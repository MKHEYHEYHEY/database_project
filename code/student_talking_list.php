<?php

	session_start();							//用來暫存用戶的資料

	require_once ('connMysql.php');

	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了

	$ac=$_SESSION['ac'];	
	
    $sql = "SELECT tl.type, tl.talking_id, m.name
			FROM talking_list as tl, member as m
			where m.ac = cl.student_ac and cl.teacher_ac = '".$ac
			."' tl.this_year = '".$_GET['id']
			."' tl.class_year = '".$_GET['now'].
			"' ORDER BY cl.student_ac DESC";
	
	$result=$conn->query($sql);

?>