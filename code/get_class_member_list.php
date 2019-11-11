<?php 
	session_start();						//用 session 函式, 看用戶是否已經登錄了

	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫

	require_once("login_check.php");
	
	if ($_GET['id'] != "")
	{
		$sql = "select m.ac, m.name, m.access
		from class_list as cl, member as m
		where m.ac = cl.student_ac 
		and cl.class_year = '".$_GET['id']."'"
		." and cl.this_year = '".$_GET['now']."'".
		"group by m.ac
		ORDER BY m.ac DESC"; 
	}
	
	$result=$conn->query($sql);
?>

<!DOCTYPE html>

<table width="600" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td>
        <table>
          <tr>
			<th width="200">編號</th>
			<th width="200">名字</th>
            <th width="200">身份</th>
          </tr>
        <?php
            $num_rows = $result->num_rows;	
			if ($num_rows==0)
			{
				echo "<tr>列表沒有成員</tr>";
			}	
            for($i=1;$i<=$num_rows;$i++)
            {
                $row=$result->fetch_array();				//rs 在這裏, fetch_assoc 的 index 只能用字串, 而 fetch_array 能用數字和字串作 index
        ?>
          <tr>
            <th><?php printf ("%s" ,$row['ac']); ?></th>
			<th><?php printf ("%s" ,$row['name']); ?></th>
			<th>
				<?php 
				
				if ($row['access']=="teacher")
					echo "教師";
				else 
					echo "學生";
				?>
			</th>
			
			
		<?php
            }
        ?>
        </table>
      </td>
</table>