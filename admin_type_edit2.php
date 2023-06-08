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
$id_edit=$_POST['id_edit'];
$name=$_POST['name'];

include "connect.php";
$sql="update tb_type set  name_type='$name' where id_type='$id_edit' ";
$result=mysqli_query($c,$sql);
if ($result) {
	echo "<H3>แก้ไข ประเภทสินค้าเรียบร้อย</H3>";
	echo "[ <A HREF=admin_type.php>กลับ</A> ] ";
} else {
	echo "<H3>ERROR : ไม่สามารถแก้ไขได้</H3>";
	echo "[ <A HREF=admin_type.php>กลับ</A> ] ";
}
mysqli_close($c);
?>