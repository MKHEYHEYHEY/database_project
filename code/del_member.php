<?php
	session_start();
	
	require_once ('connMysql.php');
	
	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了
	
	//require_once("login_check.php");
    $ac = $_SESSION["ac"];
	$access = $_SESSION['access'];
	
	$sql = "delete
		from member
		where ac = '".$_GET['ac']."'";
	if ($conn->query($sql))
	{		header ("Location: find_member_info_form.php");	}
	else
	{		header ("Location: find_member_info_form.php");	}

//header ("Location: get_member_list.php?asl_ac=$_GET['ask_ac']&ask_name=$_GET['ask_name']");
?>

<html>
<head>
</head>
<body>
<?php
	echo $sql;
?>
</body>


</html>
