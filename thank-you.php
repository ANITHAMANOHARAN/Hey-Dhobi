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
					<div class="panel-heading"><font color="mediumvioletred">Thank You......!!!!!!!</font></div>
					<div class="panel-body">
					<?php
					
					if(isset($_GET['successAddOrder'])){
	if($_GET['successAddOrder']==1){?>
		<div style="
    font-weight: bold;
    color: mediumvioletred;
    align-content: center;
" >You Have Successfully Placed Your Order!!</div>
	<?php }elseif($_GET['successAddOrder'] == 0){?>
		<div><font color="red"><strong>Could Not Add. Please Try Again</strong></font></div>
	<?php } ?>
	<?php }?>
	<br>
	<center>
	 <a href="schedule-a-pickup.php"> <button type="button" style="
    color: mediumvioletred;" class="btn btn-default btn-lg">Book Another Order</button></a></center>
							
					</div>
					</div>
				</div>
			</div>
	
	
	
	</div>	<!--/.main-->

	
</body>

</html>
