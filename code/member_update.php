<?php
	session_start();
	
	require_once ('connMysql.php');
	
	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了
	
	//require_once("login_check.php");
	if (isset($_POST["acct"]))
		$ac = $_POST["acct"];
	else
    $ac = $_SESSION["ac"];
/*	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$birthday=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $mail=$_POST['mail'];
	$tel=$_POST['telephone'];
	$addr=$_POST['addr'];	*/
    
 /*   if(!empty($name)){mysql_query("UPDATE member SET name='$name' WHERE ac='$ac'");}
    mysql_query("UPDATE member SET sex='$sex' WHERE ac='$ac'");
    mysql_query("UPDATE member SET birthday='$birthday' WHERE ac='$ac'");
	mysql_query("UPDATE member SET mail='$mail' WHERE ac='$ac'");
    mysql_query("UPDATE member SET telephone='$tel' WHERE ac='$ac'");
    mysql_query("UPDATE member SET addr='$addr' WHERE ac='$ac'");	*/
    
	if (isset($_POST["state"]))
		$state = $_POST["state"];
	else 
		$state = 1;
	
	if ($_POST["mail"]=="")
		$_POST["mail"] = NULL;
	if ($_POST["addr"]=="")
		$_POST["addr"] = NULL;
	if ($_POST["telephone"]=="")
		$_POST["telephone"] = NULL;
	
	$sql = "UPDATE member SET "
	."name='".$_POST["name"]."',"
	."sex='".$_POST["sex"]."',"
	."birthday='".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',"
	."mail='".$_POST["mail"]."',"
	."telephone='".$_POST["telephone"]."',"
	."addr='".$_POST["addr"]."', "
	."state='".$state."' "
	."WHERE ac='".$ac."'";
	
	if ($conn->query($sql))
	{		header ("Location: member_info.php?change_info=true");	}
	else
	{		header ("Location: member_info.php?change_info=false");	}
?>
