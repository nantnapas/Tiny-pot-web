<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  ob_start();

$id_order_edit=$_GET['id_order_edit'];
$id_prd_edit=$_GET['id_prd_edit'];
$id_number=$_POST['number_order'];

include "connect.php";
$sql="update tb_order_detail set number='$id_number' where ref_id_order ='$id_order_edit' and ref_id_prd='$id_prd_edit' ";
$result=mysqli_query($c,$sql);

if ($result) {
	echo "<p>Please wait ...</p>";
    header("refresh: 1; url=basket_add.php");
} else {
	echo "<p>Error update ...</p>";
    header("refresh: 1; url=basket_add.php");
}
mysqli_close($c);
?>