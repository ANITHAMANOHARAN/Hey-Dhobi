<?php include 'header.php'; ?>
 <script src="js/jquery.min.js"> </script>

<script type="text/javascript" src="js/register.js"></script>
	<!-- BANNER -->
	<!--<div class="section subbanner" style="background:url('images/register2.png') no-repeat center center;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="caption">
						<h3>Login / Sign Up</h3>
						<ol class="breadcrumb">
						  <li><a href="index.php">Home</a></li>
						  <li class="active">Create an Account</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>-->
	
	
	<!-- ABOUT SECTION -->
	<div id="services" class="section services">
		<div class="container">
			<!--  -->
			
			<div class="row raise">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						
											<?php if(isset($_GET['checkEmail'])){
	if($_GET['checkEmail']==1){?>
		<div class="succ">Your Password Has Been Sent Via Email Please Check Your Inbox</div>
	<?php }elseif($_GET['checkEmail'] == 0){?>
		<div class="err">There is no such user in the system</div>
	<?php } }?>
					</div>
				</div>
			</div>
			
	
			<div class="row pbot-main">
			
			<center>
<div class="col-sm-12 col-md-6" style="float: none;">
					<div class="page-title">
						<h2 class="lead1">FORGOT PASSWORD</h2>
					</div>
				
					<form action="ajax/forgot-password.php" class="form-contact shake" id="register"  method="post" data-toggle="validator">
				
						<div class="form-group">
							<input type="text" name="email" class="formin" id="zip" placeholder="Enter Your Email">
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<div id="success"></div>
							<button type="submit" class="btn btn-default">SEND</button>
						</div>
					</form>
					
					
				</div>
				
				
				</center>
				
				
			</div>
			
			
			
		</div>
	</div>
	
	
	<?php include 'footer.php'; ?>