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
$sql="select * from tb_product where id_prd='$id_edit' ";
$result=mysqli_query($c,$sql);
$rs=mysqli_fetch_array($result);

$id_prd=$rs['id_prd'];
$code=$rs['id_prd'];
$name_prd=$rs['name_prd'];
$detail_prd=$rs['detail_prd'];
$ref_id_type=$rs['ref_id_type'];
$price_prd=$rs['price_prd'];
$photo_prd=$rs['photo_prd'];

?>
<HTML>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<HEAD><TITLE>OFFICE CMU SHOP</TITLE></HEAD>
<BODY>
<?php  include "admin_menu.php"; ?>
<FORM ACTION="admin_product_edit2.php" METHOD="post" ENCTYPE="multipart/form-data">
  <P><B>แก้ไขสินค้า</B></P>
  <TABLE WIDTH="400" BORDER="0" CELLSPACING="1" CELLPADDING="0">
      <TR>
      <TD WIDTH="101">รหัสสินค้า</TD>
      <TD><INPUT TYPE="text" NAME="id_p" SIZE="10" VALUE="<?=$code?>">* </TD>
    </TR>
    <TR>
      <TD width="101">ชื่อสินค้า</TD>
      <TD><INPUT TYPE="text" NAME="name" SIZE="40" VALUE="<?=$name_prd?>">* </TD>
    </TR>
    <TR>
      <TD>ประเภทสินค้า</TD>
      <TD>
	  <SELECT NAME="ref_id_type">
	  <?php
		$sql="select * from tb_type";
		$result=mysqli_query($c,$sql);
	  	while($rs=mysqli_fetch_array($result)) {
			$id_type=$rs['id_type'];
			$name_type=$rs['name_type'];
			if ($ref_id_type==$id_type) {
				echo "<OPTION VALUE='$id_type' SELECTED>$name_type</OPTION>";
			} else {
				echo "<OPTION VALUE='$id_type' >$name_type</OPTION>";
			}
		}
	  ?>
      </SELECT></TD>
    </TR>
    <TR>
      <TD>รายละเอียดสินค้า</TD>
      <TD><TEXTAREA NAME="detail" COLS="40" ROWS="4"><?=$detail_prd?></TEXTAREA> * </TD>
    </TR>
    <TR>
      <TD>ราคา:หน่วย </TD> 
      <TD><INPUT  TYPE="text" NAME="price" SIZE="10" VALUE="<?=$price_prd?>"> บาท * </TD>
    </TR>
    <TR>
      <TD>รูปภาพ</TD>
      <TD>
	  <?php
		if ($photo_prd<>"") {
				 echo "<INPUT TYPE='checkbox' NAME='chkdel' VALUE='1'> ลบรูปภาพ <BR>";
				 echo "<A HREF='photo/$photo_prd' TARGET='_blank'> แสดงรูปภาพ </A>";
		} else {
				echo "<INPUT TYPE='file' NAME='fileupload' >";
				echo "<INPUT TYPE='hidden' name='MAX_FILE_SIZE' value='100000'>";
		}
	  ?>
	</TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD>
		<INPUT TYPE="submit" NAME="Submit" VALUE="Submit">
        <INPUT TYPE="reset" NAME="Submit2" VALUE="Reset">
        <INPUT NAME="id_edit" TYPE="hidden"  VALUE="<?=$id_edit?>">
        <INPUT NAME="photo_del" TYPE="hidden"  VALUE="<?=$photo_prd?>">
		</TD>
    </TR>
  </TABLE>
</FORM>
</BODY>
</HTML>