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
$ref_id_type=$_POST['ref_id_type'];
$detail=$_POST['detail'];
$price=$_POST['price'];
@$photo=$_POST['photo'];
$photo_del=$_POST['photo_del'];
@$chkdel=$_POST["chkdel"];
@$fileupload=$_FILES['fileupload']['tmp_name'];
@$fileupload_name=$_FILES['fileupload']['name'];
@$fileupload_size=$_FILES['fileupload']['size'];
@$fileupload_type=$_FILES['fileupload']['type'];

include "connect.php";
if ($chkdel=="1") {
		$sql3="update tb_product set photo_prd='' where id_prd ='$id_edit' ";
		$result3=mysqli_query($c,$sql3);
		unlink("photo/$photo_del");
}

if ($fileupload) {

	$array_last=explode(".",$fileupload_name);
	$cc=count($array_last)-1; 
	$lastname=strtolower($array_last[$cc]) ;
	
	if ($lastname=="gif" or $lastname=="jpg" or $lastname=="jpeg") {

		$photoname=$id_edit.".".$lastname;
		copy($fileupload,"photo/".$photoname);

		$sql3="update tb_product set photo_prd='$photoname' where id_prd ='$id_edit' ";
		$result3=mysqli_query($c,$sql3);
	} 
	unlink($fileupload);
} 

$sql="update tb_product set  
			name_prd='$name',
			ref_id_type='$ref_id_type',
			detail_prd='$detail',
			price_prd='$price' where id_prd='$id_edit' ";
$result=mysqli_query($c,$sql);

if ($result) {
	echo "<H3>แก้ไขสินค้าเรียบร้อยแล้ว</H3>";
	echo "[ <A HREF=admin_product.php>กลับ</A> ] ";
} else {
	echo "<H3>ERROR : ไม่สามารถแก้ไขสินค้าได้</H3>";
	echo "[ <A HREF=admin_product.php>กลับ</A> ] ";
}
mysqli_close($c);
?>