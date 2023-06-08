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
$photo_del=$_GET['photo_del'];

include "connect.php";
$sql="delete from tb_product where id_prd='$id_del' ";
$result=mysqli_query($c,$sql);


if ($photo_del<>"") {
	$photo_del="photo/".$photo_del;
	if (file_exists($photo_del)) {
		unlink($photo_del);
	}
}

if ($result) {
	echo "<H3>ลบ สินค้าเรียบร้อยแล้ว</H3>";
	echo "[ <A HREF=admin_product.php>กลับ</A> ] ";
} else {
	echo "<H3>ERROR : ไม่สามารถลบสินค้าได้</H3>";
}
mysqli_close($c);
?>