<?php
	session_start();
	date_default_timezone_set('Asia/Bangkok'); 
    $objConnect = mysql_connect("localhost","psscom_hotKPI","Thantee2529") or die("Error Connect to Database");
    mysql_query("SET NAMES UTF8",$objConnect); // เอาไว้กรณีให้บังคับตัวหนังสือเป็น UTF 8
    $objDB = mysql_select_db("psscom_hotKPI");
//	if(isset($_GET['lang'])){
//		$lang = $_GET['lang'];
//		$_SESSION['lang'] = $lang;
//	}else{
//		$lang = (isset($_SESSION['lang']))?$_SESSION['lang']:'en';
//	}
//	if(isset($_GET['lang'])){
//		$lang = $_GET['lang'];
//		$_SESSION['lang'] = $lang;
//	}else{
//		$lang = (isset($_SESSION['lang']))?$_SESSION['lang']:'en';
//	}
//	if($_SESSION["lang"] == "EN")
//	{
//		include("en.php");
//	}
//	else
//	{
//		include("th.php");
//	}
?>
