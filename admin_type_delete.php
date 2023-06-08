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
$id_del=$_GET['id_del'];
include "connect.php";
$sql="delete from tb_type where id_type='$id_del' ";
$result=mysqli_query($c,$sql);
if ($result) {
	echo "<H3>ลบประเภทสินค้าออกจากระบบแล้ว</H3>";
	echo "[ <A HREF=admin_type.php>กลับ</A> ] ";
} else {
	echo "<H3>ERROR : ไม่สามารถลบประเภทสินค้าออกจากระบบได้</H3>";
	echo "[ <A HREF=admin_type.php>กลับ</A> ] ";
}
mysqli_close($c);
?>