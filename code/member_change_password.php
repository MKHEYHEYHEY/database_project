<?php

	session_start();
	
	require_once ('connMysql.php');
	
	$sql = "SELECT ac,pw FROM member WHERE ac='".$_SESSION['ac']."'";
	
	$result = $conn->query($sql);
	
	$row = $result->fetch_array();
	
	$pw = $row['pw'];
	
	$pw0 = $_POST['pw0'];
	
	if($pw != $pw0)
	{		header("Location: member_change_password_form.php?pw0_fail=true");	}
	else
	{
		$sql = "UPDATE member SET pw='".$_POST['pw1']."'"." WHERE ac='".$_SESSION['ac']."'";
		
		if ($conn->query($sql))
		{		header ("Location: member_info.php?change_pw=true"); 		}
		else
		{		header ("Location: member_info.php?change_pw=false"); 		}
	}
?>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		