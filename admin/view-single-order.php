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
<?php
require_once '../class/service/AdminService.php';
require_once '../class/service/OrderService.php';
$adminService= new AdminService();
$orderService= new OrderService();
$orderId=$_GET['orderId'];
$viewDetail=$adminService->viewOrderById($orderId);
$viewUser=$adminService->viewUserById($viewDetail['USER_ID']);
?>
<?php include 'header.php'; ?>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}
th {
    background-color: #de55a6;
    color: white;
}
</style>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">VIEW ORDER</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="../ajax/admin-add-cost.php?orderId=<?php echo $viewDetail['ORDER_ID']; ?>" method="post" >
						<input type="hidden" value="<?php echo $viewUser['MOBILE_NUMBER']; ?>" name="cust_number" />
							<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Order ID</label>
									<div class="col-sm-8"><label>HD<?php echo $viewDetail['ORDER_ID']; ?></label></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Customer Name</label>
									<div class="col-sm-8"><label><?php echo $viewUser['FULL_NAME']; ?>/<?php echo $viewUser['MOBILE_NUMBER']; ?></label></div>
								</div>
								<div class="form-group">
								
								<?php
								$suburb=$viewUser['SUBURB'];
								$viewSuburb=$adminService->viewSuburbById($suburb); ?>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Customer Address</label>
									<div class="col-sm-8"><label><?php echo $viewUser['ADDRESS'].",".$viewSuburb['SUBURB'].",".$viewUser['CITY'].",".$viewUser['STATE']."-".$viewUser['ZIP']; ?></label></div>
								</div>
								
								
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Order Date</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['DATE']; ?></label></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Order Time</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['TIME']; ?></label> </textarea></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Order Delivery</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['DELIVERY_DATE']; ?></label> </textarea></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Delivery Time</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['DELIVERY_TIME']; ?></label> </textarea></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Service(s)</label>
									<div class="col-sm-8">
								<?php 	 ?>
								
								<label><?php
								$focus=explode(",",$viewDetail['TYPES']);
								
								$viewTypes=$orderService->viewTypes();
								foreach($viewTypes as $viewType){
									if(in_array($viewType['TYPE_ID'],$focus))
									  {?>
									  <p><?php echo $viewType['TYPE'];?> </p><br/>
									     <?php }
									
								}
								 ?></label> 
									</div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Other Service</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['OTHERS'] ?></label> </textarea></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Message</label>
									<div class="col-sm-8"><label><?php echo $viewDetail['MESSAGE'] ?></label></textarea></div>
								</div>
								
								<div class="form-group" align="center">
								
									<table border="1">
									<tr> 
									<th> Types </th>
									<th> Unit of Measurement </th>
									<th>Pieces/Weight </th>
									<th> Cost </th>
									<th>Specifications </th>
									</tr>
									
								  <?php 
								  
								  $viewTypes1=$orderService->viewTypes();
								  foreach($viewTypes1 as $viewType1){
								  	if(in_array($viewType1['TYPE_ID'],$focus))
								  	{
								  
								  if($viewType1['TYPE_ID']==1) { ?>
									<tr>
									<td> Wash & Fold </td>
									<td> Weight </td>
									<td><input type="text"  name="washAndFoldWeight"> kg</td>
									<td><input type="text" name="washAndFoldRate"> .Rs</td>
									<td> <textarea rows="" cols="" name="extraWashAndFold"></textarea> </td>
									</td>
									</tr>	
									
									<?php } ?>
									
									<?php if($viewType1['TYPE_ID']==2) { ?>
									<tr>
									<td>Ironing  </td>
									<td>Pieces </td>
									<td><input type="text"  name="ironingWeight">  </td>
									<td> <input type="text" name="ironingRate" > .Rs </td>
									<td><textarea rows="" cols="" name="extraIroning"></textarea> </td>
									
									</tr>	
									<?php } ?>
									<?php  if($viewType1['TYPE_ID']==3) { ?>
									<tr>
									<td> Wash & Iron </td>
									<td> Weight </td>
									<td><input type="text"  name="washAndIronWeight"> kg </td>
									<td> <input type="text" name="washAndIronRate" >.Rs</td>
									<td><textarea rows="" cols="" name="extraWashAndIron"></textarea> </td>
									</td>
									</tr>	
									<?php } ?>
									<tr>
									<?php  if($viewType1['TYPE_ID']==4){ ?>
									<td>Dry Clean </td>
									<td> Pieces </td>
									<td><input type="text"  name="dryAndCleanWeight">  </td>
									<td><input type="text" name="dryAndCleanRate">.Rs </td>
									<td><textarea rows="" cols="" name="extraDryClean"></textarea> </td>
									
									</td>
									</tr>				
									
									<?php  } } } ?>
									</table>
								</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn">Update</button>
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
			   <p>&copy 2016  Hey Dhobi. All Rights Reserved | Design by <a href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a></p>
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