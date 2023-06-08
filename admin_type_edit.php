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
$id_edit=$_GET['id_edit'];

include "connect.php";
$sql="select * from tb_type where id_type='$id_edit'";
$result=mysqli_query($c,$sql);
$rs=mysqli_fetch_array($result);

$id_type=$rs['id_type'];
$name_type=$rs['name_type'];
?>
<HTML>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<HEAD><TITLE>OFFICE CMU SHOP</TITLE></HEAD>
</HEAD>
<BODY>
<?  include "admin_menu.php"; ?>
<FORM NAME="form1" METHOD="post" ACTION="admin_type_edit2.php">
แก้ไขประเภทสินค้า
	<INPUT TYPE="text" NAME="name" VALUE="<?=$name_type?>">
	<INPUT TYPE="submit" NAME="Submit" VALUE="Submit">
	<INPUT NAME="id_edit" TYPE="hidden" VALUE="<?=$id_edit?>">	 
</FORM>
</BODY>
</HTML>