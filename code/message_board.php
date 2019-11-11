<?php 
		session_start();						//用 session 函式, 看用戶是否已經登錄了
	
		require_once("connMysql.php");			//引用connMysql.php 來連接資料庫
	
		require_once("login_check.php");
		
    //    $sql = "SELECT id, ac, time, subject FROM message_board WHERE (reply_to IS NULL) ORDER BY time DESC";
		
		$sql = "select m.name, p.id, p.ac, p.time, p.subject
		from member as m,
			(SELECT id, ac, time, subject FROM message_board WHERE (reply_to IS NULL) ) p
		where m.ac = p.ac
		ORDER BY time DESC"; 
	//	$sql = "SELECT id, ac, time, subject FROM message_board, member where member.ac = message_board";
		
		$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
<link href="style_test.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>留言板</title>
	
</head>

<body>
    <p align="center">
	   <a href="leave_message.php" class="Button">發表主題</a>
    </p>
    <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
      <td>
        <table>
          <tr>
			<th width="400">發言人</th>
            <th width="400">標題</th>
            <th width="300">發文時間</th>
          </tr>
        <?php
            $num_rows = $result->num_rows;	
            for($i=1;$i<=$num_rows;$i++)
            {
                $row=$result->fetch_array();				//rs 在這裏, fetch_assoc 的 index 只能用字串, 而 fetch_array 能用數字和字串作 index
        ?>
          <tr>
			<th><?php echo $row['name']?></th>
            <th><a href="message_content.php?id=<?php echo $row['id']?>"><?php echo $row['subject']?></a></th>
            <th><?php echo $row['time']?></th>
          </tr>
        <?php
            }
        ?>
        </table>
      </td>
    </table>
</body>

</html>