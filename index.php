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
								<li><a href="#home">Home</a></li>
								<li><a href="#new">New</a></li>
								<li><a href="#hot">BEST SELLER</a></li>
								<li><a href="#products">All Products</a></li>
								<li><a href="admin.php">STAFF</a></li>
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
				</nav>
			</header>

			<section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header-bg.jpg">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen  d-flex align-items-center justify-content-end">
						<div class="banner-content col-lg-6 col-md-12">
							<h1>
								HOW  <br>
								<span>TO </span> ORDER <br>						
							</h1>
							<a href="order.php" class="genric-btn danger circle">Cick!</a>
						</div>												
					</div>
				</div>
			</section>

			<section class="project-area section-gap" id="new">
			<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">NEW!</h1>
							</div>
						</div>
					</div>					
					<div class="row">
						<?php
							include "connect.php";
							$sql="select * from tb_product order by id_prd desc limit 0,4";
							$result=mysqli_query($c,$sql);
							while ($rs=mysqli_fetch_array($result)) {
								$id_prd=$rs['id_prd'];
								$code=sprintf("%05d",$id_prd);
								$name_prd=$rs['name_prd'];
								$detail_prd=$rs['detail_prd'];
								$ref_id_type=$rs['ref_id_type'];
								$price_prd=$rs['price_prd'];
								$photo_prd=$rs['photo_prd'];

								if ($photo_prd=="") {
									$photo_prd="temp.jpg";
								}
								echo "
									<div class='col-lg-3 col-md-6 single-blog'>
										<IMG class='img-fluid' SRC='photo/$photo_prd' alt=''> 
											<p class='date'>$price_prd BAHT</p>
											<h4><a href='view.php?id_prd=$id_prd'>$name_prd </a></h4>
										<div class='meta-bottom d-flex justify-content-between'>
											<p><span class='lnr lnr-heart'></span>
												<A HREF='view.php?id_prd=$id_prd'> VIEW </A>
											</p>
											<p><span class='lnr lnr-cart'></span>	  
												<A HREF='basket_add.php?id_prd=$id_prd'>Add to cart </A>
											</p>
										</DIV>
									</DIV>";
								}
							?>  	
						</div>
				</div>		
			</section>

			<section class="team-area section-gap" id="hot">
			<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">BEST SELLER!</h1>
							</div>
						</div>
					</div>					
					<div class="row">
						<?php
							include "connect.php";
							$sqlb="select ref_id_prd ,sum(number) AS sm from tb_order_detail group by ref_id_prd order by sm DESC limit 0,4 ";
							$resultb=mysqli_query($c,$sqlb);
							while ($rsb=mysqli_fetch_array($resultb)) {
								$ref_id_prd=$rsb['ref_id_prd'];
								$number_order=$rsb['sm'];
			
								$sqlb2 = "select * from tb_product where id_prd='$ref_id_prd' ";
								$resultb2 = mysqli_query($c, $sqlb2);
								$rsb2 = mysqli_fetch_array($resultb2);
								$name_prd2=$rsb2['name_prd'];
								$price_prd2=$rsb2['price_prd'];
								$r_id2=$rsb2['ref_id_type'];
								$r_photo2=$rsb2['photo_prd']; 



								echo "
									<div class='col-lg-3 col-md-6 single-blog'>
										<IMG class='img-fluid' SRC='photo/$r_photo2' alt=''>
											<p class='date'>$price_prd2 BAHT</p>
											<h4><a href='view.php?id_prd=$ref_id_prd'>$name_prd2 </a></h4>
	
										<div class='meta-bottom d-flex justify-content-between'>
											<p><span class='lnr lnr-heart'></span>
												<A HREF='view.php?id_prd=$ref_id_prd'> VIEW </A>
											</p>
											<p><span class='lnr lnr-pointer-right'></span>	  
												<A HREF='view.php?id_prd=$ref_id_prd'>$number_order</A>
											</p>
											<p><span class='lnr lnr-cart'></span>	  
												<A HREF='basket_add.php?id_prd=$ref_id_prd'>Add to cart </A>
											</p>
										</DIV>
									</DIV>";
								}
							?>  	
						</div>
					</div>
			</section>
		
			<section class="blog-area section-gap" id="products">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">All PRODUCTS</h1>
							</div>
						</div>
					</div>					
					<div class="row">
						<?php
							include "connect.php";
							$sql="select * from tb_type";
							$result=mysqli_query($c,$sql);
							while ($rs=mysqli_fetch_array($result)) {
								$id_type=$rs['id_type'];
								$name_type=$rs['name_type'];
			
								$sqlg2 = "select ref_id_type , photo_prd from tb_product where ref_id_type='$id_type' order by id_prd DESC";
								$resultg2 = mysqli_query($c, $sqlg2);
								$rsg2 = mysqli_fetch_array($resultg2);
								$r_id=$rsg2['ref_id_type'];
								$r_photo=$rsg2['photo_prd']; 
								$r_sum=$rsg2['sump'];

								$sqlg3 = "select count(id_prd) As s1 from tb_product where ref_id_type='$id_type' ";
								$resultg3 = mysqli_query($c, $sqlg3);
								$rsg3 = mysqli_fetch_array($resultg3);
								$r_sum=$rsg3['s1'];


								echo "
									<div class='col-lg-3 col-md-6 single-blog'>
										<IMG class='img-fluid' SRC='photo/$r_photo' alt=''>
										<h4><a href='view_product.php?id=$r_id'>$name_type </a></h4>		
										<div class='meta-bottom d-flex justify-content-between'>
											<p><span class='lnr lnr-heart'></span>
												<A HREF='view_product.php?id=$r_id'> VIEW PRODUCTS </A>
											</p>
											<p><span class='lnr lnr-pointer-right'></span>	  
												<A HREF='view_product.php?id=$r_id'>$r_sum </A>
											</p>
										</DIV>
									</DIV>";
								}
							?>  	
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