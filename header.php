<?php
if(!isset($_SESSION))
{
	session_start();
}
$userId=$_SESSION['userId'];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HeyDhobi.com - Expert Dhobi Service</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content=""> 
	
	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- ==============================================
	CSS
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	
	
	<!-- ==============================================
	Google Fonts
	=============================================== -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,900' rel='stylesheet' type='text/css'>
	
	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--  	<script  src="js/lumino.glyphs.js"></script>
	
    <script type="text/javascript" src="js/modernizr.min.js"></script> -->
	
	<style>
	.letterA{
   color:#3399FF;
   animation:letterA 5s infinite;
   -webkit-animation:letterA 5s infinite; /* Safari and Chrome */
}
    @keyframes letterA
    {
    from {color:#3399FF;}
    to {color:#c05488;}
    }
    
    @-webkit-keyframes letterA /* Safari and Chrome */
    {
    from {color:#3399FF;}
    to {Color:#c05488;}
    }
	</style>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85372532-1', 'auto');
  ga('send', 'pageview');

</script>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N9JHBL');</script>
<!-- End Google Tag Manager -->
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9JHBL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<!-- Load page -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	
	
	<!-- NAVBAR SECTION -->
	<div class="navbar navbar-main navbar-fixed-top">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="info">
							<div class="info-item">
								<span class="fa fa-phone"></span> Call Us : 9396141414							</div>
							<div class="info-item">
								<span class="fa fa-envelope-o"></span> <a href="mailto:info@heydhobi.com" title="">Email :  contact@heydhobi.com</a>
								</div>
								
								<div class="info-item">
								
								<?php  require_once 'class/service/UserService.php';
								$userService= new UserService();
								$viewName=$userService-> getUserByUserId($userId);
								if(isset($_SESSION['userId'])) {
									?>
									<span class="fa fa-user"></span> <b>Hey! <?php echo  ucfirst($viewName['FULL_NAME']); ?></b>
								<?php }?> 
								</div>
								
								
								
						</div>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
						<div class="top-sosmed pull-right">
							<a href="https://www.facebook.com/heydhobi" title=""><span class="fa fa-facebook"></span></a>
							<a href="https://twitter.com/heydhobi" title=""><span class="fa fa-twitter"></span></a>
							<a href="https://www.instagram.com/heydhobi/" title=""><span class="fa fa-instagram"></span></a>						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>				</button>
				<a class="navbar-brand" href="index.php"><img src="images/final-logo.png" alt=""/></a>
				
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
					  <a href="index.php">Home</a>
					</li>
					<li><a href="about.php">ABOUT</a></li>
					<li class="dropdown"><a href="services.php"   data-hover="dropdown" aria-haspopup="true" aria-expanded="true">SERVICES <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="services.php#wf">Wash & Fold</a></li>
						<li><a href="services.php#if">Ironing & Folding</a></li>
						<li><a href="services.php#d">Dry Cleaning</a></li>
					  </ul>
					</li>
					<li><a href="pricing.php">PRICING</a></li>
					<!--<li><a href="#">FAQ</a></li>-->
					<!--<li><a href="blog.html">BLOG</a></li>-->
					<li><a href="contact.php">CONTACT</a></li>
					
				<?php  if(isset($_SESSION['userId'])) {  ?> 
				<li class="dropdown"><a href="services.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MY ACCOUNT <span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="schedule-a-pickup.php">Schedule a Pickup</a></li>
						<li><a href="order-management.php">My Orders</a></li>
						<li><a href="edit-profile.php">Update Profile</a></li>
						<li><a href="change-password.php">Update Password</a></li>
						<li><a href="ajax/user-logout.php">Log-Out</a></li>
					  </ul>
					</li>
				<?php } else {  ?>
					<li><a href="account.php"><img src="images/register.png" width="22" align="absmiddle" style="margin-bottom: -6px;"> LOGIN | SIGN UP</a></li>
				<?php }?>
				<li><a href="book-dhobi.php" class="letterA"><img src="images/book.png" width="22" align="absmiddle" style="margin-bottom: -6px;"> BOOK A DHOBI</a></li>
				</ul>
			</div>
		</div>
    </div>
 <?php if(isset($_GET['successUserUpdate'])){
	if($_GET['successUserUpdate']==1){?>
		<div class="succ">You Have Successfully Edited Your Profile!!</div>
	<?php }elseif($_GET['successUserUpdate'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php  } ?>
	<?php if(isset($_GET['successUpdatePassword'])){
	if($_GET['successUpdatePassword']==1){?>
		<div class="succ">You Have Successfully Edited Your Password!!</div>
	<?php }elseif($_GET['successUpdatePassword'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php  } ?>
	<?php if(isset($_GET['successAddOrder'])){
	if($_GET['successAddOrder']==1){?>
		<div class="succ">You Have Successfully Placed Your Order!!</div>
	<?php }elseif($_GET['successAddOrder'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php }?>
	<?php if(isset($_GET['successEnquiry'])){
	if($_GET['successEnquiry']==1){?>
		<div class="succ">You Have Successfully Sent An enquiry!!</div>
	<?php }elseif($_GET['successEnquiry'] == 0){?>
		<div class="fail">Could Not Send</div>
	<?php } ?>
	<?php  } ?>