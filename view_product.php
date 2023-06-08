<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  ob_start();

$id_type=$_GET['id'];
include "connect.php";
$sqlg4 = "select * from tb_type where id_type='$id_type' ";
$resultg4 = mysqli_query($c, $sqlg4);
$rsg4 = mysqli_fetch_array($resultg4);
$id_type2=$rsg4['id_type'];
$name_type2=$rsg4['name_type'];
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
								<li><a href=javascript:history.back()>BACK</a></li>	
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

			<section class="team-area section-gap" id="new">
			<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10"><?php echo "$name_type2"; ?></h1>
							</div>
						</div>
					</div>					
					<div class="row">
						<?php
							include "connect.php";
							$sql="select * from tb_product where ref_id_type='$id_type' order by id_prd desc";
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