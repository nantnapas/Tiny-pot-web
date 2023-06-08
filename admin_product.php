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
$sql="select * from tb_product order by id_prd desc";
$result=mysqli_query($c,$sql);
$number=mysqli_num_rows($result);
$no=1;
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

	if ($number<>0) {
	echo "
	<br>
	<TABLE BORDER=1 class='center'>
		<TR BGCOLOR=#E8E8E8> 
			<TD>รหัสสินค้า</TD>
			<TD>สินค้า</TD>
			<TD>ประเภทสินค้า</TD>
			<TD>ราคา</TD>
			<TD>[แก้ไข]</TD>
			<TD>[ลบ]</TD>
		</TR> ";

	while($rs=mysqli_fetch_array($result)) {
		$id_prd=$rs['id_prd'];
		$code_prd=sprintf("%05d",$id_prd);
		$name_prd=$rs['name_prd'];
		$detail_prd=$rs['detail_prd'];
		$ref_id_type=$rs['ref_id_type'];
		$price_prd=$rs['price_prd'];
		$photo_prd=$rs['photo_prd'];


		$sql2="select name_type from tb_type where id_type='$ref_id_type' ";
		$result2=mysqli_query($c,$sql2);
		$rs2=mysqli_fetch_array($result2);

		$name_type=$rs2['name_type'];

		echo "
			<TR> 
			<TD>$code_prd</TD>
			<TD>$name_prd</TD>
			<TD>$name_type</TD>
			<TD>$price_prd</TD>
			<TD><A HREF=\"admin_product_edit.php?id_edit=$id_prd\">[แก้ไข]</A></TD>
			<TD><A HREF=\"admin_product_delete.php?id_del=$id_prd&photo_del=$photo_prd\" 
				onclick=\"return confirm('ยืนยันลบประเภทสินค้า $name_prd ออกจากระบบ')\">[ลบ]</A></TD>
			</TR>
		</TR>";
		$no++;
	}
	echo "</TABLE>";	
	mysqli_close($c);
} 
?>
</BODY>
</HTML>