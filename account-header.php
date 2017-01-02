<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hey Dhobi - Dashboard</title>

<link href="account-css/bootstrap.min.css" rel="stylesheet">
<link href="account-css/datepicker3.css" rel="stylesheet">
<link href="account-css/styles.css" rel="stylesheet">
<link href="account-css/bootstrap-table.css" rel="stylesheet">
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/php5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php
				require_once 'class/service/UserService.php';
				$userService = new UserService();
				$viewName=$userService-> getUserByUserId($userId);
				
				if(isset($_SESSION['userId'])) { ?>
				<a class="navbar-brand" href="#"><b>Hey</b> <?php echo $viewName['FULL_NAME']; ?> !</a>
				<?php } ?>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Settings <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="ajax/user-logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<a href="index.php"><img src="images/final-logo.png" alt="" class="ulog" /></a>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="schedule-a-pickup.php"><svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></svg>
 Schedule A Pickup</a></li>		
				<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Account Settings</span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="edit-profile.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Edit Profile
						</a>
					</li>
					<li>
						<a class="" href="change-password.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Change Password 
						</a>
					</li>
				</ul>
			</li>
			
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Order Management </span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="order-management.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Active Orders
						</a>
					</li>
					<li>
						<a class="" href="order-history.php">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Completed orders 
						</a>
					</li>
				</ul>
			</li>
			
			
			
			<li role="presentation" class="divider"></li>
			<li><a href="index.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		<!--/.row-->
	