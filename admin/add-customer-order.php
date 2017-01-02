<?php if(!isset($_SESSION)){
	session_start();
	}
	if(!isset($_SESSION['adminId'])
			)
{
	header('Location: admin-login.php');
	}
	$adminId=$_SESSION['adminId'];
	require_once '../class/service/AdminService.php';
	$adminService = new AdminService();
	$userId=$_GET['userId'];
	$viewName=$adminService->viewUserById($userId);;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">    <link rel="stylesheet" href="/resources/demos/style.css">
<link href="../account-css/bootstrap.min.css" rel="stylesheet">
<link href="../account-css/datepicker3.css" rel="stylesheet">

<?php  include 'header.php'; ?>
			<!--notification menu end -->
			<style>
.services label > input{ /* HIDE RADIO */
  display:none;
}
.services label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
.services label > input:checked + img{ /* (CHECKED) IMAGE STYLES */
    background: #FFECC9;
    border-radius: 180px;
    padding: 5px;
    border: 1px solid #E6E6E6;
}
</style>
		<!-- //header-ends -->


			<div id="page-wrapper" style="height:2500px;">
				<div class="graphs">
					<h3 class="blank1">ADD CUSTOMER ORDER (<?php echo $viewName['FULL_NAME']; ?>)</h3>					<?php										if(isset($_GET['successAddOrder'])){	if($_GET['successAddOrder']==1){?>		<div style="    font-weight: bold;    color: mediumvioletred;    align-content: center;" >You Have Successfully Placed The  Order for Your Customer!!</div>	<?php }elseif($_GET['successAddOrder'] == 0){?>		<div><font color="red"><strong>Could Not Add. Please Try Again</strong></font></div>	<?php } ?>	<?php }?>	<br>
						<div class="tab-content" style="height: 2500px;">
						<div class="tab-pane active" id="horizontal-form" style="height: 2500px;">
							<form class="form-horizontal"  id="registerSubAdmin" action="../ajax/add-customer-order.php?userId=<?php echo $userId ?>" method="post" style="height: 2500px;">
								<label for="focusedinput" class="col-sm-2 control-label"> <script type="text/javascript" src="js/subAdmin.js"></script></label>
								<br>
								<br>
								<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Service(s)</label>
									<div class="col-sm-8">
										<label>
										 <input type="checkbox" name="types[]" id="flip" value="1" title="Wash & Fold">
										    <img src="../images/6.png" width="130" alt="Wash & Fold" title="Wash & Fold">
										  </label>
										  <label>
										 <input type="checkbox" name="types[]" id="flip" value="2" title="Ironing">
										    <img src="../images/7.png" width="130" alt="Ironing" title="Ironing">
										  </label>
										  <label>
										 <input type="checkbox" name="types[]" id="flip" value="3" title="Wash & Iron">
										    <img src="../images/8.png" width="130" alt="Wash & Iron" title="Wash & Iron">
										  </label>
										  <label>
										 <input type="checkbox" name="types[]" id="flip" value="4" title="Dry Clean">
										    <img src="../images/9.png" width="130" alt="Dry Clean" title="Dry Clean">
										  </label>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
  								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="date" id="cal" value="<?php echo date("m/d/Y"); ?>"  required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Time</label>
									<div class="col-sm-8">
										<select name="time" class="form-control1" id="schedule-time" required>
									<?php
									$d=date("H:i");
									date_default_timezone_set("Asia/Kolkata");
									if (($d <="07:29"))
									{ ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM </option>
									<?php } ?>
									<?php if(($d <="08:29")) { ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="09:29")) { ?>
									<option value="09:30:00 AM-10:29:59 AM">08:30:00 AM - 11:29:59 AM</option>
									<?php } ?>
									<?php  if(($d <="11:30")) { ?>
									<option value="11:30:00 AM - 1:29:59 PM">11:30:00 AM - 1:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="13:29")) { ?>
									<option  value="01:30:00 PM - 3:29:59 PM">01:30:00 PM - 3:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="15:29")) { ?>
									<option  value="03:30:00 PM - 5:29:59 PM">03:30:00 PM - 5:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="17:29")) { ?>
									<option  value="05:30:00 PM - 6:29:59 PM">05:30:00 PM - 6:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="18:29")) { ?>
									<option  value="06:30:00 PM - 7:29:59 PM">06:30:00 PM - 7:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="19:29")) { ?>
									<option  value="07:30:00 PM - 8:29:59 PM">07:30:00 PM - 8:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="20:29")) { ?>
									<option  value="08:30:00 PM - 9:30:59 PM">08:30:00 PM - 9:30:59 PM</option>
									<?php } ?>
									</select>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Delivery Date</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="delivery-date" id="delivery-date" value="<?php echo date('m/d/Y', strtotime('+2 days')); ?>"  required>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Delivery Time:</label>
									<div class="col-sm-8">
								<select name="delivery-time" class="form-control1" id="delivery-time" required>
									<?php
									$d=date("H:i");
									date_default_timezone_set("Asia/Kolkata");
									if (($d <="07:29"))
									{ ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM </option>
									<?php } ?>
									<?php if(($d <="08:29")) { ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="09:29")) { ?>
									<option value="09:30:00 AM-10:29:59 AM">08:30:00 AM - 11:29:59 AM</option>
									<?php } ?>
									<?php  if(($d <="11:30")) { ?>
									<option value="11:30:00 AM - 1:29:59 PM">11:30:00 AM - 1:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="13:29")) { ?>
									<option  value="01:30:00 PM - 3:29:59 PM">01:30:00 PM - 3:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="15:29")) { ?>
									<option  value="03:30:00 PM - 5:29:59 PM">03:30:00 PM - 5:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="17:29")) { ?>
									<option  value="05:30:00 PM - 6:29:59 PM">05:30:00 PM - 6:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="18:29")) { ?>
									<option  value="06:30:00 PM - 7:29:59 PM">06:30:00 PM - 7:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="19:29")) { ?>
									<option  value="07:30:00 PM - 8:29:59 PM">07:30:00 PM - 8:29:59 PM</option>
									<?php } ?>
									<?php if(($d <="20:29")) { ?>
									<option  value="08:30:00 PM - 9:30:59 PM">08:30:00 PM - 9:30:59 PM</option>
									<?php } ?>
									</select>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Message (If any)</label>
									<div class="col-sm-8">
										<textarea class="form-control1" name="message" rows="3"></textarea>
									</div>
									<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
								</div>
								
								
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn">Place Order</button>
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
   <script src="js/bootstrap.min.js"></script>
<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/bootstrap-table.js"></script>
	<script>
  $(function() {
    $( "#cal" ).datepicker();
    $("#delivery-date").datepicker();
  });
  </script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
		$.noConflict();
		
		$("#cal").change(function(){
			var obj = $(this);
			var str = obj.val();
 				$.ajax({
					type: "GET",
					url: "../ajax/get-time.php",
					data: "id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("schedule-time");
							selectObj.innerHTML = response;
					}
				}); 
			});

		$("#delivery-date").change(function(){
			var obj = jQuery(this);
			var str = obj.val();
 				jQuery.ajax({
					type: "GET",
					url: "../ajax/get-time.php",
					data: "type=delivery&id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("delivery-time");
							selectObj.innerHTML = response;
					}
				}); 
			});
	});
</script>
</body>
</html>