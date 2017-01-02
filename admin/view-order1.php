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

<?php  include 'header.php'; ?>
<?php 
require_once '../class/service/AdminService.php';
require_once '../class/service/OrderService.php';
require_once '../class/service/UserService.php';
$adminService= new AdminService();
$orderService= new OrderService();
$userService = new UserService();
$viewOrders= $adminService->viewOrdersPending();
$viewTypes=$orderService->viewTypes();


?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
				<?php if(isset($_GET['confirmOrder'])){
	if($_GET['confirmOrder']==1){?>
		<div  id="succ" class="succ">You Have Successfully Confirmed the order!!</div>
	<?php }elseif($_GET['confirmOrder'] == 0){?>
		<div class="fail">Could Not  Confirm</div>
	<?php } ?>
	<?php  } ?>
	<?php if(isset($_GET['processOrder'])){
	if($_GET['processOrder']==1){?>
		<div id= "succ" class="succ">You Have Successfully Processed The Order!!</div>
	<?php }elseif($_GET['processOrder'] == 0){?>
		<div class="fail">Could Not Process The Order</div>
	<?php } ?>
	<?php  } ?>
	<?php if(isset($_GET['completeOrder'])){
	if($_GET['completeOrder']==1){?>
		<div id="succ" class="succ">You Have Successfully Completed The Order!!</div>
	<?php }elseif($_GET['completeOrder'] == 0){?>
		<div class="fail">Could Not Complete The Order</div>
	<?php } ?>
	<?php  } ?>
	
	<?php if(isset($_GET['successAddCost'])){
	if($_GET['successAddCost']==1){?>
		<div id="succ" class="succ">You Have Added the Rate!!</div>
	<?php }elseif($_GET['successAddCost'] == 0){?>
		<div class="fail">Could Not Add the Cost</div>
	<?php } ?>
	<?php  } ?>
					<h3 class="blank1">PENDING ORDER(S)</h3>
					<?php if(sizeof($viewOrders)==0) { ?><h2> Sorry No Orders To Display....!!!!</h2><?php } ?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<?php if(sizeof($viewOrders)==0) { ?>
						<div> Sorry No Data To Display....!!!! </div>
						<?php } ?>
						<table class="table">
						  <thead>
							<tr>
							  
							  <th>Order ID</th> 
							 <th>Name/Mobile</th>
							 <th> Address </th>						 
							  <th>Order Date/Time</th>
							  <th>Delivery Date/Time</th>
							  <th>Service </th>
							  <th>Coupon/Cost</th>
							  <th>Status</th>
							  <th>Add Cost </th>
							  <th>Process Orders</th>
							  <th>Complete Order</th>
							
							</tr>
						  </thead>
						  <tbody>
						  
						  <?php  foreach ($viewOrders as $viewOrder) {
						  	$viewUserName=$userService->getUserByUserId($viewOrder['USER_ID']);
						  	?>
							<tr class="active">
							  
							  <td><b>HD</b><?php echo $viewOrder['ORDER_ID']; ?></td>
							  <td><?php echo $viewUserName['FULL_NAME']; ?><br />
							  <b><?php ECHO $viewUserName['MOBILE_NUMBER']; ?></b></td>
							  <?php  $viewSuburb=$userService->viewSuburbById($viewUserName['SUBURB']); ?> 
							  <TD><?php ECHO $viewUserName['ADDRESS'].", ". $viewSuburb['SUBURB'].", ".$viewUserName['ZIP']; ?> </TD>	
							  <td><?php echo $viewOrder['DATE']."<br><b>Time :</b> <br>".$viewOrder['TIME']; ?></td>
							   <td><?php echo $viewOrder['DELIVERY_DATE']."<br><b>Time :</b> <br>".$viewOrder['DELIVERY_TIME']; ?></td>
							  <td> <?php $focus=explode(",", $viewOrder['TYPES']); ?>
							<?php  foreach ($viewTypes as $viewType) {
								if(in_array($viewType['TYPE_ID'],$focus)) { ?>
								<p><?php echo $viewType['TYPE'];?>
								<?php } ?>							
							   <?php } ?></td>
							   <td><?php echo $viewOrder['COUPON']; ?><br /><a href="view-cost-order.php?orderId=<?php echo $viewOrder['ORDER_ID']; ?>">View Cost</a></td>
							  <td><?php echo $viewOrder['STATUS']; ?></td>
							  <td><a href="view-single-order.php?orderId=<?php echo $viewOrder['ORDER_ID'] ?>" class="btn-success btn">Update</a></td>
							  <td><a href="../ajax/process-order.php?orderId=<?php echo $viewOrder['ORDER_ID'] ?>" class="btn-success btn">Process</a></td>
							  <td><a href="../ajax/complete-order.php?orderId=<?php echo $viewOrder['ORDER_ID'] ?>" class="btn-success btn">Complete</a></td>
							
							</tr>
							<?php } ?>
						  </tbody>
						</table>
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