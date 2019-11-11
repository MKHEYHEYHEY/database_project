<?php
	
	session_start();							//用來暫存用戶的資料
	
	require_once ('connMysql.php');
	
	require_once("login_check.php");			//login_check.php 是用來檢查用戶是否登錄了
	
	if (isset($_GET['query']) && ($_SESSION['ac'] == "rootroot"))		//如果查詢人是管理員 且 $_POST['query']不為空
	{
		$ac = $_GET['query'];
	}
	else
	{	$ac=$_SESSION['ac'];	}
	
    $sql = "SELECT * FROM member WHERE ac='$ac'";
	
	$result=$conn->query($sql);
	
	$row=$result->fetch_array();
?>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <link href="style_test.css" rel="stylesheet">
		</title></title>
	</head>
	<body>
        
        <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
		<tr valign="top">
			<td width="600">
				<form name="update" method="post" action="member_update.php">
					<p>
						<font size="6" color="#FF0000">修改資料</font>
					</p>
					<div>
						<hr size="1" />
						<p>
							<strong>姓    名</strong> :
							<input type="text" name="name" value="<?php echo $row['name']; ?>">
						</p>
						<p>
							<strong>性    別</strong>
							<?php
							if ($row['sex']=='m')
							{
								echo	"<input type=\"radio\" name=\"sex\" value=\"m\" checked=\"true\">男";
								echo	"<input type=\"radio\" name=\"sex\" value=\"f\" >女;";
							}
							else
							{	
								echo	"<input type=\"radio\" name=\"sex\" value=\"m\" >男";
								echo	"<input type=\"radio\" name=\"sex\" value=\"f\" checked=\"true\">女";
							}
							?>
							
						</p>
						
						<p>
							<strong>生    日</strong>			<!-- 這部份可以用 javascript 或 php 的回圈來作, 不需要把1900到2016所有年份列出來 -->
							<select name="year" size="1" onchange="changeDate()" >
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
							<input type="text" name="telephone" value="<?php echo $row['telephone']; ?>">
						</p>
						
						<p>
							<strong>住    址</strong>
							<input type="text" name="addr" size="40" value="<?php echo $row['addr']; ?>">
						</p>
						
						<p>
							<strong> e-mail </strong>
							<input type="text" name="mail" size="40" value="<?php echo $row['mail']; ?>">
						</p>
						<?php
							if($_SESSION['ac'] == "rootroot" && $ac != $_SESSION['ac'])
							{

							echo "<p>
								<strong>狀    態</strong>";
								
								if ($row['state']<2 && $row['access']=="student")
								{
									echo	"<input type=\"radio\" name=\"state\" value=\"1\" checked=\"true\">就讀";
									echo	"<input type=\"radio\" name=\"state\" value=\"2\" >畢業;";
								}
								else
								{	
									echo	"<input type=\"radio\" name=\"state\" value=\"1\" checked=\"true\">在職";
									echo	"<input type=\"radio\" name=\"state\" value=\"2\" >離職";
								}
							
								
							echo "</p>";
							echo "<input type=\"hidden\" name=\"acct\" value=\"$ac\">";
							}
						?>
					</div>
					
					<hr size="1" />
					<p align="center">
						<input type="submit" name="submit" value="送出">
						<input type="reset" name="reset" value="清空欄位">
					</p>
				</form>
			</td>
		</tr>
	</table>
    
    </body>
    
		
		