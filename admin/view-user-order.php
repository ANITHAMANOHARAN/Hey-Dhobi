<?php 

if(!isset($_SESSION))

{

	session_start();

}

if(!isset($_SESSION['adminId']))

{

	header('Location: admin-login.php');

}
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$adminId=$_SESSION['adminId'];
$userId=$_GET['userId'];
$viewSubscriptions=$adminService->userSubscription($userId);
$viewName=$adminService->viewUserById($userId);
?>

<?php  include 'header.php'; ?>
<?php 
require_once '../class/service/AdminService.php';
require_once '../class/service/OrderService.php';
require_once '../class/service/UserService.php';
$adminService= new AdminService();
$orderService= new OrderService();
$userService = new UserService();
$userId=$_GET['userId'];
$viewOrders= $adminService->viewUserOrders($userId);
$viewTypes=$orderService->viewTypes();

?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
				
					<h3 class="blank1">VIEW ORDER (<?php echo $viewName['FULL_NAME']; ?>/<?php echo $viewName['MOBILE_NUMBER']; ?>)</h3>
					
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  
							  <th>Order ID</th> 
							 <th>Delivery Address </th>						 
							  <th>Order Date/Time</th>
							  <th>Delivery Date/Time</th>
							  <th>Service </th>
							  <TH>Cost </TH>
							  <th>Status</th>							
							</tr>
						  </thead>
						  <tbody>
						   <?php  foreach ($viewOrders as $viewOrder) {
						  	$viewUserName=$userService->getUserByUserId($viewOrder['USER_ID']);
						  	?>
							<tr class="active">
							  
							  <td><b>HD</b><?php echo $viewOrder['ORDER_ID']; ?></td>
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
							  <td><a href="view-cost-order.php?orderId=<?php echo $viewOrder['ORDER_ID']; ?>"> View Cost</a></td>
							  <td><?php echo $viewOrder['STATUS']; ?></td>
							 >
						
							
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