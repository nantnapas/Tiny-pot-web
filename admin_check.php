<?php
	session_start();
	include "connect.php";
	$strSQL = "SELECT * FROM tb_member WHERE Username = '".trim($_POST['txtUsername'])."' 
	and Password = '".trim($_POST['txtPassword'])."'";
	$objQuery = mysqli_query($c,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	$address=$objResult["address"];

	if(!$objResult)
	{
			header("location:index.php");
	}
	else
	{
			$_SESSION["UserID"] = $objResult["Username"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "USER")
			{
				header("location:admin_home.php");
			}
			else 
			{
				header("location:index.php");
			}
	}
	mysqli_close($c); 

?>