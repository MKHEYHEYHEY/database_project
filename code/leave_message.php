<?php 
    session_start();
	
	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
	require_once("login_check.php");
	
	$ac = $_SESSION['ac'];
?>
<!DOCTYPE html>
<html>

<head>
<link href="style_test.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>發表主題</title>
	
</head>

<body>
    <div align="center">
    <form name="leave_message" method="post" action="send_message.php">
		<table align="center">
			<tr valign="top">
                <td align="center">
			
			<p>帳號&nbsp;:&nbsp;<?php echo $ac;?>
			</p>
			<p>標題&nbsp;:&nbsp;<input name="subject" type="text" value="" class="input">
			</p>
			<p>內容&nbsp;:&nbsp;<br>
            <textarea name="content" rows="10" cols="60" size="57" value="" class="input"></textarea>
			</p>
			<p>
				<input type="submit" name="send" value="發文" class="Button">
			</p>
                </td>
            </tr>
		</table>
	</form>
    </div>
</body>

</html>