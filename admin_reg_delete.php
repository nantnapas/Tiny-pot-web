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
$sql="delete from member where id='$id_del' ";
$result=mysqli_query($c,$sql);


if ($result) {
	echo "<H3>ลบ รายชื่อลูกค้าเรียบร้อยแล้ว</H3>";
	echo "[ <A HREF=admin_reg.php>กลับ</A> ] ";
} else {
    echo "<H3>ERROR : ไม่สามารถลบสินค้าได้</H3>";
	echo "[ <A HREF=admin_reg.php>กลับ</A> ] ";
}
mysqli_close($c);
?>