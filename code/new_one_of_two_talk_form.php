<!doctype html>

<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>導師對二一學生關懷追蹤表</title>

	</head>

	<body>
	<form action="new_general_talk.php" method="POST" target="_blank" align="center">
		<table width="800" align="center" cellspacing="2" cellpadding = "5" bgcolor="#DDDDDD">
			<tr>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_id" colspan="1">導師編號 : </label>
					<input  type="text" name="techer_id" id="techer_id" size="10" value="">
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="grade" colspan="1">導師姓名 : </label>
				<input type="text" name="teacher_name" id="teacher_name" size="10" value="">
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_id" colspan="1">聯絡分機 : </label>
					<input  type="text" name="telephone" id="telephone" size="10" value="">
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_id" colspan="1">學生學號 : </label>
					<input  type="text" name="student_id" id="student_id" size="10" value="">
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_name" colspan="1">學生姓名 : </label>
					<input type="text" name="student_name" id="student_name" size="10" value="">
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="grade" colspan="1">學生系級 : </label>
				<input type="text" name="grade" id="grade" size="10" value="">
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3" > 談話日期 : 
				<input type="text" name="year" id="year" size="2"> <label for="year">年</label>
				<input type="text" name="month" id="month" size="1"> <label for="month">月</label>
				<input type="text" name="day" id="day" size="1"> <label for="day">日</label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 導師所瞭學生二一原因(可以複選) :</br>
					<input type="checkbox" name="problem" id="a" value="1">
					<label for="a">興趣性格不合 </label></br>
					<input type="checkbox" name="problem" id="b" value="2">
					<label for="b">學習效能問題 </label></br>
					<input type="checkbox" name="problem" id="c" value="3">
					<label for="c">感情困擾 </label></br>
					<input type="checkbox" name="problem" id="d" value="4">
					<label for="d">壓力適應問題 </label></br>
					<input type="checkbox" name="problem" id="e" value="5">
					<label for="e">未用功 </label></br>
					&emsp;&emsp;<input type="checkbox" name="problem" id="a1" value="6">
					<label for="a1">感情困擾 </label></br>						<!-- 這邊用javescript來控制 -->
					&emsp;&emsp;<input type="checkbox" name="problem" id="b1" value="7">
					<label for="b1">壓力適應問題 </label></br>
					&emsp;&emsp;<input type="checkbox" name="problem" id="c1" value="8">
					<label for="c1">時間管理問題及其它問題 </label></br>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 是否需轉介至咨商中心由咨商師進一步評估或咨商

					<input type="radio" name="need_to_transfer" id="need_to_transfer" value="1">
					<label for="need_to_transfer">需轉介 </label>
					<input type="radio" name="need_to_transfer" id="noneed_to_transfer" value="2">
					<label for="noneed_to_transfer">不需轉介 </label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 學生是否有意願前來

					<input type="radio" name="go" id="go" value="1">
					<label for="go">有 </label>
					<input type="radio" name="go" id="not_go" value="2">
					<label for="not_go">沒有 </label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 導師能否運用影嚮力引導學生前來第一次與咨商師會談

					<input type="radio" name="can" id="can" value="1">
					<label for="can">能 </label>
					<input type="radio" name="can" id="cannot" value="2">
					<label for="cannot">不能 </label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 預約咨商面談時間 :</br>
					第一個時段 : 
					<input type="text" name="y1" id="y1" size="2"> <label for="y1">年</label>
					<input type="text" name="m1" id="m1" size="1"> <label for="m1">月</label>
					<input type="text" name="d1" id="d1" size="1"> <label for="d1">日</label>
					<select name="h1" id="h1">
					<option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option>
					<option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
					</select>
					<label for="h1"> 時</label>
					<select id="s1">
					<option value="00">00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
					</select>
					<label for="s1"> 分</label></br>
					第一個時段 : 
					<input type="text" name="y2" id="y2" size="2"> <label for="y2">年</label>
					<input type="text" name="m2" id="m2" size="1"> <label for="m2">月</label>
					<input type="text" name="d2" id="d2" size="1"> <label for="d2">日</label>
					<select name="h2" id="h2">
					<option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option>
					<option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
					</select>
					<label for="h2"> 時</label>
					<select id="s2">
					<option value="00">00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
					</select>
					<label for="s2"> 分</label>
				</th>
			</tr>
			
			<input value="<?php echo $_GET['teacher_ac']?>" name="teacher_ac" type="hidden">
			<input value="<?php echo $_GET['sem']?>" name="semester" type="hidden">
			<input value="<?php echo $_GET['class_year']?>" name="class_year" type="hidden">
			<input value="<?php echo $_GET['type']?>" name="type" type="hidden">
			
		</table>
		
		<br />
		<input type="submit" value="新增記錄">
		<input type="reset" value="重新設定">
	</form>

	
	
</html>