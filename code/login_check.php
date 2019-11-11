<?php
	
	if(!isset($_SESSION["ac"]) || ($_SESSION["ac"] == ""))		//還沒登入會自動跳回首頁
		header ("Location: index.php");
	
?>