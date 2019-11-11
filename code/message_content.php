<?php 
		session_start();						//用 session 函式, 看用戶是否已經登錄了
	
		require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
		require_once("login_check.php");
		
        $id=$_GET['id'];
		
        $result=$conn->query("SELECT * FROM message_board WHERE id='$id'");
		
        $reply=$conn->query("SELECT * FROM message_board WHERE(reply_to='$id') ORDER BY time DESC");
		
        $main=$result->fetch_array();
		
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <link href="style_test.css" rel="stylesheet">
		<title>會員管理系統</title>

	</head>
	
	<body>
        <p align="center">
        <a href="reply_content.php?rid=<?php echo($id);?>&subject=<?php echo($main['subject']);?>" class="Button">回覆主題</a>
        </p>
		<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
			<tr valign="top">
				<td>
					<p><?php echo($main['subject']); ?></p>
					<p>發文人:<?php echo($main['ac']);?></p>
                    <p>發文時間:<?php echo($main['time']);?></p>
                    <p><?php echo($main['content']);?></p>
                    <hr>
                    <?php
                        $num_rows = $reply->num_rows;
                        if($num_rows==0)
                        {
                            echo "<p>目前沒有留言</p>";
                            exit();
                        }
                        for($i=1;$i<=$num_rows;$i++)
                        {   
							$rs=$reply->fetch_array();
                    ?>
                    <p>標題:<?php echo $rs['subject']?>
                    <p>回覆時間:<?php echo $rs['time']?></p>
                    <p><?php echo($rs['ac']);?>說:<br><?php echo($rs['content']);?></p>
                    <?php
                    }
                    ?>
			</tr>
		</table>
	</body>
</html>