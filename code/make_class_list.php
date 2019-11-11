<?php

	header("Content-Type: text/html; charset=UTF-8");
	
	require_once ('connMysql.php');			//引用connMysql.php 來連接資料庫
	
			//從member 資料表中選取 ac 欄位, 並找出 ac=$_POST["ac"] 的資料


	$empty = $post = array();
	
	foreach ($_POST as $varname => $varvalue)
	{
		if (empty($varvalue)) {
			return ;
		} else {
			$post[$varname] = $varvalue;
			$sql = "insert INTO class_list (class_year, this_year, semester, teacher_ac, student_ac) 
											VALUES ('".$_POST['class_year']."','"
													  .$_POST['this_year']."','"
													  .$_POST['semester']."','"
													  .$_POST['teacher_ac']."','"
													  .$varvalue."')";
			if($result = $conn->query($sql))
			{	echo "ok";	}
			else
			{	echo "fuck";	
				echo $_POST['class_year'];
				echo $_POST['this_year'];
				echo $_POST['semester'];
				echo $_POST['teacher_ac'];
				echo $varvalue;
				echo "\n";
				echo $sql;
			}
		}
	}
	
	$sql = "delete from class_list
			where student_ac not in
				(
					select ac as student_ac
					from member
				)
			";
	$conn->query($sql);
/*	foreach ($_POST as $varname => $varvalue) {
		if (empty($varvalue)) {
			$empty[$varname] = $varvalue;
		} else {
			$post[$varname] = $varvalue;
			$sql = "INTO class_list VALUES ac FROM member WHERE ac='".$varvalue."'";
		}
*/
?>