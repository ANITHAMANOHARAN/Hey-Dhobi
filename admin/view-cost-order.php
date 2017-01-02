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
<SCRIPT LANGUAGE="JavaScript"> 
if (window.print) {
document.write('<input type=button name=print value="Print" onClick="window.print()" STYLE="DISPLAY:NONE;">');
}
</script>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">View Order <A HREF="javascript:window.print()" style="font-size:14PX; text-decoration:underline;">(PRINT ORDER)</A></h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="../ajax/admin-add-cost.php?orderId=<?php echo $viewDetail['ORDER_ID']; ?>" method="post" >
								
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Order ID</label>
									<div class="col-sm-8"><label>HD<?php echo $viewDetail['ORDER_ID']; ?></label></div>
								</div>
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">Customer Name</label>
									<div class="col-sm-8"><label><?php echo $viewUser['FULL_NAME']; ?></label></div>
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
									<th> Pieces/Weight </th>
									<th> Cost </th>
									<th> Specification </th>
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
									<td><label for="txtarea1" class="control-label"><?php 
									if(empty($viewDetail['WASH_AND_FOLD_W']))
									{
										echo "N/A";
									}
									else{
									echo $viewDetail['WASH_AND_FOLD_W'];
								  }
								  ?></label></td>
									<td><label for="txtarea1" class=" control-label"><?php 
									if(empty($viewDetail['WASH_AND_FOLD_R']))
									{
									echo "N/A";	
									}
									else
									{
									echo $viewDetail['WASH_AND_FOLD_R']; 
									}
									
									
									?></label></td>
									<td><label for="txtarea1" class=" control-label"><?php 
									if(empty($viewDetail['EXTRA_WASH_AND_FOLD']))
									{
									echo "N/A";	
									}
									else
									{
									echo $viewDetail['EXTRA_WASH_AND_FOLD']; 
									}
									
									
									?></label></td>
									
									</tr>	
									
									<?php } ?>
									
									<?php if($viewType1['TYPE_ID']==2) { ?>
									<tr>
									<td>Ironing  </td>
									<td>Pieces </td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php 
									
									IF(EMPTY($viewDetail['IRONING_W'])){
									ECHO "N/A";
									
									}
									ELSE {
									echo $viewDetail['IRONING_W'];  }  ?></label></td>
									
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php
									IF(EMPTY($viewDetail['IRONING_R'])){
										ECHO "N/A";
									}
									ELSE
									{
										
									echo $viewDetail['IRONING_R']; } ?></label></td>
									
									<td><?php
									IF(EMPTY($viewDetail['EXTRA_IRONING'])){
										ECHO "N/A";
									}
									ELSE
									{
										
									echo $viewDetail['EXTRA_IRONING']; } ?> </td>
									
									
									</tr>	
									<?php } ?>
									<?php  if($viewType1['TYPE_ID']==3) { ?>
									<tr>
									<td> Wash & Iron </td>
									<td> Weight </td>
									<?php if(empty($viewDetail['WASH_AND_IRON_R'])) { ?>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td>
									<?php }  else { ?>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo $viewDetail['WASH_AND_IRON_W']; ?></label></td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo $viewDetail['WASH_AND_IRON_R']; ?></label></td>
									<td><label for="txtarea1" class="control-label"><?php echo $viewDetail['EXTRA_WASH_IRON'];  ?></label></td>
									<?php } ?>
									</tr>	
									<?php }  ?>
									<tr>
									<?php  if($viewType1['TYPE_ID']==4){ ?>
									<td>Dry Clean </td>
									<td> Pieces </td>
									<?php IF(EMPTY($viewDetail['DRY_CLEAN_R'])) { ?>
									
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td> 
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo "N/A"; ?></label></td> 
										
									<?php } ELSE { ?>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo $viewDetail['DRY_CLEAN_W']; ?></label></td>
									<td><label for="txtarea1" class="col-sm-2 control-label"><?php echo $viewDetail['DRY_CLEAN_R']; ?></label></td> 
									<td><label for="txtarea1" class="control-label"><?php echo $viewDetail['EXTRA_DRY_CLEAN']; ?></label></td> 
									<?php } ?>
									</tr>				
									
									<?php  } } } ?>
									</table>
								</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									
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