<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>新增帳號</title>
	<script langauge="javescript">
		function check_form()
		{
			var acct = document.form1.ac.value;
			if (acct=="")								//檢查到沒有填寫帳號
			{	alert("請填寫帳號");	return false;	}
			if (acct.length != 8)
			{	alert("帳號長度必定是 8 個字元");	return false;	}
			var pw1 = document.form1.pw1.value;
			var pw2 = document.form1.pw2.value;
			if (pw1=="")
			{	alert("密碼不可以空白");	return false;	}
			for (var i=0; i<pw1.length; i++)						//檢查密碼中有沒有空白或引號等不合格字符
			{
				if (pw1.charAt(i)==" " || pw1.charAt(i)=="\"")
				{
					alert("密碼不可以含有空白或雙引號\n");
					return false;
				}
			}
			if (pw1.length<5 || pw1.length>20)
			{	alert("密碼長度必定是大於 5 個字元或小於 20 個字元");	return false;	}
			if (pw1 != pw2)
			{	alert("輸入的密碼不一致\n");	return false;	}
			if (document.form1.name.value=="")
			{	alert("請填寫姓名");	return false;	}
			return confirm ("確定送出?");
		}
	</script>
	
</head>

<body>
	<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
		<tr valign="top">
			<td width="600">
				<form name="form1" method="post" action="member_join.php" onSubmit="return check_form();">
					<p>
						<font size="6" color="#FF0000">新增帳號</font>
					</p>
					<?php 
						if(isset($_GET["registered"])) 
						{
							echo "帳號";
							echo $_GET["ac"];
							echo "已經有人在使用了";
						}
					?>
					<div>
						<hr size="1" />
						<p>
							<font color="#FF0000">* </font>
							<strong>帳    號</strong> :
							<input type="text" name="ac">
						</p>
						<p>
							<font color="#FF0000">* </font>
							<strong>密    碼</strong>
							<input type="text" name="pw1">
						</p>
						<p>
							<font color="#FF0000">* </font>
							<strong>確認密碼</strong> :
							<input type="text" name="pw2">
						</p>
						<p>
							<font color="#FF0000">* </font>
							<strong>姓    名</strong> :
							<input type="text" name="name">
						</p>
						<p>
							<font color="#FF0000">* </font>
							<strong>性    別</strong>
							<input type="radio" name="sex" value="m" checked>男
							<input type="radio" name="sex" value="f" checked>女
							
						</p>
						
						<p>
							<strong>生    日</strong>			<!-- 這部份可以用 javascript 或 php 的回圈來作, 不需要把1900到2016所有年份列出來 -->
							<select name="year" size="1" onchange="changeDate()">
                            <script language="javascript">  
                                for(i=1900;i<2016;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>年
                            <select name="month" onchange="changeDate()">
							<script language="javascript">
                                for(i=1;i<=12;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>月
                            <select name="day" onchange="changeDate()">
                            <script language="javascript">
                                for(i=1;i<=31;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>日
							<script language="javascript">
                            function changeDate()
                            {
                                var UserIndex = document.update.day.selectedIndex+1;
                                var TempDate = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
                                if ((document.update.year.selectedIndex % 4 == 0 && document.update.year.selectedIndex % 100 != 0) || document.update.year.selectedIndex % 400 == 0)
                                {TempDate[1]++;}
                                if(document.update.day.options.length!=TempDate[document.update.month.selectedIndex])
                                {
                                    var TempStr = '<select size="1" name="day">';
                                    for(i=1;i<=TempDate[document.update.month.selectedIndex];i++)
                                    {
                                        TempStr+='<option value="'+i+'"';
                                        if(i==UserIndex){TempStr+=' selected';}
                                        TempStr+='>'+i+'</option>';
                                    }
                                    document.update.day.outerHTML=TempStr+'</select>';
                                }
                            }
                            </script>
						</p>
						
						<p>
							<strong>電    話</strong>
							<input type="text" name="telephone">
						</p>
						
						<p>
							<strong>住    址</strong>
							<input type="text" name="addr" size="40">
						</p>
						
						<p>
							<strong> e-mail </strong>
							<input type="text" name="mail" size="40">
						</p>
						<p>
							<font color="#FF0000">* </font>
							<strong>身    份</strong>
							<input type="radio" name="access" value="teacher" checked>教  師
							<input type="radio" name="access" value="student" checked>學  生
							
						</p>
						<p>
							<strong>在校日期</strong>			<!-- 這部份可以用 javascript 或 php 的回圈來作, 不需要把1900到2016所有年份列出來 -->
							<select name="year1" size="1" onchange="changeDate()">
                            <script language="javascript">  
                                for(i=1900;i<2016;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>年
                            <select name="month1" onchange="changeDate()">
							<script language="javascript">
                                for(i=1;i<=12;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>月
                            <select name="day1" onchange="changeDate()">
                            <script language="javascript">
                                for(i=1;i<=31;i++)
                                {document.write('<option value="'+i+'">'+i+'</option>');}
                            </script>
                            </select>日
							<script language="javascript">
                            function changeDate()
                            {
                                var UserIndex = document.update.day.selectedIndex+1;
                                var TempDate = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
                                if ((document.update.year.selectedIndex % 4 == 0 && document.update.year.selectedIndex % 100 != 0) || document.update.year.selectedIndex % 400 == 0)
                                {TempDate[1]++;}
                                if(document.update.day.options.length!=TempDate[document.update.month.selectedIndex])
                                {
                                    var TempStr = '<select size="1" name="day">';
                                    for(i=1;i<=TempDate[document.update.month.selectedIndex];i++)
                                    {
                                        TempStr+='<option value="'+i+'"';
                                        if(i==UserIndex){TempStr+=' selected';}
                                        TempStr+='>'+i+'</option>';
                                    }
                                    document.update.day.outerHTML=TempStr+'</select>';
                                }
                            }
                            </script>
						</p>
						
						
						<p> 
							<font color="FF0000">* </font>表示為必填欄位
						</p>
					</div>
					
					<hr size="1" />
					<p align="center">
						<input type="submit" name="join" value="新增帳號">
						<input type="reset" name="reset" value="清空欄位">
					</p>
				</form>
			</td>
		</tr>
	</table>
</body>

</html>
							
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				