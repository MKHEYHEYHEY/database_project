<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>login test</title>
	<?php 
		if (isset($_GET["loginfail"])) 
		{ 
			echo	"<script language=\"javascript\">";
			echo	"	alert(\"登入失敗,請重新登入\");";
			echo	"</script>";
		} 
		if ( isset($_COOKIE['ac']))
		{	$c_ac=$_COOKIE['ac'];	}
		else
		{	$c_ac="";	}
		if ( isset($_COOKIE['pw']))
		{	$c_pw=$_COOKIE['pw'];	}
		else
		{	$c_pw="";	}
	?>
</head>

<body>
	<form name="form1" method="post" action="login.php">
		<table width="250" border="1" align="center">
			<tr valign="top"><td align="center">
			<p> 會員管理系統 </p>
			<p>帳號 : <br>
				<input name="ac" type="text" value="<?php echo $c_ac; ?>">
			</p>
			<p>密碼 : <br>
				<input name="pw" type="password" value="<?php echo $c_pw; ?>">
			</p>
			<p>
				<input name="rememberme" type="checkbox" value="true" checked>記住我的帳號密碼
			</p>
			<p align="center">
				<input type="submit" name="login" value="登入">
			</p>
			<!-- --------------------------------------------------新增帳號------------------------------------------------- -->
			
			</td></tr>
		</table>
	</form>
</body>

</html>