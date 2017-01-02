<?php
if(!isset($_SESSION))
{
	ob_start();
	session_start();
}
$userId=$_SESSION['userId'];
if(!isset($userId))
{
	header('Location: account.php');
}
?>
<?php include 'account-header.php'; ?>
<?php 
require_once 'class/service/UserService.php';
$userService= new UserService();
$editUser=$userService->getUserByUserId($userId);
$viewSuburbs=$userService->viewSuburb();
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Account Settings</li>
			</ol>
		</div><!--/.row-->
		
		<!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Profile</div>
<?php if(isset($_GET['successUserUpdate'])){
	if($_GET['successUserUpdate']==1){?>
		<div class="succ">You Have Successfully Edited Your Profile!!</div>
	<?php }elseif($_GET['successUserUpdate'] == 0){?>
		<div class="fail">Could Not Edit</div>
	<?php } ?>
	<?php  } ?>					
					<div class="panel-body">
							<form action="ajax/edit-profile.php" method="post">
							
								<div class="form-group">
									<label>Full name</label>
									<input type="text" value="<?php echo $editUser['FULL_NAME']; ?>" name="fullName" id="name" class="form-control" required>
								</div>
																
								<div class="form-group">
									<label>Mobile Number</label>
									<input type="number" name="mobileNumber" value="<?php echo $editUser['MOBILE_NUMBER']; ?>" id="mobileNumber" required class="form-control">
								</div>
								
								
									<div class="form-group">
										<label> Suburb</label>
							<select class="form-control" id="city" name="suburb">
					<?php foreach ($viewSuburbs as $viewSuburb)

					{?>

					<option value="<?php echo $viewSuburb['SUBURB_ID']; ?> "  <?php print($viewSuburb['SUBURB_ID'] == $editUser['SUBURB'] ? ' selected="selected"' : ""); ?> > <?php echo $viewSuburb['SUBURB']; ?> </option>

					<?php } ?>
							</select>
							
							<div class="help-block with-errors"></div>
						</div>
								
								<div class="form-group">
									<label>Landmark</label>
									<input type="text" name="landmark" id="suburb" value="<?php  echo $editUser['LANDMARK']; ?>" class="form-control" required>
								</div>

								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" rows="3" name="address" id="address" required><?php echo $editUser['ADDRESS']; ?></textarea>
								</div>
								<div class="form-group">
									<label>Zip Code</label>
									<input type="number" name="zip" value="<?php echo $editUser['ZIP']; ?>" id="mobileNumber" required class="form-control">
								</div>
							<button type="submit" class="btn btn-primary">Update Profile</button>
								</form>
								
					</div>
					</div>
				</div>
			</div>
	
	
	
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
