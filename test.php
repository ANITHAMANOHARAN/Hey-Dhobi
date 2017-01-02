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
	<meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script type="text/javascript">
	jQuery(document).ready(function(){
		$(".select_state").change(function(){
			var obj = jQuery(this);
			var str = obj.val();
 				jQuery.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("city_display");
							selectObj.innerHTML = response;
					}
				}); 
			});
	});

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
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
 <script type="text/javascript">
	jQuery(document).ready(function(){
		$(".select_state").change(function(){
			var obj = jQuery(this);
			var str = obj.val();
 				jQuery.ajax({
					type: "GET",
					url: "ajax/get-time.php",
					data: "id="+str,
					cache: false,
					success: function(response){
							var selectObj = document.getElementById("city_display");
							selectObj.innerHTML = response;
					}
				}); 
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
							
								<!--<div class="form-group">
									<label>Number of clothes</label>
									<input type="number" name="clothes"  class="form-control" placeholder="Number of clothes" required>
								</div> -->
											<div class="form-group services">
									<label>Service(s) <i style="font-weight:300;">(Click on icons to select the service)</i></label>
									<br />
									<label>
 <input type="checkbox" name="types[]" id="flip" value="1" title="Wash & Fold">
    <img src="images/6.png" width="130" alt="Wash & Fold" title="Wash & Fold">
  </label>
  <label>
 <input type="checkbox" name="types[]" id="flip" value="2" title="Ironing">
    <img src="images/7.png" width="130" alt="Ironing" title="Ironing">
  </label>
  
  <label>
 <input type="checkbox" name="types[]" id="flip" value="3" title="Wash & Iron">
    <img src="images/8.png" width="130" alt="Wash & Iron" title="Wash & Iron">
  </label>
  <label>
 <input type="checkbox" name="types[]" id="flip" value="4" title="Dry Clean">
    <img src="images/9.png" width="130" alt="Dry Clean" title="Dry Clean">
  </label>
  
									<?php /*?><?php foreach($viewTypes as $viewType) { ?>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="types[]" value="<?php echo $viewType['TYPE_ID']; ?>"> <?php echo $viewType['TYPE']; ?>
										</label>
									</div>
									<?php } ?><?php */?>
									
								</div>	
											
								<div class="form-group">
									<label>Date</label>
									<input type="text"  class="form-control select_state" name="date" id="datepicker" value=""  required placeholder="Enter Date & Select Time Slot">
								</div>
								
								<div class="form-group">
									<label>Time (Timezone-Asia/Kolkata) Current Time-<?php echo date("h:i:a"); ?></label>
									<select name="time" class="form-control" id="city_display" required>
									<option  value="">-Select-</option>
									</select>
								</div>
								
									<div class="form-group">
									<label>Other Service</label>
									<input type="text" name="others" value=""  class="form-control">
								</div>						
								<div class="form-group">
									<label>Message (If Any)</label>
									<textarea class="form-control" name="message" rows="3"></textarea>
								</div>
							<button type="submit" class="btn btn-primary">Place Order</button>
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
