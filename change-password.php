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
<?php 
require_once 'class/service/UserService.php';
$userService= new UserService();
$editPassword=$userService->getPasswordByUserId($userId);
?>
<?php include 'account-header.php'; ?>

		
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
					<div class="panel-heading">Change Password</div>
					<?php if(isset($_GET['successUpdatePassword'])){
	if($_GET['successUpdatePassword']==1){?>
		<div class="succ">You Have Successfully Edited Your Password!!</div>
	<?php }elseif($_GET['successUpdatePassword'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php  } ?>
					<div class="panel-body">
							<form role="form" action="ajax/edit-password.php" method="post">
							
								<div class="form-group">
									<label>Current Password</label>
									<input type="text" value="<?php echo $editPassword['PASSWORD']; ?>"" name="oldPassword"  id="oldPassword" class="form-control">
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="password" value="" name="newPassword" required  id="newPassword" class="form-control">
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
