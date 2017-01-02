<?php
if(!isset($_SESSION))
{
	ob_start();
	session_start();
}
$userId=$_SESSION['userId'];
if(!isset($userId))
{
	header('Location: sign-up.php');
}
?>

<?php include 'header.php'; ?>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<a href="index.php"><img src="http://10dumbs.com/heydhobi/HEYDHOBI/images/logo_blue.png" alt="" class="ulog" /></a>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></svg>
 Schedule A Pickup</a></li>
			<li><a href="charts.html"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Order History</a></li>
			<li><a href="tables.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Account Settings</a></li>		
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Order Management </span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Pending Orders
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Confirmed orders 
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Processing orders 
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Completed orders 
						</a>
					</li>
				</ul>
			</li>
			
			
			
			<li role="presentation" class="divider"></li>
			<li><a href="login.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->
		
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
							<div class="large">12</div>
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
							<div class="large">1</div>
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
						<button type="submit" class="btn btn-primary">Click Here</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Track Order</h4>
						<div class="easypiechart">
						<button type="submit" class="btn btn-primary">Click Here</button>
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
					<div class="panel-heading">Confirmed Orders</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-checkbox="true" >Order Number</th>
						        <th data-sortable="true">Service Name</th>
						        <th data-sortable="true">Order Date/Time</th>
						        <th data-sortable="true">Order Amount</th>
								<th data-sortable="true">Order Status</th>
								<th data-sortable="true">Order Delivery</th>
						    </tr>
						    </thead>
							<tr>
						        <td>HD1101</td>
						        <td>Wash & Iron</td>
						        <td>20th May, 2016 : 7AM</td>
						        <td>Rs.50</td>
								<td>Confirmed</td>
								<td>22nd May, 2017 : 10AM</td>
						    </tr>
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

</php>
