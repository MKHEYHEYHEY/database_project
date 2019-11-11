
<?php
	header("Content-Type: text/html; charset=UTF-8");
	
	session_start();							//用來暫存用戶的資料
	
	require_once ('connMysql.php');
	
	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了
	
	$sql = "SELECT ac,pw,name FROM member WHERE ac='".$_SESSION["ac"]."'";	//透過seeion的資料到 mysql 的 member資料表中找出相關資料, 然而這只是一條指令
																	//甚麼是都沒做, 只是把一條字串放到 sql
	$result=$conn->query($sql);				//把指令送給 mysql, 它會跟據指令做事, 把找到的資料傳回到 $result
	
	$row=$result->fetch_array();
?>

<!DOCTYPE html>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>修改密碼</title>
		<script langauge="javescript">
			function check_form()
			{
				var pw0 = document.form1.pw0.value;
				var pw1 = document.form1.pw1.value;
				var pw2 = document.form1.pw2.value;
				if (pw0 == "" || pw1=="" || pw2=="")
				{	alert("密碼不可以空白");	return false;	}
				for (var i=0; i<pw0.length; i++)						//檢查密碼中有沒有空白或引號等不合格字符
				{
					if (pw0.charAt(i)==" " || pw0.charAt(i)=="\"")
					{
						alert("密碼不可以含有空白或雙引號\n");
						return false;
					}
				}
				for (var i=0; i<pw1.length; i++)						//檢查密碼中有沒有空白或引號等不合格字符
				{
					if (pw1.charAt(i)==" " || pw1.charAt(i)=="\"")
					{
						alert("密碼不可以含有空白或雙引號\n");
						return false;
					}
				}
				if (pw1.length<1 || pw1.length>20)
				{	alert("密碼長度必定是大於 5 個字元或小於 20 個字元");	return false;	}
				if (pw1 != pw2)
				{	alert("輸入的密碼不一致\n");	return false;	}
			
				return true;
			}
		</script>
	</head>
	
	<body>
		<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
			<tr valign = "top">
				<td width = "600">
					<form action = "member_change_password.php" method="post" name="form1" onSubmit = "return check_form();" >
						<p>
							<font size = "6" color="#FF0000"> 修改密碼 </font>
						</p>
						<hr size="1">
							<p>
								<strong>帳    號</strong> : <?php echo $row["ac"]; ?>
							</p>
							<p>
								<strong>名    稱</strong> : <?php echo $row["name"]; ?>
							</p>
							<p>
								<strong>現時密碼</strong>
								<input type="password" name="pw0" >
								<?php 
									if (isset($_GET["pw0_fail"])) 
									{ 
										echo	"<font size = \"4\" color=\"#FF0000\">密碼錯誤,無法修改現時密碼</font>";
									} 
								?>	
								<br>
							</p>
							<p>
								<strong>更改密碼</strong>
								<input type="password" name="pw1" ><br>
							</p>
							<p>
								<strong>確認密碼</strong>
								<input type="password" name="pw2"><br>
							</p>
						</hr>
						<p align="center">
								<input type="submit" name="change" value="修改密碼">
								<input type="reset" name="reset" value="清空欄位">
						</p>
						
					</form>
				</td>
			</tr>
		</table>
	</body>

</html>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			