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
?>
<HTML>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<HEAD><TITLE>OFFICE CMU SHOP</TITLE></HEAD>
<BODY>
<?php  include "admin_menu.php"; ?>
<BR>
<?php

$id_order=$_GET['id_order'];

include "connect.php";
$sql="delete from tb_order where id_order='$id_order' ";
mysqli_query($c,$sql);

$sql="delete from tb_order_detail where ref_id_order='$id_order' ";
mysqli_query($c,$sql);

echo "<H3>ลบรายการเสร็จเรียบร้อยแล้ว</H3>";
echo "[ <A HREF=admin_order.php>กลับ</A> ] ";
mysqli_close($c);

?>
</BODY>
</HTML>
