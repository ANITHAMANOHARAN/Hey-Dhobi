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
<?php include 'account-header.php';
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
    background: rgba(239, 239, 239, 0.57);
    border-radius: 180px;
    padding: 5px;
    border: 1px solid #E6E6E6;
}
</style>
	<meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
 
 
 
<script type="text/javascript">
	jQuery(document).ready(function(){
		var str;
		var time=$("#schedule-time").val();
		$("#datepicker").change(function(){
			var obj = jQuery(this);
			 str = obj.val();
			var date = new Date(str);
			var newdate= new Date(date);
			 newdate.setDate(newdate.getDate() + 2);
			    var dd = newdate.getDate();
			    var mm = newdate.getMonth() + 1;
			    var y = newdate.getFullYear();
   				var del = mm + '/' + dd + '/' + y;
			$("#delivery-date").val(del);
 				jQuery.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("schedule-time");
							var selectObj1=document.getElementById("delivery-time");
							
							selectObj.innerHTML = response;
							selectObj1.innerHTML = response;
							
					}
				});

 				$('#schedule-time').change(function() {
 				    $('#delivery-time').val($(this).val());
 				});
					
				
		});
			
		
		$("#delivery-date").change(function(){
			var obj = jQuery(this);
			var type = obj.val();
 				jQuery.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "type="+type+"&id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("delivery-time");
							selectObj.innerHTML = response;
							
					}
				}); 
			});
	});
</script>

<script>
 /* $(function() {
    $( "#datepicker" ).datepicker({
    	minDate:0,
    	 onClose: function( selectedDate, inst ) {
             var minDate = new Date(Date.parse(selectedDate));
             minDate.setDate(maxDate.getDate() + 2);
             alert(minDate);
            $( "#delivery-date" ).datepicker( "option", "minDate", minDate);
        }
    });

    $("#delivery-date").datepicker({
    	minDate:"+2D"
    });
  }); */ 
  </script>
  <script type="text/javascript">
	/* $(document).ready(function(){
		$.noConflict();
		
		$("#datepicker").change(function(){
			var obj = $(this);
			var str = obj.val();
			var date = new Date(str);
			var newdate= new Date(date);
			 newdate.setDate(newdate.getDate() + 2);
			    var dd = newdate.getDate();
			    var mm = newdate.getMonth() + 1;
			    var y = newdate.getFullYear();
   				var del = mm + '/' + dd + '/' + y;
   				
			$("#datepicker").val(del);
			
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
	}); */	
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
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Schedule A Pickup</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $viewCompleted['COUNT']; ?></div>
							<div class="text-muted">Previous Orders</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $viewCount['COUNT']; ?></div>
							<div class="text-muted">Pending Orders</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<!--/.row-->
		<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Schedule A Pickup</div>
					<div class="panel-body">
					<?php if(isset($_GET['successAddOrder'])){
	if($_GET['successAddOrder']==1){?>
		<div class="succ" ><font color="green"><strong>You Have Successfully Placed Your Order!!</strong></font></div>
	<?php }elseif($_GET['successAddOrder'] == 0){?>
		<div><font color="red"><strong>Could Not Add. Please Try Again</strong></font></div>
	<?php } ?>
	<?php }?>
							<form action="ajax/add-order.php" method="post" id="register">
							<div id="msg" style="color: red;font-weight: bold;text-transform: uppercase;" ></div>
								<!--<div class="form-group">
									<label>Number of clothes</label>
									<input type="number" name="clothes"  class="form-control" placeholder="Number of clothes" required>
								</div> -->
											<div class="form-group services">
									<label>Service(s) <i style="font-weight:300;">(Click on icons to select the service)</i></label>
									<br />
									<label>
										 <input type="checkbox"  class="check" name="types[]" id="flip" value="1" title="Wash & Fold">
										    <img src="images/6.png" width="130" alt="Wash & Fold" title="Wash & Fold">
										  </label>
										  <label>
										 <input type="checkbox" class="check" name="types[]" id="flip" value="2" title="Ironing">
										    <img src="images/7.png" width="130" alt="Ironing" title="Ironing">
										  </label>
										  <label>
										 <input type="checkbox"  class="check" name="types[]" id="flip" value="3" title="Wash & Iron">
										    <img src="images/8.png" width="130" alt="Wash & Iron" title="Wash & Iron">
										  </label>
										  <label>
										 <input type="checkbox" class="check" name="types[]" id="flip" value="4" title="Dry Clean">
										    <img src="images/9.png" width="130" alt="Dry Clean" title="Dry Clean">
										  </label>
								</div>	
								<div class="form-group">
									<label>Date</label>
									<input type="text"  class="form-control " name="date" id="datepicker" value="<?php echo date("m/d/Y"); ?>"  required placeholder="Enter Date & Select Time Slot">
								</div>
								<div class="form-group">
								<label> Time:</label>
									<select name="time" class="form-control" id="schedule-time" required>
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
									<?php }  ?>
									<?php  ?>
									</select>
								</div>
								<div class="form-group">
								<label>Delivery Date</label>
								<input type="text" class="form-control" name="delivery-date" id="delivery-date" value="<?php echo date('m/d/Y', strtotime('+2 days')); ?>"  required>
								</div>
								<div class="form-group">
								<label> Delivery Time:</label>
								<select name="delivery-time" class="form-control" id="delivery-time" required>
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
									<label>Other Service</label>
									<input type="text" name="others" value=""  class="form-control">
								</div>	
								<div class="form-group">
									<label>Coupon Code</label>
									<input type="text" name="coupon" value=""  class="form-control" placeholder="Enter Coupon Code">
								</div>						
								<div class="form-group">
									<label>Message (If Any)</label>
									<textarea class="form-control" name="message" rows="3"></textarea>
								</div>
								<input type="submit" id="submit" value="Place Order" class="btn btn-primary" />
							<!--<button type="submit" class="btn btn-primary">Place Order</button>-->
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

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $("#delivery-date").datepicker();
  });
  </script>