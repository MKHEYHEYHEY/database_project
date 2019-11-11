<?php 
	session_start();						//用 session 函式, 看用戶是否已經登錄了

	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫

	require_once("login_check.php");
	
	
	if ($_GET['ask_ac'] != "")
	{
		$sql = "select m.ac, m.name, m.access, m.state
		from member as m
		where m.ac = '".$_GET['ask_ac']."'".
		" ORDER BY m.ac DESC"; 
	}
	else 
	{
		$sql = "select m.ac, m.name, m.access, m.state
		from member as m
		where m.name = '".$_GET['ask_name']."'".
		" ORDER BY m.ac DESC"; 
	}
	
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
	   搜索結果
    </p>
    <table width="600" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td>
        <table>
          <tr>
			<th width="200">用戶編號/名字</th>
            <th width="200">用戶身份</th>
            <th width="200">編輯用戶</th>
          </tr>
        <?php
            $num_rows = $result->num_rows;	
			if ($num_rows==0)
			{
				echo "<tr>查無此人</tr>";
			}	
            for($i=1;$i<=$num_rows;$i++)
            {
                $row=$result->fetch_array();				//rs 在這裏, fetch_assoc 的 index 只能用字串, 而 fetch_array 能用數字和字串作 index
        ?>
          <tr>
            <th><?php printf ("%s    %s" ,$row['ac'], $row['name']); ?></th>
			<th>
				<?php 
				
				if ($row['access']=="teacher")
					echo "教師";
				else
					echo "學生";

				?>
			</th>
			<th>
				<?php 
				if ($row['state'] == 1 || $row['state'] == 0)
				{ 
				echo	"<a href=\"del_member.php?ac=";
				echo 	"{$row['ac']}\">刪除資料</a>";
				echo	"or";
				echo	"<a href=\"member_update_form.php?query=";
				echo 	"{$row['ac']}&ask_ac={$_GET['ask_ac']}&ask_name = ";
				echo 	"{$_GET['ask_name']}\">更改資料</a>";
				}
				else
				{
					if ($row['access']=="teacher")
						echo "此人已離職";
					else
						echo "此人已畢業";
				}
				?>
			</th>
          </tr>
        <?php
            }
        ?>
        </table>
      </td>
    </table>
</body>

</html>