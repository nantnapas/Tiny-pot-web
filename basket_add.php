<?php
 error_reporting(E_ALL ^ E_NOTICE);
 session_start();
 ob_start();
 if ($_SESSION['user'] == "") {
	 header("location:reg.php");
	 exit();
 }
  include "connect.php";
  $strSQL = "SELECT * FROM member WHERE user = '$_SESSION[codeuser]'";
  $objQuery = mysqli_query($c,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
  $number_reg=$objResult['id'];
  $address=$objResult['address'];
  $email=$objResult['email'];
  $tel=$objResult['tel'];

  @$id_prd=$_GET['id_prd'];
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<title>TINY POT</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/jquery.DonutWidget.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<header class="default-header">
				<nav class="navbar navbar-expand-lg  navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="index.php">
						  	<img src="img/logo.png" alt="">
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a href="index.php">HOME</a></li>
								<li><a href="index.php">BACK</a></li>	
								<li class="dropdown">
							      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								  <span class='lnr lnr-user'></span> MEMBER
							      </a>
							      <div class="dropdown-menu">
							        <?php include "login.php" ?>
							      </div>							  
							    </li>							
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>



			<section class="project-area section-gap" id="viwe">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">TINY POT</h1>
							</div>
						</div>
					</div>					
					<div class="row">
					<div class="col-lg-12 text-left">
						<?php echo "COSTUMER :  " . $_SESSION['user'] ;  ?>
						<p>
 							NO.MEMBER : <?=$number_reg?>
							<br> 
							ADDRESS : <?=$address?>
							<br>
							EMAIL : <?=$email?>
							<br>
							TELEPHONE : <?=$tel?>
						</p>		
					</div>
					<div class="col-lg-12 text-center">

<?php				
include "connect.php";
$sql="select * from tb_order where id_name_order=$_SESSION[id] and date_order is null ";
$result=mysqli_query($c,$sql);
$number=mysqli_num_rows($result);
while ($rs=mysqli_fetch_array($result)) {
		$id_order=$rs['id_order'];
		$id_name_order=$rs['id_name_order'];
		$total_order=$rs['total_order'];
		$date_order=$rs['date_order'];

	}
	if ($number==0) {
		$sqla="INSERT INTO tb_order VALUES(null,$_SESSION[id],null,null)";
		$resulta=mysqli_query($c,$sqla);
	}
	else {
		echo "รายการสินค้าในตระกร้าของท่าน";		
	}		
		mysqli_close($c);
?>

<?php
include "connect.php";
	$sqlb="select * from tb_order where id_name_order=$_SESSION[id] and date_order is null ";
	$resultb=mysqli_query($c,$sqlb);
	while ($rsb=mysqli_fetch_array($resultb)) {
			$id_ord=$rsb['id_order'];
			$id_name_order2=$rsb['id_name_order'];
			$total_order=$rsb['total_order'];
			$date_order2=$rsb['date_order'];
	
			$sqlf="select * from tb_product where id_prd=$id_prd order by id_prd desc";
			$resultf=mysqli_query($c,$sqlf);
			@$rsf=mysqli_fetch_array($resultf);
			$ref_id_order =$rsf['ref_id_order'];
			$ref_id_prd =$rsf['ref_id_prd'];
			$price_prdf=$rsf['price_prd'];
	}
	if ($id_name_order2==$_SESSION['id'] and $date_order2 == null and $id_prd<>'' ) {
		$sqlb2="INSERT INTO tb_order_detail VALUES('$id_ord','$id_prd',1,'$price_prdf')";
	   $resultb2=mysqli_query($c,$sqlb2);
	}			
	else {
		echo "";
	} 
		mysqli_close($c);
	?>

	<?php
	include "connect.php";
	$sql2="select * from tb_order_detail where ref_id_order='$id_ord' ";
	$result2=mysqli_query($c,$sql2);
	$number=mysqli_num_rows($result2);
	$no=1;

		if ($number==0)
		{ echo "
			<TABLE WIDTH='100%'  BORDER='1'>
			<TR BGCOLOR='#E8E8E8'>
				<TD WIDTH='5%'>ลำดับ</TD>
				<TD WIDTH='10%'>รหัสสินค้า</TD>
				<TD WIDTH='35%'>ชื่อสินค้า</TD>
				<TD WIDTH='10%'>ราคา</TD>
				<TD WIDTH='10%'>จำนวนที่สั่งซื้อ</TD>
				<TD WIDTH='10%'>รวม</TD>
				<TD WIDTH='10%'>ปรับปรุง</TD>
				<TD WIDTH='10%'>ยกเลิก</TD>
			</TR>
			<TR>
				<TD colspan ='8'>
				  ยังไม่มีสินค้าในตระกร้าในขณะนี้
				</TD>
			</TR>
			</TABLE>								
			"; }
		if ($number<>0){
			echo " 
				
				<TABLE WIDTH='100%'  BORDER='1'>
					<TR BGCOLOR='#E8E8E8'>
						<TD WIDTH='5%'>ลำดับ</TD>
						<TD WIDTH='10%'>รหัสสินค้า</TD>
						<TD WIDTH='35%'>ชื่อสินค้า</TD>
						<TD WIDTH='10%'>ราคา</TD>
						<TD WIDTH='10%'>จำนวนที่สั่งซื้อ</TD>
						<TD WIDTH='10%'>รวม</TD>
						<TD WIDTH='10%'>ปรับปรุง</TD>
						<TD WIDTH='10%'>ยกเลิก</TD>
					</TR>
				"; 
			while($rs2=mysqli_fetch_array($result2)) { 
				$ref_id_order=$rs2['ref_id_order'];
				$code_order=sprintf("%05d",$ref_id_order);
				$ref_id_prd=$rs2['ref_id_prd'];
				$code_prd=sprintf("%05d",$ref_id_prd);
				$number_order=$rs2['number'];
				$price=$rs2['price'];

				$total = $number_order*$price;
				$total_all = $total_all+$total;


				$sql5="select * from tb_product where id_prd=$ref_id_prd";
				$result5=mysqli_query($c,$sql5);
				$rs5=mysqli_fetch_array($result5);
				$name_prd =$rs5['name_prd'];


		echo "
			<FORM METHOD='post' class='form-inline' ACTION='basket_update.php?id_order_edit=$ref_id_order&id_prd_edit=$ref_id_prd' >
				<TR>
					<TD>$no</TD>
					<TD>$code_prd</TD>
					<TD class='text-left'>$name_prd</TD>
					<TD class='text-right'>".@number_format($price,2)."</TD>
					<TD>
						<INPUT class='text-center $text_coler' TYPE='text' NAME='number_order' VALUE='$number_order'   autocomplete='off'  
						OnChange=\"JavaScript:doCallAjax();\" onKeyUp=\"if (isNaN(this.value)) {alert('กรุณากรอกตัวเลข'); this.value = '';};\"> 
					</TD>
					<TD class='text-right'>". @number_format(($price*$number_order), 2) ."</TD>
					<TD>
						<input class='btn-success' TYPE='submit' NAME='submit' VALUE='UPDATE'>
					</TD>							
					<TD><A class='btn-sm btn-danger' HREF='basket_delete.php?id_order_edit=$ref_id_order&id_prd_edit=$ref_id_prd'>DELETE</A></TD>
				</TR>
			</FORM>	
			";	
		$no++;						
		}
		echo "
			<tr>
				<td colspan=5>รวมทั้งสิ้น</td>
				<td class='text-right'>".@number_format($total_all,2)."</td>
				<td colspan=2>บาท</td>
			</tr>";					
		echo "</table>";
		echo "					
			<DIV class='col-lg-12 mt-2'>
				<A class='btn-sm btn-warning' HREF='basket_cal.php?id_order=$ref_id_order&id_total=$total_all'> CONFIRM ORDER </A>
			</DIV>						
		";
		}
	?>  							
		</div>

		<div class='col-lg-12 mt-10'>
			<p>
				<b>หมายเหตุ :</b> 
					<br>
					-  กรณีที่ท่านต้องการสั่งซื้อมากกว่า 1 ต้น สามารถแก้ไขได้ในคอลัมม์ <b>จำนวนที่สั่งซื้อ</b> จากนั้นให้คลิกปุ่ม update ของแต่ละสินค้า 
					<br>
					- เมื่อท่านดำเนินการเลือกสินค้าครบตามต้องการแล้ว กรุณาคลิกปุ่ม <b>CONFIRM ORDER</b> เพื่อทางร้านเราจะได้ดำเนินการจัดส่งสินค้าให้ต่อไป
					<br>
					- การจัดส่งสินค้าจะดำเนินการจัดส่งภายใน 1 วัน สำหรับพื้นที่ในจังหวัดเชียงใหม่ และพื้นที่ต่างจังหวัดภายใน 3 วัน
			</p>
		</div>


				</div>		
			</section>



			<footer class="footer-area section-gap" id="contact">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>ALL PRODUCTS</h6>
								<ul class="footer-nav">
									<?php
										include "connect.php" ;
										$sql="select * from tb_type";
										$result=mysqli_query($c,$sql);

										while ($rs=mysqli_fetch_array($result)) {
												$id_type=$rs['id_type'];
												$name_type=$rs['name_type'];
												echo "<LI><A HREF='view_product.php?id=$id_type'>$name_type</A> </LI>";
											}
										mysqli_close($c);
									?>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>ADDRESS</h6>
								<p>Chiang Mai University</p>
								<p>239 Huay Kaew Road, Muang District, Chiang Mai, Thailand, 50200</p>
							</div>		
						</div>				
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">DEVELOPER</h6>
								<ul class="instafeed d-flex flex-wrap">
								 <p>NANTNAPAS SRASOM 610510622</p>
								 <p>BANDIT CHANGSOON 610510624</p>
								 <p>WACHIRAWUT YAGE 610510628</p>
								 <p>WICHAYUT MOONKEAW 610510633</p>
								</ul>
							</div>
						</div>						
					</div>
				</div>
			</footer>
		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/parallax.min.js"></script>			
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.DonutWidget.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>			
			<script src="js/main.js"></script>	
		</body>
	</html>