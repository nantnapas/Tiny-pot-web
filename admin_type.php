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
$sql="select * from tb_type";
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
<br>
<?php  include "admin_menu.php"; ?>
<FORM  METHOD="post" ACTION="admin_type_add.php" class='center'>
เพิ่มประเภทสินค้า
  <INPUT TYPE="text" NAME="name">
  <INPUT TYPE="submit" NAME="Submit" VALUE="Submit">
</FORM>
<?php
	if ($number<>0) {
		echo "
			<TABLE BORDER='1' class='center'>
				<TR BGCOLOR='#E8E8E8'> 
				 <TD>ลำดับ</TD>
				<TD>ประเภทสินค้า</TD>
				<TD>แก้ไข</TD>
				<TD>ลบ</TD>
		</TR>";
		while($rs=mysqli_fetch_array($result)) {
			$id_type=$rs['id_type'];
			$name_type=$rs['name_type'];

			echo "
				<TR> 
					<TD><CENTER>$no</CENTER></TD>
					<TD>$name_type</TD>
					<TD><A HREF=\"admin_type_edit.php?id_edit=$id_type\">[แก้ไข]</A></TD>
					<TD><A HREF=\"admin_type_delete.php?id_del=$id_type\" 
					onclick=\" return confirm('คุณต้องการลบประเภทสินค้า $name_type ออกจากระบบใช่หรือไม่ ?')\">[ลบ]</A></TD>
				</TR>";
			$no++;
		}
		echo "</TABLE>";	
		mysqli_close($c);
	} 
?>
</BODY>
</HTML>