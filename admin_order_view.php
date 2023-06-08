<?php
$id_order=$_GET['id_order'];

include "connect.php";
$sql="select * from tb_order where id_order='$id_order' ";
$result=mysqli_query($c,$sql);
$rs=mysqli_fetch_array($result);
$id_order=$rs['id_order'];
$code_order=sprintf("%05d",$id_order);
$id_name_order=$rs['id_name_order'];
$date_order=$rs['date_order'];
$total_order=$rs['total_order'];


$sqlg4 = "select * from member where id='$id_name_order' ";
$resultg4 = mysqli_query($c, $sqlg4);
$rsg4 = mysqli_fetch_array($resultg4);
$name_order=$rsg4['name'];
$email = $rsg4['email'];
$address_order=$rsg4['address'];
$tel_order=$rsg4['tel'];
$name_order=$rsg4['name'];

?>
<HTML>
<HEAD>
	<style>
		.center {
				margin: auto;
				width: 60%;
				}
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<TITLE>TINY POT</TITLE>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/jquery.DonutWidget.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
</HEAD>

<BODY class='center'>
<P><H3>รายการใบสั่งซื้อ</H3></P>
<TABLE WIDTH="100%" BORDER="0" CELLSPACING="1" CELLPADDING="0">
	<TR>
		<TD WIDTH="200">รหัสการสั่งซื้อ  : </TD>
		<TD><?=$code_order?></TD>
	</TR>
	<TR>
		<TD >ชื่อผู้สั่งซ์้อ: </TD>
		<TD><?=$name_order?></TD>
	</TR>
	<TR>
		<TD>Email : </TD>
		<TD><?=$email?></TD>
	</TR>
	<TR>
		<TD>เบอร์โทรติดต่อ :</TD>
		<TD><?=$tel_order?></TD>
	</TR>
	<TR>
		<TD>ที่อยู่ผู้สั่งซื้อ</TD>
		<TD><?=$address_order?></TD>
	</TR>
	<TR>
		<TD>วันเดือนปีที่สั่งซื้อ</TD>
		<TD><?=$date_order?></TD>
	</TR>
</TABLE><BR>
<TABLE WIDTH="60%"  BORDER="1">
	<TR BGCOLOR="#E8E8E8">
		<TD WIDTH="8%"><div align="center"><B>รหัสสินค้า</B></div></TD>
		<TD WIDTH="60%"><div align="center"><B>ชื่อสินค้า</B></div></TD>
		<TD WIDTH="10%"><div align="center"><B>จำนวน</B></div></TD>
		<TD WIDTH="10%"><div align="center"><B>ราคา</B></div></TD>
		<TD WIDTH="12%"><div align="center"><B>รวมทั้งหมด</B></div></TD>
	</TR>
	<?php
		$sql="
			SELECT ref_id_prd,name_prd,number,price 
			FROM tb_product, tb_order_detail
			WHERE id_prd = ref_id_prd and ref_id_order='$id_order' ";

		$result=mysqli_query($c,$sql);
		while ($rs=mysqli_fetch_array($result)) {
			$ref_id_prd=$rs['ref_id_prd'];
			$code=sprintf("%05d",$ref_id_prd);
			$name_prd=$rs['name_prd'];
			$number=$rs['number'];
			$price=$rs['price'];
			$total_unit=$number*$price;
			@$total=$total+$total_unit;




			echo "
				<TR>
					<TD>$code</TD>
					<TD>&nbsp;$name_prd</TD>
					<TD><CENTER>$number</CENTER></TD>
					<TD><CENTER>$price</CENTER></TD>
					<TD><CENTER>$total_unit</CENTER></TD>
				 </TR>";
		}
			echo "
			<TR>
			<TD colspan=4><center>รวมทั้งหมด (บาท) </center></TD>
			<TD><CENTER>$total</CENTER></TD>
		 </TR>";			
			
		mysqli_close($c);
	?>
</TABLE><BR>
</BODY>
</HTML>
