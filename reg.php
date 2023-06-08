<?php
 error_reporting(E_ALL ^ E_NOTICE);
 session_start(); 
 ob_start(); 

if ($_SESSION['user'] == "") {
 	$verify_login = "กรุณาลงทะเบียนสมัครสมาชิกก่อนการสั่งซื้้อสินค้า";
}
else {
	$verify_login = $_SESSION['user'] ;
}

  include "connect.php";
  $strSQL = "SELECT * FROM member WHERE user = '$_SESSION[codeuser]'";
  $objQuery = mysqli_query($c,$strSQL);
  $objResult = mysqli_fetch_array($objQuery);
  $address=$objResult['address'];
  $email=$objResult['email'];
  $tel=$objResult['tel'];

  @$id_prd=$_GET['id_prd'];
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

<script language="JavaScript">
		document.onkeydown = chkEvent //*** ห้ามกด Enter ***//
		function chkEvent(e) 
		{
			var keycode;
			if (window.event) keycode = window.event.keyCode; //*** for IE ***//
			else if (e) keycode = e.which; //*** for Firefox ***//
			if(keycode==13)
			{
				return false;
			}
		}

		function fncSubmit()
            {
				if(document.frmMain.user.value == "") //กรณีเป็นการเลือกข้อมูล "0"
				{
						alert('USERNAME?');
						document.frmMain.user.focus();
						return false;
				}
				if(document.frmMain.pass.value == "")
				{
						alert('PASSWORD?');
						document.frmMain.pass.focus();
						return false;
				}    
				if(document.frmMain.flname.value == "") //กรณีค่าว่าง ""
				{
						alert('NAME - LAST NAME?');
						document.frmMain.flname.focus();
						return false;
				}   
					if(document.frmMain.address.value == "")
				{
						alert('ADDRESS?');
						document.frmMain.address.focus();
						return false;
				}   
					if(document.frmMain.email.value == "")
				{
						alert('EMAIL?');
						document.frmMain.email.focus();
						return false;
				} 

					if(document.frmMain.tel.value == "")
				{
						alert('TELEPHONE?');
						document.frmMain.tel.focus();
						return false;
				}                    
				document.form1.submit();
            }
</script>    

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
								<li><a href="javascript:history.back();">BACK</a></li>	
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
								<h1 class="mb-10">REGISTER MEMBER</h1>
								<b class="text-danger"><?php echo "$verify_login ";?></b>
							</div>
						</div>
					</div>
					<form class="form" name='frmMain' method="post" action="reg_add.php" ENCTYPE='multipart/form-data'  onSubmit='JavaScript:return fncSubmit();'>		
						<div class="row"> 			
								<div class="col-lg-3">
									<div class="form-group">
										<label for="exampleInputPassword1">USERNAME</label>
										<input type="text" class="form-control" id="user" name="user"  autocomplete="off"  placeholder="USERNAME">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">PASSWORD</label>
										<input type="text" class="form-control" id="pass" name="pass"  autocomplete="off" placeholder="PASSWORD">
									</div>
								</div>   
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputName">NAME - LAST NAME</label>
										<input type="text" class="form-control" id="flname" name="flname" autocomplete="off" placeholder="NAME - LAST NAME">
									</div>   				             
									<div class="form-group">
										<label for="exampleInputAddress">ADDRESS</label>
										<input type="text" class="form-control" id="address" name="address" autocomplete="off"  placeholder="ADDRESS">
									</div>
								</div>   
								<div class="col-lg-3">								
									<div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" class="form-control" id="email" name="email" autocomplete="off"  placeholder="Enter email">
									</div>						
									<div class="form-group">
										<label for="exampleInputTel">TELEPHONE</label>
										<input type="text" class="form-control" id="tel" name="tel" autocomplete="off"  placeholder="TELEPHONE">
									</div>
								</div>
							</div>
							<div class="col-lg-12 text-center">
							<input class="btn btn-info"  TYPE="submit" NAME="Submit" VALUE="Submit">
							</div>
						</form>									
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