<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		header("location:index.php");
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for Admin only!";
		exit();
	}
	
	include "connect.php";
	$sqlm="select * from tb_member where Username='$_SESSION[UserID]' ";
	$resultm=mysqli_query($c,$sqlm);
	while($rs=mysqli_fetch_array($resultm)) {
		$id_name=$rs["Username"];
		$Name=$rs["Name"];
		$id_group=$rs["UserID"];
	}		
?>
<HTML>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<HEAD><TITLE>TINY POT</TITLE></HEAD>
<BODY>
<?php  include "admin_menu.php"; ?>
</BODY>
</HTML>