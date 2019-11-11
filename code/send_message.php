<?php
    session_start();
	
	require_once ('connMysql.php');
	
    $ac = $_SESSION['ac'];
	
    $subject = $_POST['subject'];
	
    $content = $_POST['content'];
	
    $time = date("Y/m/d H:i:s",time()+25200);
	
    $reply_to = $_GET['reply_to'];
    
    if(isset($ac))
    {
        if(!empty($reply_to))
        {
            $sql = "INSERT INTO message_board value('','$ac','$time','$subject','$content','$reply_to')";
			
            if	($conn->query($sql))
				echo "<script> alert('回覆成功');window.location='message_board.php'</script>";
			else
				echo "<script> alert('回覆失敗');window.location='message_board.php'</script>";
        }
        else
        {
            $sql = "INSERT INTO message_board value('','$ac','$time','$subject','$content',NULL)";
            if	($conn->query($sql))
				echo "<script> alert('發文成功');window.location='message_board.php'</script>";
			else
				echo "<script> alert('發文失敗');window.location='message_board.php'</script>";
        }
    }
    mysql_close($link);
?>