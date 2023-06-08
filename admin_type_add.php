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
$name=$_POST["name"];

include "connect.php";
$sql="INSERT INTO tb_type VALUES(null,'$name')";
$result=mysqli_query($c,$sql);
if ($result) {
	echo "<H3>เพิ่มประเภทสินค้าเสร็จเรียบร้อยแล้ว</H3>";
	echo "[ <A HREF=admin_type.php>กลับ</A> ] ";
} else {
	echo "<H3>ERROR : ไม่สามารถเพิ่มประเภทสินค้าได้</H3>";
	echo "[ <A HREF=admin_type.php>บันทึกอีกครั้ง</A> ] ";
	
}	
mysqli_close($c);
?>