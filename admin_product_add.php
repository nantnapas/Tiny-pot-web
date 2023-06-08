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
	<style>
		.center {
				margin: auto;
				width: 60%;
				}
	</style>
<HEAD><TITLE>TINY POT</TITLE></HEAD>
<BODY>
<?php  include "admin_menu.php"; ?>
<br>
<FORM ACTION="admin_product_add2.php" METHOD="post" ENCTYPE="multipart/form-data" class='center'>
  <TABLE WIDTH="400" BORDER="0" CELLSPACING="1" CELLPADDING="0">
<br>
      <TR>
      <TD WIDTH="101">รหัสสินค้า</TD>
      <TD><INPUT TYPE="text" NAME="id_p" SIZE="10">* </TD>
    </TR>
    <TR>
      <TD WIDTH="101">ชื่อสินค้า</TD>
      <TD><INPUT TYPE="text" NAME="name" SIZE="40">* </TD>
    </TR>
    <TR>
      <TD>ประเภทสินค้า</TD>
      <TD>
	  <SELECT NAME="ref_id_type">
	  <OPTION VALUE="0">เลือกประเภทสินค้า</OPTION>
	  <?php
		 include "connect.php";
		$sql="select * from tb_type";
		$result=mysqli_query($c,$sql);
	  	while($rs=mysqli_fetch_array($result)) {
			$id_type=$rs['id_type'];
			$name_type=$rs['name_type'];
			echo "<OPTION VALUE='$id_type'>$name_type</OPTION>";
		}
	  ?>
      </SELECT>
	  *</TD>
    </TR>
    <TR>
      <TD>รายละเอียดสินค้า</TD>
      <TD><TEXTAREA NAME="detail" COLS="40" ROWS="4"></TEXTAREA> * </TD>
    </TR>
    <TR>
      <TD>ราคา:หน่วย</TD>
      <TD><INPUT TYPE="text" NAME="price" SIZE="10"> 
        บาท * </TD>
    </TR>
    <TR>
      <TD>ภาพสินค้า</TD>
      <TD><INPUT  TYPE="file" NAME="fileupload">		
	  <INPUT TYPE="hidden" NAME="MAX_FILE_SIZE" VALUE="100000"></TD>
    </TR>
      <TD>&nbsp;</TD>
      <TD><INPUT TYPE="submit" NAME="Submit" VALUE="Submit">
        <INPUT TYPE="reset" NAME="Submit2" VALUE="Reset"></TD>
    </TR>
  </TABLE>
</FORM>
</BODY>
</HTML>