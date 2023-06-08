<?php
 error_reporting(E_ALL ^ E_NOTICE);
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
?>
<HTML>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
		.center {
				margin: auto;
				width: 60%;
				}
	</style>
<HEAD><TITLE>TINY POT</TITLE></HEAD>
<BODY>
<?php
	include "admin_menu.php"; 
	include "connect.php";
	$sql="select * from tb_order ";
	$result=mysqli_query($c,$sql);
	$number=mysqli_num_rows($result);
	$no=1;
	if ($number<>0) {
	echo "
	<br>
	<TABLE BORDER=1 class='center'>
		<TR BGCOLOR=#E8E8E8> 
			<TD>No.</TD>
			<TD>NAME</TD>
			<TD>ADDRESS</TD>
			<TD>TEL.</TD>
			<TD>TOTAL</TD>
			<TD>DATE<TD>
		</TR> ";
	while($rs=mysqli_fetch_array($result)) {
		$id_order=$rs['id_order'];
		$code_order=sprintf("%05d",$id_order);
		$id_name_order=$rs['id_name_order'];
		$tel_order=$rs['tel_order'];
		$total_order=$rs['total_order'];
		$date_order=$rs['date_order'];

		$sqlg4 = "select * from member where id='$id_name_order' ";
		$resultg4 = mysqli_query($c, $sqlg4);
		$rsg4 = mysqli_fetch_array($resultg4);
		$name_order=$rsg4['name'];
		$address=$rsg4['address'];
		$tel=$rsg4['tel'];
		$name_order=$rsg4['name'];


		echo "
			<TR> 
			<TD><A HREF=\"admin_order_view.php?id_order=$id_order\" TARGET=\"_blank\">$code_order</A></TD>
			<TD>$name_order</TD>
			<TD>$address</TD>
			<TD>$tel</TD>
			<TD><CENTER>$total_order</CENTER></TD>
			<TD>$date_order</TD>
			<TD><A HREF=\"admin_order_delete.php?id_order=$id_order\"
				onclick=\"return confirm('ต้องการลบ  $code_order ออกจากระบบใช่หรือไม่?')\">[ลบ]</A></TD>
			
		</TR>";
		$no++;
	}
	echo "</TABLE>";
	mysqli_close($c);
	} 
?>
</BODY>
</HTML>