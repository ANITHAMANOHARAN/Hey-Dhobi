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
<?php include 'header.php'; ?>

<?php
$subAdminId=$_GET['subAdminId'];
require_once '../class/service/AdminService.php';
$adminService=new AdminService();
$editSubAdmin=$adminService->getSubAdminById($subAdminId);
?>
			<!--notification menu end -->
			
		<!-- //header-ends -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 


			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">EDIT SUB ADMIN</h3>
					<script src="js/jquery.min.js"> </script>
					
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal"  id="registerSubAdmin" action="../ajax/update-sub-admin.php?subAdminId=<?php echo $editSubAdmin['ADMIN_ID']; ?>" method="post">
								<label for="focusedinput" class="col-sm-2 control-label"> <script type="text/javascript" src="js/subAdmin.js"></script></label>
								<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label"> Sub-Admin Name</label>
									<div class="col-sm-8">
										<input type="text" name="name" value="<?php echo $editSubAdmin['ADMIN_NAME']; ?>"  class="form-control1" id="name" placeholder="Name" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
  								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="email" name="email" id="email" class="form-control1" id="focusedinput" value="<?php echo $editSubAdmin['ADMIN_EMAIL']; ?>" required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn">Submit</button>
									<button class="btn-inverse btn">Reset</button>
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
			   <p>&copy 2016 HeyDhobi All Rights Reserved | Design by <a href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a></p>
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