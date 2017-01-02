
<!DOCTYPE HTML>
<html>
<head>
<title> Admin Dashboard | Hey Dhobi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.php"><span>Hey Dhobi</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.php"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="index.php"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>Dhobi Management</span></a>
								<ul class="sub-menu-list">
									<li><a href="add-sub-admin.php">Add Sub-Admin</a> </li>
									<li><a href="view-sub-admin.php">View Sub-Admin</a> </li>
									
									
								</ul>
							
									
							
						</li>
						
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>User Management</span></a>
								<ul class="sub-menu-list">
								<li><a href="user-management.php">View Customer(s)</a> </li>	
									<li><a href="add-customer.php">Add Customer</a> </li>					
								</ul>
							
									
							
						</li>
						
						
					<!--	<li><a href="user-management.php"><i class="lnr lnr-spell-check"></i> <span>User Management</span></a></li>-->
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>Enquiry Center</span></a>
								<ul class="sub-menu-list">
									<li><a href="view-enquiry.php">View Enquiry(s)</a> </li>
									
									
								</ul>
						</li>
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>Order Center</span></a>
								<ul class="sub-menu-list">
									
									<li><a href="view-order.php"> New Orders</a> </li>
									<li><a href="view-order1.php"> Pending Orders</a> </li>
									<li><a href="view-complete-order.php">Completed Orders</a> </li>
								</ul>
						</li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url no-repeat center"> </span> 
										 <div class="user-name">
											<p>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									 
									<li> <a href="../ajax/admin-logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					            	
					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->