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

$adminService= new AdminService();
$userId=$_GET['userId'];
$viewSubscriptions=$adminService->userSubscription($userId);
$viewName=$adminService->viewUserById($userId);

?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
				
					<h3 class="blank1">VIEW SUBSCRIPTION</h3>
					<h2>
					<?php echo $viewName['FULL_NAME']; ?>
					</h2>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  
							 <!-- <th>Clothes</th>-->
							
							  <th>Package Name</th>
							  <th>Load</th>
							  <th> Validitiy(days)  </th>
							  <th> Pricing </th>
							  <TH>Discount </TH>
							  <th> Start Date</th>
							  <th>Expire Date </th>
							  <th>Subscription Pricing</th>
							 <th>  Pick Ups </th>
							
							</tr>
						  </thead>
						  <tbody>
						  <?php  foreach ($viewSubscriptions as $viewSubscription) {
						  	
						  	$viewSuscriptionByIds=$adminService->viewSubscriptionById($viewSubscription['PACKAGE_ID']);
						  	foreach($viewSuscriptionByIds as $viewSuscriptionById)
						  	{
						  	
						  	?>
							<tr class="active">
							  
							  <?php /*?><td><?php echo $viewOrder['CLOTHES']; ?></td><?php */?>
							   <td><?php echo  $viewSuscriptionById['PACKAGE_NAME']; ?></td>
							   <td> <?php echo  $viewSuscriptionById['LOAD'];  ?>
							   <td> <?php echo  $viewSuscriptionById['VALIDITIY'];
							   $days=$viewSuscriptionById['VALIDITIY'];
							 
							  // $expireDate=$expireDate=date('d/m/Y', strtotime('+'. intval($days).'days'));
							   //ECHO $expireDate;
							   ?> </td>
							  <td><?php echo  $viewSuscriptionById['PRICING']; ?></td>
							  <td><?php echo  $viewSuscriptionById['DISCOUNT']; ?></td>
							  <td><?php
							  echo date("d/m/y",$viewSubscription['SUBSCRIPTION_DATE']);?>  </td>
							  <td><?php echo  $viewSubscription['EXPIRE_DATE']; ?> </td>
							  <td><?php echo  $viewSuscriptionById['SUBSCRIPTION_PRICING']; ?></td>
							  <td><?php echo  $viewSuscriptionById['PICK_UPS']; ?></td>
							</tr>
							<?php  }} ?>
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