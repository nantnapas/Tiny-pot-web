<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  ob_start();
?>
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<meta charset="UTF-8">
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
								<li><a href="javascript:history.back()">BACK</a></li>								
						    </ul>
						  </div>						
					</div>
				</nav>
			</header>

			<section class="team-area section-gap" id="order">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">HOW TO ORDER ... TINY POT</h1>
							</div>
						</div>
					</div>					

					<div class="col-lg-12 ">
					  	<p>						
							1. กรุณาสมัครสมาชิก  <A href='reg.php'> ที่นี่ </A> <br>
							2. ท่านสามารถดูสินค้าทั้งหมดของทางร้านได้ที่<b> All product</b> <br>
							3. ท่านสามารถดูรายละเอียดของสินค้าแต่ละชนิดโดยการเลือก <b>view</b> <br>
							4. เมื่อท่านต้องการซื้อสินค้ากรุณาเลือก <b>Add to basket</b> <br>
							5. ท่านสามารถแก้ไขจำนวนสินค้าที่ต้องการซื้อได้ที่หน้า basket <br>
							6. การชำระค่าสินค้าของทางร้าน มีเฉพาะการ<b>เก็บเงินปลายทางเท่านั้น</b>
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