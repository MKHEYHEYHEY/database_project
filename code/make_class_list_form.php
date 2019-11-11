<?php 
	session_start();						//用 session 函式, 看用戶是否已經登錄了

	require_once("connMysql.php");			//引用connMysql.php 來連接資料庫

	require_once("login_check.php");
	
	
	if ($_GET['id'] != "")
	{
		$sql = "select m.ac, m.name, m.access 
				from class_list as cl, member as m 
				where m.ac = cl.student_ac 
				and cl.class_year = '".$_GET['id']."'".
				" and cl.this_year = '".$_GET['now']."'".
				" and cl.semester = '".$_GET['semester']."'".
				" group by m.ac
				ORDER BY m.ac DESC"; 
/*
		$sql = "select m.ac, m.name, m.access
		from class_list as cl, member as m
		where m.ac = cl.student_ac 
		and cl.class_year = '".$_GET['id']."'".
		" and cl.this_year = '".$_GET['now']."'".
		" group by m.ac
		ORDER BY m.ac DESC"; 
*/	
	}

	$result=$conn->query($sql);
?>




<!doctype html>

<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>導生名單</title>

	</head>

	<body>
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
				echo "<tr>列表沒有成員</tr>";
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
				<a href="del_class_member.php?ac=<?php echo $row['ac']?>">刪除成員</a>
			</th>
          </tr>
        <?php
            }
        ?>
        </table>
      </td>
    </table>
	
	
	<form action="make_class_list.php" method="POST" target="_blank" align="center">
		<table width="600" align="center" cellspacing="2" cellpadding = "5" bgcolor="#DDDDDD">
			<tr>
				<th bgcolor="#F2F2F2" align="center" >新增成員到列表 :
				</th>
<!--				<th bgcolor="#F2F2F2" align="center" ><label for="user_name" colspan="2">老師姓名 : </label>
					<input type="text" name="user_name" id="user_name" size="10" value="">
				</th>		-->
			</tr>
			<tr>
				<th bgcolor="#F2F2F2" align="left" ><label for="teacher_ac" colspan="1">老師編號 : </label>
					<input  type="text" name="teacher_ac" id="teacher_ac" size="10" value="">
				</th>
<!--				<th bgcolor="#F2F2F2" align="center" ><label for="user_name" colspan="2">老師姓名 : </label>
					<input type="text" name="user_name" id="user_name" size="10" value="">
				</th>		-->
			</tr>
		<?php
			for($i=1;$i<=100;$i=$i+2)
			{
		?>
				<tr>
					<th bgcolor="#F2F2F2" align="left" ><label for="<?php echo $i; ?>" colspan="1">學生學號 : </label>
						<input  type="text" name="<?php echo $i; ?>" id="<?php echo $i; ?>" size="10" value="">
					</th>
<!--					<th bgcolor="#F2F2F2" align="center" ><label for="<?php echo $i+1; ?>" colspan="1">學生姓名 : </label>
						<input type="text" name="<?php echo $i+1; ?>" id="<?php echo $i+1; ?>" size="10" value="">
					</th>	-->
				</tr>
		<?php
			}
		?>
			<input value="<?php echo $_GET['now']?>" name="this_year" type="hidden">
			<input value="<?php echo $_GET['id']?>" name="class_year" type="hidden">
			<input value="<?php echo $_GET['semester']?>" name="semester" type="hidden">
		</table>
		<br />
		<input type="submit" value="新增成員">
		<input type="reset" value="重新設定">
	</form>
	</body>

</html>			
			
			
			
			
			