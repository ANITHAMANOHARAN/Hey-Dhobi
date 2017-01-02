<?php 
if(!isset($_SESSION))

{

	session_start();

}

if(!isset($_SESSION['adminId']))

{

	header('Location: admin-login.php');

}

$adminId=$_SESSION['adminId'];

?>

<?php  include 'header.php'; ?><?php require_once '../class/service/UserService.php';$userService = new UserService();$viewSuburbs=$userService->viewSuburb();?>
			<!--notification menu end -->
			
		<!-- //header-ends -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 


			<div id="page-wrapper">
				<div class="graphs"><?php if(isset($_GET['successUserRegistration']) && $_GET['successUserRegistration']==1){?>	<div class="succ"> You Have Successfully Registered The User.....!!!!</div>	<?php } ?>
					<h3 class="blank1">ADD CUSTOMER</h3>
					<script src="js/jquery.min.js"> </script>
					
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal"  id="registerSubAdmin" action="../ajax/add-customer.php" method="post">
								<label for="focusedinput" class="col-sm-2 control-label"> <script type="text/javascript" src="js/subAdmin.js"></script></label>
								<br>
								<br>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Customer Full Name</label>
									<div class="col-sm-8">
										<input type="text" name="fullName"  class="form-control1" id="name" placeholder="Enter Full Name" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
  								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="email" name="email" id="email" class="form-control1" placeholder="Example@gmail.com" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter Mobile Number</label>
									<div class="col-sm-8">
										<input type="text" name="mobileNumber" id="email" maxlength="10" class="form-control1" placeholder="Enter Mobile Number" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter City</label>
									<div class="col-sm-8">
										<input type="text" name="city" id="email" class="form-control1" placeholder="Enter City" value="Pune" readonly>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Suburb</label>
									<div class="col-sm-8">
									<select class="form-control1" id="city" name="suburb">
							<option value="">-Select Suburb-</option>
							<?php foreach($viewSuburbs as $viewSuburb) { ?>
							<option value="<?php echo $viewSuburb['SUBURB_ID']; ?>"><?php echo $viewSuburb['SUBURB']; ?></option>
							<?php } ?>
							
							</select>
										
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter Address</label>
									<div class="col-sm-8">
										<input type="text" name="address" id="email" class="form-control1" placeholder="Enter Address">
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter Landmark</label>
									<div class="col-sm-8">
										<input type="text" name="landmark" id="email" class="form-control1" placeholder="Enter Landmark" >
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Enter Zip</label>
									<div class="col-sm-8">
										<input type="text" name="zip" id="email"  maxlength="6" class="form-control1" placeholder="Enter Zip">
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="password" placeholder="Password" name="password" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn">Submit</button>
								</div>
							</div>
						 </div>		
							</form>
						</div>
					</div>
				</div>
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2016 HeyDhobi. All Rights Reserved | Design by <a href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>