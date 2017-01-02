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
<?php  include 'account-header.php'; ?>
<?php 
require_once 'class/service/OrderService.php';
$orderService= new OrderService();
$viewOrders=$orderService->viewCompletedOrdersById($userId);
$viewCompletedCount=$orderService->countCompletedOrder($userId);
$viewCount=$orderService->countPendingOrder($userId);
$viewOrderHistorys=$orderService->viewCompletedOrdersById($userId);$viewTypes=$orderService->viewTypes();
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Order Management</li>
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
							<div class="large"><?php echo $viewCompletedCount['COUNT']; ?></div>
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
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Place an Order</h4>
						<div class="easypiechart">
						<button type="submit" class="btn btn-primary">Click Here</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Order History</h4>
						<div class="easypiechart">
						<a href="order-history.php"><button type="submit" class="btn btn-primary">Click Here</button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Track Order</h4>
						<div class="easypiechart">
						<a href="order-management.php"><button type="submit" class="btn btn-primary">Click Here</button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Notifications</h4>
						<div class="easypiechart">
						<button type="submit" class="btn btn-primary">Click Here</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Order History - Completed Orders</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        
						        <th data-sortable="true">Service Type</th>
						        <th data-sortable="true">Order Date/Time</th>
						        <th data-sortable="true">Order Amount</th>
								<th data-sortable="true">Order Status</th>
								<th data-sortable="true">Order Delivery</th>
								<th data-sortable="true">Requested Delivery</th>
						    </tr>
						    </thead><?php IF(sizeof($viewOrderHistorys)==0){ ?><div> Sorry No Info To Display....! </div><?php } ?>
						    <?php foreach ($viewOrderHistorys as $viewOrderHistory) { ?>
							<tr>
						        
						        <td><?php $focus=explode(",", $viewOrderHistory['TYPES']); ?>					
						        		<?php  foreach ($viewTypes as $viewType) {								if(in_array($viewType['TYPE_ID'],$focus)) { ?>						
						    			<p><?php echo $viewType['TYPE'];?>						
						    		<?php } ?>												
						    	   <?php } ?>  <BR>
							   <?php if(!empty($viewOrderHistory['WASH_AND_FOLD_R'])) { ?>
							   Weight-<?php   echo $viewOrderHistory['WASH_AND_FOLD_W'];  ?>
							   Rate- <?php echo $viewOrderHistory['WASH_AND_FOLD_R'];  ?>
							   <?php } ?>
							   <br> 
							   <?php if(!empty($viewOrderHistory['IRONING_R'])) { ?>
							   Weight-<?php   echo $viewOrderHistory['IRONING_W'];  ?>
							   Rate- <?php echo $viewOrderHistory['IRONING_R'];  ?>
							   <?php } ?>
							   <br>
							   <?php if(!empty($viewOrderHistory['WASH_AND_IRON_W'])) { ?>
							   Weight-  <?php  echo $viewOrderHistory['WASH_AND_IRON_W'];  ?>
							   Rate-  <?php   echo $viewOrderHistory['WASH_AND_IRON_R'];  ?>
							   <?php } ?>
							   <br>
							   <?php if(!empty($viewOrderHistory['DRY_CLEAN_W'])) {
							   	?>
							   Weight- <?php  echo $viewOrderHistory['DRY_CLEAN_W'];  ?>
							   Rate- <?php   echo $viewOrderHistory['DRY_CLEAN_R'];  ?>
							   <?php } ?></td>
						        <td>Date: <?php echo $viewOrderHistory['DATE'];  ?> <br>						        Time: <?php echo $viewOrderHistory['TIME']; ?>						        </td>
						        <td><?php echo $viewOrderHistory['COST']; ?></td>
								<td><?php ECHO $viewOrderHistory['STATUS']; ?></td>
								<td><?php ECHO $viewOrderHistory['ORDER_DELIVERY']; ?></td>
								<td><?php echo $viewOrder['DELIVERY_DATE']."(".$viewOrder['DELIVERY_TIME'].")"; ?></td>
						    </tr>
							<?php } ?>
						</table>
							<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
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
