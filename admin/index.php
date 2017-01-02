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


<?php  include 'header.php';?>

<?php 
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$viewUserCount=$adminService->countUser();
$viewNewOrder=$adminService->newOrder();
$viewPendingOrder=$adminService->countPendingOrder();
$countEnquiry=$adminService->countEnquiry();

?>

 		<!-- //header-ends -->
			<div id="page-wrapper">
		 <?php if(isset($_GET['successUser'])){
	if($_GET['successUsers']==1){?>
		<div>You Have Successfully Edited Your Profile!!</div>
	<?php }elseif($_GET['successUser'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php  } ?>
	<?php if(isset($_GET['successAddSubAdmin'])) { ?>
				<?php if($_GET['successAddSubAdmin']==1) { ?>
				<h3> You Have Successfully Added the Sub-Admin</h3>
				<?php } ?>
				<?php if($_GET['successAddSubAdmin']==0) {  ?>
				<h3> Sorry Could Not Reply</h3>
				<?php  } } ?>

				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5><?php echo $viewNewOrder['TOTAL']; ?> <span></span></h5>
								  <div class="grow">
									<p>New Orders</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5><?php echo $viewUserCount['TOTAL'];  ?> <span></span></h5>
								  <div class="grow grow1">
									<p>New Users</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5><a href="add-customer.php" style="font-size:16px;" class="btn-success btn">Add New Customer</a></h5>
								  <div class="grow grow3">
									<p>Add Customer</p>
								  </div>
								</div>
							</div>
						 </div>
						 <div class="col-md-3 widget">
							<div class="r3_counter_box">
								<i class="fa fa-comment"></i>
								<div class="stats">
								  <h5><?php echo $countEnquiry['TOTAL']; ?> <span></span></h5>
								  <div class="grow grow2">
									<p>Enquiry</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		
		<!-- //switches -->
		
				</div>
				
				<br /><br />
				
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="view-order.php" style="font-size: 16px;" class="btn-success btn">NEW ORDERS</a> <span></span></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="view-order1.php" style="font-size: 16px;" class="btn-success btn">PENDING ORDERS</a> <span></span></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="view-complete-order.php" style="font-size: 16px;" class="btn-success btn">COMPLETED ORDERS</a> <span></span></h5>			  
								</div>
							</div>
						 </div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="user-management.php" style="font-size: 16px;" class="btn-success btn">VIEW CUSTOMERS</a> <span></span></h5>
								</div>
							</div>
						</div>
						
						<div class="clearfix"> </div>
						</div>
						</div>
						<div class="graphs" style="margin-top:30PX;">
					<div class="col_3">
					<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="add-customer.php" style="font-size: 16px;" class="btn-success btn">ADD CUSTOMER</a> <span></span></h5>
								</div>
							</div>
						</div>
						 <div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="view-enquiry.php" style="font-size: 16px;" class="btn-success btn">VIEW ENQUIRIES</a> <span></span></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="add-sub-admin.php" style="font-size: 16px;" class="btn-success btn">ADD SUB-ADMIN</a> <span></span></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<div class="stats">
								  <h5><a href="view-sub-admin.php" style="font-size: 16px;" class="btn-success btn">VIEW SUB-ADMIN</a> <span></span></h5>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		
		<!-- //switches -->
		
				</div>
				
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
		<?php include 'footer.php'; ?>
        