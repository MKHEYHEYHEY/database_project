<?php

	header("Content-Type: text/html; charset=UTF-8");
	
	require_once ('connMysql.php');			//引用connMysql.php 來連接資料庫
	
			
		if ($_POST["grade"]=="")
			$_POST["grade"] = NULL;
		if ($_POST["user_id"]=="")
			$_POST["user_id"] = NULL;
		if ($_POST["user_name"]=="")
			$_POST["user_name"] = NULL;
		if ($_POST["telephone"]=="")
			$_POST["telephone"] = NULL;
		
		if ($_POST["relationtext2"]=="")
			$_POST["relationtext2"] = NULL;
		if ($_POST["studytext2"]=="")
			$_POST["studytext2"] = NULL;
		if ($_POST["commont6"]=="")
			$_POST["commont6"] = NULL;
		if ($_POST["need_to_transfer"]== 2)
			$_POST["transfer"] = 0;
		if ($_POST["feeback"]== 2)
			$_POST["transfer2"] = 0;
		
		$sql = "INSERT INTO general	(grade,user_id,user_name,telephone,addr,talkdate,talk_times,level,commont,life_schedule,commont2,family,commont3,social,
										commont4,commont5,special_family,study,life,relation,relationtext,relation2,relationtext2,study2,studytext2,commont6,need_to_transfer
										,transfer,feeback,transfer2)VALUES
			 ('".$_POST["grade"]."','".$_POST["user_id"]."','".$_POST["user_name"]."','".$_POST["telephone"]."','"
				.$_POST["addr"]."' ,'".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."','".$_POST["talk_times"]."'
				,'".$_POST["level"]."','".$_POST["commont"]."','".$_POST["life_schedule"]."','"
				.$_POST["commont2"]."','".$_POST["family"]."','".$_POST["commont3"]."','".$_POST["social"]."','".$_POST["commont4"]."','".$_POST["commont5"]."'
				,'".$_POST["special_family"]."','".$_POST["study"]."','".$_POST["life"]."','".$_POST["relation"]."','".$_POST["relationtext"]."','".$_POST["relation2"]."',
				'".$_POST["relationtext2"]."','".$_POST["study2"]."','".$_POST["studytext2"]."','".$_POST["commont6"]."','".$_POST["need_to_transfer"]."','".$_POST["transfer"]."',
				'".$_POST["feeback"]."','".$_POST["transfer2"]."')";
				
		$result=$conn->query($sql);
		
		$sql = "select g.talk_id
				from general as g
				where g.user_id = '".$_POST['user_id'].
			   "' and g.talkdate = '".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"].
				"' ";
		echo $sql;
		$result=$conn->query($sql);
		$row=$result->fetch_array();
		
		$sql = "INSERT INTO talking_record (class_year, this_year, semester, teacher_ac, student_ac, type, talk_id)VALUES
				('".$_POST["class_year"]."','".$_POST["year"]."','".$_POST["semester"]."','".
					$_POST["teacher_ac"]."','".$_POST["user_id"]."','".$_POST["type"]."','".$row['talk_id']."')";
				
		$result=$conn->query($sql);
	
?>
