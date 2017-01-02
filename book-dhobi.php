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
<?php include 'header.php'; ?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="account-css/datepicker3.css" rel="stylesheet">
<?php
require_once 'class/service/OrderService.php';
$orderService= new OrderService();
$viewCount=$orderService->countPendingOrder($userId);
$viewCompleted=$orderService->countCompletedOrder($userId);
$viewTypes=$orderService->viewTypes();
?>
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
	<!-- BANNER -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script type="text/javascript">
	$(document).ready(function(){
		$.noConflict();
		
		$("#cal").change(function(){
			var obj = $(this);
			var str = obj.val();
			var date = new Date(str);
			var newdate= new Date(date);
			 newdate.setDate(newdate.getDate() + 2);
			    
			    var dd = newdate.getDate();
			    var mm = newdate.getMonth() + 1;
			    var y = newdate.getFullYear();
   				var del = mm + '/' + dd + '/' + y;
			$("#delivery-date").val(del);
			 getDelTime(del);
 				$.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("schedule-time");
							selectObj.innerHTML = response;
					}
				}); 
			});
		$("#delivery-date").change(function(){
			getDelTime(del);
			});
		function getDelTime(del)
		{
			//alert(del);
 				jQuery.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "type=delivery&id="+del,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("delivery-time");
							selectObj.innerHTML = response;
					}
				});
		}
		$('#schedule-time').change(function() {
			    $('#delivery-time').val($(this).val());
			});
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 
<script>
jQuery(document).ready(function(){
  $("#msg").hide();
  jQuery("#submit").click(function(){
    if($('.check:checked').length == 0)
    {
      $("#msg").html("Please select atleast one");
      $("#msg").show();
      return false;
    }
    else
    {
      $("#msg").hide();
    }
  });
});
</script>
	<!--<div class="section subbanner" style="background:url('images/pricing.jpg') no-repeat center center;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="caption">
						<h3>Schedule a Pickup</h3>
						<ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="active">Book A Dhobi</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<div id="services" class="section services">
		<div class="container">
			<div class="row raise">
				<div class="col-sm-12 col-md-12">
					<div class="page-title">
						<h2 class="lead1">BOOK A DHOBI</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Schedule A Pickup</div>
						<?php if(isset($_GET['successAddOrder'])){
	if($_GET['successAddOrder']==1){?>
		<div class="succ" ><font color="green"><strong>You Have Successfully Placed Your Order!!</strong></font></div>
	<?php }elseif($_GET['successAddOrder'] == 0){?>
		<div><font color="red"><strong>Could Not Add. Please Try Again</strong></font></div>
	<?php } ?>
	<?php }?>
					<div class="panel-body">
								<form action="ajax/book-order.php" method="post" id="register">
								<div id="msg" style="color: red;font-weight: bold;text-transform: uppercase;" ></div>
								<!--<div class="form-group">
									<label>Number of clothes</label>
									<input type="number" name="clothes"  class="formin" placeholder="Number of clothes" required>
								</div> -->
											<div class="form-group services">
									<label>Service(s) <i style="font-weight:300;">(Click on icons to select the service)</i></label>
									<br />
									<label>
										 <input type="checkbox" class="check" name="types[]" id="check" value="1" title="Wash & Fold">
										    <img src="images/6.png" width="130" alt="Wash & Fold" title="Wash & Fold">
										  </label>
										  <label>
										 <input type="checkbox"  class="check" name="types[]" id="check" value="2" title="Ironing">
										    <img src="images/7.png" width="130" alt="Ironing" title="Ironing">
										  </label>
										  
										  <label>
										 <input type="checkbox" class="check" name="types[]" id="check" value="3" title="Wash & Iron">
										    <img src="images/8.png" width="130" alt="Wash & Iron" title="Wash & Iron">
										  </label>
										  <label>
										 <input type="checkbox" class="check" name="types[]" id="check" value="4" title="Dry Clean">
										    <img src="images/9.png" width="130" alt="Dry Clean" title="Dry Clean">
										  </label>
								</div>	
								<div class="form-group">
									<label>Date</label>
									<input type="text" class="formin form-control" name="date" id="cal" value="<?php echo date("m/d/Y"); ?>"  required>
								</div>
								<div class="form-group">
									<label> Time:</label>
									<select name="time" class="formin" id="schedule-time" required>
									<?php
									$d=date("H:i");
									date_default_timezone_set("Asia/Kolkata");
									if (($d <="07:29"))
									{ ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM </option>
									<?php } ?>
									<?php if(($d <="08:29")) { ?>
									<option value="08:30:00 AM - 9:29:59 AM">08:30:00 AM - 9:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="09:29")) { ?>
									<option value="09:30:00 AM-10:29:59 AM">09:30:00 AM - 10:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="10:29")) { ?>
									<option value="10:30:00 AM-11:29:59 AM">10:30:00 AM - 11:29:59 AM</option>
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
								<div class="form-group">
									<label>Delivery Date</label>
									<input type="text" class="formin form-control" name="delivery-date" id="delivery-date" value="<?php echo date('m/d/Y', strtotime('+2 days')); ?>"  required>
								</div>
								<div class="form-group">
									<label> Delivery Time:</label>
									<select name="delivery-time" class="formin form-control" id="delivery-time" required>
									<?php
									$d=date("H:i");
									date_default_timezone_set("Asia/Kolkata");
									if (($d <="07:29"))
									{ ?>
									<option value="07:30:00 AM - 8:29:59 AM">07:30:00 AM - 8:29:59 AM </option>
									<?php } ?>
									<?php if(($d <="08:29")) { ?>
									<option value="08:30:00 AM - 9:29:59 AM">08:30:00 AM - 9:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="09:29")) { ?>
									<option value="09:30:00 AM-10:29:59 AM">09:30:00 AM - 10:29:59 AM</option>
									<?php } ?>
									<?php if(($d <="10:29")) { ?>
									<option value="10:30:00 AM - 10:29:59 AM">10:30:00 AM - 11:29:59 AM</option>
									<?php } ?>
									<?php  if(($d <="11:29")) { ?>
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
								<div class="form-group">
									<label>Other Service</label>
									<input type="text" name="others" value=""  class="formin" placeholder="Enter Other Service (Optional)">
								</div>	
								<div class="form-group">
									<label>Coupon</label>
									<input type="text" name="coupon" value=""  class="formin" placeholder="Enter Coupon Code">
								</div>						
								<div class="form-group">
									<label>Message (If Any)</label>
									<textarea class="formin" name="message" rows="3"></textarea>
								</div>
							<button type="submit" id="submit" class="btn btn-primary">Place Order</button>
								</form>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
  $(function() {
    $( "#cal" ).datepicker();
    $("#delivery-date").datepicker();
  });
  </script>
<?php include 'footer.php'; ?>