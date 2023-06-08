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
include "connect.php";
$sql="select * from member";
$result=mysqli_query($c,$sql);
$number=mysqli_num_rows($result);
$no=1;
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
<?php
	if ($number<>0) {
		echo "
			<br>
			<TABLE BORDER='1' class='center'>
				<TR BGCOLOR='#E8E8E8'> 
				 <TD>ลำดับ</TD>
                <TD>ชื่อ-สกุล</TD>
                <TD>ที่อยู่</TD>
                <TD>email</TD>
                <TD>เบอร์โทรติดต่อ</TD>
                <TD>username</TD>
                <TD>password</TD>
				<TD>ลบ</TD>
		</TR>";
		while($rs=mysqli_fetch_array($result)) {
            $id=$rs['id'];
			$name=$rs['name'];
            $address=$rs['address'];
            $email=$rs['email'];
            $tel=$rs['tel'];
            $user=$rs['user'];
            $password=$rs['password'];
            $verify=$rs['verify'];

			echo "
				<TR> 
					<TD><CENTER>$no</CENTER></TD>
                    <TD>$name</TD>
                    <TD>$address</TD>
                    <TD>$email</TD>
                    <TD>$tel</TD>
                    <TD>$user</TD>
                    <TD>$password</TD>
					<TD><A HREF=\"admin_reg_delete.php?id_del=$id\" 
					onclick=\" return confirm('คุณต้องการลบรายชื่อลูกค้า  $name   ออกจากระบบใช่หรือไม่ ?')\">[ลบ]</A></TD>
				</TR>";
			$no++;
		}
		echo "</TABLE>";	
		mysqli_close($c);
	} 
?>
</BODY>
</HTML>