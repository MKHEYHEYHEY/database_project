<?php
	session_start();							//用來暫存用戶的資料

	require_once ('connMysql.php');

	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了

	$ac=$_SESSION['ac'];	
	
    $sql = "SELECT * FROM general as g
			where g.talk_id = '".$_GET['id']."'";
	echo $sql;
	$result=$conn->query($sql);

	$row=$result->fetch_array();

?>

<!doctype html>

<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link href="style_test.css" rel="stylesheet">
		<title>導生一般會談記錄表</title>

	</head>

	<body>
		<table width="800" align="center" cellspacing="2" cellpadding = "5" bgcolor="#DDDDDD">
			<tr>
				<th bgcolor="#F2F2F2" align="left" ><label for="grade" colspan="1">學生系級 : </label>
				<?php echo $row['grade']; ?>
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_id" colspan="1">學號 : </label>
					<input  type="text" name="user_id" id="user_id" size="10" value="">
				</th>
				<th bgcolor="#F2F2F2" align="center" ><label for="user_name" colspan="1">姓名 : </label>
					<input type="text" name="user_name" id="user_name" size="10" value="">
				</th>
			</tr>
			<tr>
				<th width="20%" bgcolor="#F9F9F9" align="left" colspan="1"> <label for="telephone">聯絡電話 : </label>
				<input type="text" name="telephone" id="telephone" size="12">
				</th>
				<th width="20%" bgcolor="#F9F9F9" align="left" colspan="2"> <label for="addr">住址 : </label>
				<input type="text" name="addr" id="addr" size="57"> 
				</th>
				
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3" > 談話日期 : 
				<input type="text" name="year" id="year" size="2"> <label for="year">年</label>
				<input type="text" name="month" id="month" size="1"> <label for="month">月</label>
				<input type="text" name="day" id="day" size="1"> <label for="day">日</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="talk_times">第&nbsp;</label> 
					<input type="text" name="talk_times" id="talk_times" size="1"> 
				<label for="talk_times">&nbsp;次 </label>
				</th>
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 一. 學生一般狀況 :
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="center" rowspan="2"> 1. 學業 :</th>
				<th bgcolor="#F9F9F9" align="center" colspan="2"> 
				
					<label for="very_good">很好 </label>
					<input type="radio" name="level" id="very_good" value="1">
					<label for="good">好 </label>
					<input type="radio" name="level" id="good" value="2">
					<label for="normal">普通 </label>
					<input type="radio" name="level" id="normal" value="3">
					<label for="other">再加努力 </label>
					<input type="radio" name="level" id="other" value="4">
				</th>
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<label for="comment">補 充 :</br></label>
				<textarea name="commont" id="commont" rows="5" cols="60" size="57"></textarea>
			</tr>
			
			
			<tr>
				<th bgcolor="#F9F9F9" align="center" rowspan="2"> 2. 生活作息 :</th>
				<th bgcolor="#F9F9F9" align="center" colspan="2"> 
				
					<label for="very_good">很好 </label>
					<input type="radio" name="life_schedule" id="very_good" value="1">
					<label for="good">好 </label>
					<input type="radio" name="life_schedule" id="good" value="2">
					<label for="normal">普通 </label>
					<input type="radio" name="life_schedule" id="normal" value="3">
					<label for="other">再調整 </label>
					<input type="radio" name="life_schedule" id="other" value="4">
				</th>
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<label for="comment2">補 充 :</br></label>
				<textarea name="commont2" id="commont2" rows="5" cols="60" size="57"></textarea>
			</tr>
			
			
			<tr>
				<th bgcolor="#F9F9F9" align="center" rowspan="2"> 3. 家庭關系 :</th>
				<th bgcolor="#F9F9F9" align="center" colspan="2"> 
				
					<label for="very_good">很好 </label>
					<input type="radio" name="family" id="very_good" value="1">
					<label for="good">好 </label>
					<input type="radio" name="family" id="good" value="2">
					<label for="normal">普通 </label>
					<input type="radio" name="family" id="normal" value="3">
					<label for="other">需改善 </label>
					<input type="radio" name="family" id="other" value="4">
				</th>
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<label for="comment3">補 充 :</br></label>
				<textarea name="commont3" id="commont3" rows="5" cols="60" size="57"></textarea>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="center" rowspan="2"> 4. 人際關系 :</th>
				<th bgcolor="#F9F9F9" align="center" colspan="2"> 
				
					<label for="very_good">很好 </label>
					<input type="radio" name="social" id="very_good" value="1">
					<label for="good">好 </label>
					<input type="radio" name="social" id="good" value="2">
					<label for="normal">普通 </label>
					<input type="radio" name="social" id="normal" value="3">
					<label for="other">需調整 </label>
					<input type="radio" name="social" id="other" value="4">
				</th>
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<label for="comment4">補 充 :</br></label>
				<textarea name="commont4" id="commont4" rows="5" cols="60" size="57"></textarea>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="center" colspan="1"> 5. 個人特色 :</th>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<textarea name="commont5" id="commont5" rows="5" cols="60" size="57"></textarea>
			</tr>
			
			<!--														第二頁														-->
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 一. 學生特殊狀況 :
			</tr>
			<tr>
				<th bgcolor="#F9F9F9" align="left" >家庭關系 :</br>
					<input type="radio" name="special_family" id="normal" value="1">
					<label for="normal">無特殊狀況 </label></br>
					<input type="radio" name="special_family" id="no_good" value="2">
					<label for="no_good">與父母溝通不良 </label></br>
					<input type="radio" name="special_family" id="bad" value="3">
					<label for="bad">與父母不合 </label></br>
					<input type="radio" name="special_family" id="violence" value="4">
					<label for="violence">家庭暴力 </label></br>
					<input type="radio" name="special_family" id="sexual_abuse" value="5">
					<label for="sexual_abuse">家庭性侵害 </label></br>
					<input type="radio" name="special_family" id="poor" value="6">
					<label for="poor">家庭經濟果難 </label></br>
					<input type="radio" name="special_family" id="change" value="7">
					<label for="change">家庭變固 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="special_family" id="another" rows="2" cols="20" size="15"></textarea>
				</th>
			
				<th bgcolor="#F9F9F9" align="left" >課業與學習 :</br>
					<input type="radio" name="study" id="normal" value="1">
					<label for="normal">無特殊狀況 </label></br>
					<input type="radio" name="study" id="no_funny" value="2">
					<label for="no_funny">科系志趣不合 </label></br>
					<input type="radio" name="study" id="hard" value="3">
					<label for="hard">學習果難 </label></br>
					<input type="radio" name="study" id="pressure" value="4">
					<label for="pressure">課業生活壓力 </label></br>
					<input type="radio" name="study" id="transfer" value="5">
					<label for="transfer">考慮休學/轉學 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="study" id="another" rows="5" cols="20" size="15"></textarea>
				</th>
				
				<th bgcolor="#F9F9F9" align="left">生活與生涯 :</br>
					<input type="radio" name="life" id="a" value="1">
					<label for="a">無特殊狀況 </label></br>
					<input type="radio" name="life" id="b" value="2">
					<label for="b">社團娛樂困擾 </label></br>
					<input type="radio" name="life" id="c" value="3">
					<label for="c">休閒娛樂果擾 </label></br>
					<input type="radio" name="life" id="d" value="4">
					<label for="d">人生意義疑惑 </label></br>
					<input type="radio" name="life" id="e" value="5">
					<label for="e">生涯規劃問題 </label></br>
					<input type="radio" name="life" id="f" value="6">
					<label for="f">生活作息問題 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="life" id="another" rows="4" cols="20" size="15"></textarea>
				</th>
			</tr>
			<!--												第二欄											-->
			<tr>
				<th bgcolor="#F9F9F9" align="left">兩性關系 :</br>
					<input type="radio" name="relation" id="a" value="1">
					<label for="a">無特殊狀況 </label></br>
					<input type="radio" name="relation" id="b" value="2">
					<label for="b">異性溝通不良 </label></br>
					<input type="radio" name="relation" id="c" value="3">
					<label for="c">與異性起衝突 </label></br>
					<input type="radio" name="relation" id="d" value="4">
					<label for="d">感情不順 </label></br>
					<input type="radio" name="relation" id="e" value="5">
					<label for="e">與異性分手果擾 </label></br>
					<input type="radio" name="relation" id="f" value="6">
					<label for="f">同性溝通問題 </label></br>
					<input type="radio" name="relation" id="g" value="7">
					<label for="g">同性戀傾向 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="relationtext" id="another" rows="2" cols="20" size="15"></textarea>
				</th>
				
				
				<th bgcolor="#F9F9F9" align="left">兩性關系 :</br>
					<input type="radio" name="relation2" id="a" value="1">
					<label for="a">無特殊狀況 </label></br>
					<input type="radio" name="relation2" id="b" value="2">
					<label for="b">與人疏離 </label></br>
					<input type="radio" name="relation2" id="c" value="3">
					<label for="c">與人溝通不良 </label></br>
					<input type="radio" name="relation2" id="d" value="4">
					<label for="d">易與人起衡突 </label></br>
					<input type="radio" name="relation2" id="e" value="5">
					<label for="e">分離失落感 </label></br>
					<input type="radio" name="relation2" id="f" value="6">
					<label for="f">其他 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="relationtext2" id="another" rows="3" cols="20" size="15"></textarea>
				</th>
				
				<th bgcolor="#F9F9F9" align="left">身心狀況 :</br>
					<input type="radio" name="study2" id="a" value="1">
					<label for="a">無特殊狀況 </label></br>
					<input type="radio" name="study2" id="b" value="2">
					<label for="b">憂鬱傾向 </label></br>
					<input type="radio" name="study2" id="c" value="3">
					<label for="c">焦慮傾向 </label></br>
					<input type="radio" name="study2" id="d" value="4">
					<label for="d">生理問題 </label></br>
					<label for="another" style="display:block">補充 : </label>
					<textarea name="studytext2" id="another" rows="5" cols="20" size="15"></textarea>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="1"> 導師補充意見 :</th>
				<th bgcolor="#F9F9F9" align="left" colspan="2">
				<textarea name="commont6" id="commont6" rows="3" cols="60" size="57"></textarea>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 是否需轉介學生輔導相關單位 :

					<input type="radio" name="need_to_transfer" id="need_to_transfer" value="1">
					<label for="need_to_transfer">需轉介 </label>
					<input type="radio" name="need_to_transfer" id="noneed_to_transfer" value="2">
					<label for="need_to_transfer">不需轉介 </label>
					
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 轉介單位 :	

					<input type="radio" name="transfer" id="a" value="1">
					<label for="a">學生咨商中心 </label>
					<input type="radio" name="transfer" id="b" value="2">
					<label for="b">生活輔導組 </label>
					<input type="radio" name="transfer" id="c" value="3">
					<label for="c">僑外組 </label>
					<input type="radio" name="transfer" id="d" value="4">
					<label for="d">課外組 </label>
					<input type="radio" name="transfer" id="e" value="5">
					<label for="e">衛保組 </label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 是否需建議學校相關單位於法規措施或設施作調整 :	

					<input type="radio" name="feeback" id="feeback" value="1">
					<label for="feeback">需要 </label>
					<input type="radio" name="feeback" id="nofeeback" value="2">
					<label for="feeback">不需要 </label>
				</th>
			</tr>
			
			<tr>
				<th bgcolor="#F9F9F9" align="left" colspan="3"> 需建議單位 :	

					<input type="radio" name="transfer2" id="a" value="1">
					<label for="a">教務處 </label>
					<input type="radio" name="transfer2" id="b" value="2">
					<label for="b">總務處 </label>
					<input type="radio" name="transfer2" id="c" value="3">
					<label for="c">學務處 </label>
					<input type="radio" name="transfer2" id="d" value="4">
					<label for="d">圖資管 </label>
					<input type="radio" name="transfer2" id="e" value="5">
					<label for="e">秘書室 </label>
				</th>
			</tr>
			
		</table>
		<br />

	</body>

</html>