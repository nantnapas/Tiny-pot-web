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
$id_p=$_POST['id_p'];
$name=$_POST['name'];
$ref_id_type=$_POST['ref_id_type'];
$detail=$_POST['detail'];
$price=$_POST['price'];

$fileupload=$_FILES['fileupload']['tmp_name'];
$fileupload_name=$_FILES['fileupload']['name'];
$fileupload_size=$_FILES['fileupload']['size'];
$fileupload_type=$_FILES['fileupload']['type'];

include "connect.php";
$sql="INSERT INTO tb_product values('$id_p','$name','$ref_id_type','$detail','$price','') ";
$result=mysqli_query($c,$sql);

if ($fileupload) {

	$array_last=explode(".",$fileupload_name);
	$cc=count($array_last)-1; 
	$lastname=strtolower($array_last[$cc]) ;
	
	if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {

		$sql2="select max(id_prd) from tb_product ";
		$result2=mysqli_query($c,$sql2);
		$row=mysqli_fetch_row($result2);

		$photoname=$row[0].".".$lastname;
		copy($fileupload,"photo/".$photoname);

		$sql3="update tb_product set photo_prd='$photoname' where id_prd ='$row[0]' ";
		$result3=mysqli_query($c,$sql3);

	} 
	unlink($fileupload);
} 

echo "<H3>เพิ่มสินค้าเรียบร้อยแล้ว</H3>";
echo "[ <A HREF=admin_product.php>กลับ</A> ] ";

mysqli_close($c);
?>