<?php

	session_start();							//�ΨӼȦs�Τ᪺���

	require_once ('connMysql.php');

	require_once("login_check.php");			//login_check.php �O�Ψ��ˬd�Τ�O�_�n���F

	$ac=$_SESSION['ac'];	
	
    $sql = "SELECT tl.type, tl.talking_id, m.name
			FROM talking_list as tl, member as m
			where m.ac = cl.student_ac and cl.teacher_ac = '".$ac
			."' tl.this_year = '".$_GET['id']
			."' tl.class_year = '".$_GET['now'].
			"' ORDER BY cl.student_ac DESC";
	
	$result=$conn->query($sql);

?>