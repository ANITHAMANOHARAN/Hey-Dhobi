<?php include 'header.php'; ?>
<?php 
require_once 'class/service/UserService.php';
$userService = new UserService();
$viewSuburbs=$userService->viewSuburb();
?>
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
						<h2 class="lead1">LET'S SAY HEY DHOBI!</h2>
						<p class="sublead">We will be happy to have you on board! Our Expert dhobi's are all set to help you!</p>
							<?php if(isset($_GET['success']) && $_GET['success']==1){?>
	<div class="succ">You have successfully Verified Your Account Please Continue To Login</div>
	<?php }  ?>
	
	<?php if(isset($_GET['successUserRegistration']) && $_GET['successUserRegistration']==1){?>
	<div class="succ"> Welcome...!!Please Verify Your Account  And Enjoy Our Service...!!!</div>
	<?php } ?>
	
					</div>
				</div>
			</div>
			
			
			<div class="row pbot-main">
<div class="col-sm-12 col-md-6">
					<div class="page-title">
						<h2 class="lead1">SIGN UP</h2>
					</div>
				
					<form action="ajax/add-user.php" class="form-contact shake" id="register"  method="post" data-toggle="validator">
				<div id="msg"></div>
					<div class="form-group">
							<input type="text" class="formin" id="name"  name="fullName" placeholder="Enter Full Name *" required>
							<div class="help-block with-errors"></div>
							<input type="hidden" value="Maharashtra" name="state">
						</div>
						<div class="form-group">
							<input type="email" class="formin" id="email" name="email" placeholder="Enter Email *" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<input type="number"  maxlength="10" size="10"  class="formin" id="email"  min="1111111111" max="9999999999" name="mobileNumber" placeholder="Enter Mobile Number *" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<input type="text" class="formin" id="city" name="city" value="Pune" readonly placeholder="Enter City *">
							<div class="help-block with-errors"></div> 
						</div>
						<div class="form-group">
							<select class="formin" id="city" name="suburb" required>
							<option value="">-Select Suburb-</option>
							<?php foreach($viewSuburbs as $viewSuburb) { ?>
							<option value="<?php echo $viewSuburb['SUBURB_ID']; ?>"><?php echo $viewSuburb['SUBURB']; ?></option>
							<?php } ?>
							
							</select>
							
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
						<textarea rows="2" cols="2" class="formin" name="address" placeholder="Enter Address *"></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
						<input type="text" class="formin" id="landmark" name="landmark" placeholder="Enter Landmark *" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<input type="number" name="zip" class="formin" id="zip" placeholder="Enter Zip">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="formin" id="password" placeholder="Enter Password *">
							<div class="help-block with-errors"></div>
						</div> 
						<div class="form-group">
							<div id="success"></div>
							<button type="submit" class="btn btn-default">REGISTER</button>
						</div>
					</form>
					
					
				</div>
				
				<div class="col-sm-12 col-md-6">
					<div class="page-title">
					<?php if(isset($_GET['login-success'])){
	if($_GET['login-success']==0){?>
		<div class="err">Please enter valid password.</div>
	<?php }elseif($_GET['login-success'] == -1){?>
		<div class="err">There is no such user in the system</div>
	<?php } elseif($_GET['login-success'] == -2){?>
		<div class="err">Email verification pending.</div>
	<?php }}?>
		 <?php if(isset($_GET['successEnquiry'])){
	if($_GET['successEnquiry']==1){?>
		<div>You Have Successfully Sent An enquiry!!</div>
	<?php }elseif($_GET['successEnquiry'] == 0){?>
		<div class="err">Could Not Send</div>
	<?php } ?>
	<?php  } ?>
						<h2 class="lead1">LOGIN</h2>
					</div>
					<form action="ajax/user-login.php"  method="post" class="form-contact shake" id="contactForm"  data-toggle="validator">
						<div class="form-group">
							<input type="email" class="formin" name="email" id="email" placeholder="Enter Email *" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<input type="password" class="formin" id="pass" name="password" placeholder="Enter Password">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<a href="forgot-password.php"> Forgot Password</a>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<div id="success"></div>
							<button type="submit" class="btn btn-default">LOGIN</button>
						</div>
					</form>
					
					
				</div>
				
				
				
				
			</div>
			
			
			
		</div>
	</div>
	
	
	<?php include 'footer.php'; ?>