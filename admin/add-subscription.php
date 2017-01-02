<?php 
if(!isset($_SESSION))

{

	session_start();

}

if(!isset($_SESSION['adminId']))

{

	header('Location: admin-login.php');

}

$adminId=$_SESSION['adminId'];require_once '../class/service/AdminService.php';$adminService = new AdminService();
$userId=$_GET['userId'];$viewName=$adminService->viewUserById($userId);
?>
<style>
.form-control1
{
height:auto !important;
}
#washAndIron table tr th
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
#washAndIron table tr td
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
#washAndFold table tr th
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
#washAndFold table tr td
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
#Ironing table tr th
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
#Ironing table tr td
{
border:1px solid rgba(204, 204, 204, 0.18);
padding: 5px;
line-height: 26px;
}
</style>
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#washAndIron").hide();
	$("#Ironing").hide();
	$("#washAndFold").hide();
	$("#profile").click(function(){
		 if ($(this).val() == "WASH & IRON") {
             $("#washAndIron").show();
             $("#Ironing").hide();
         	$("#washAndFold").hide();
             
         }
		 if ($(this).val() == "IRONING") {
             $("#Ironing").show();
             $("#washAndIron").hide();
             $("#washAndFold").hide();
             
         }
		 if ($(this).val() == "WASH & FOLD") {
             $("#washAndFold").show();
             $("#washAndIron").hide();
         	$("#Ironing").hide();
             
         }
         
		
		
	
	 });
});

</script>
<?php  include 'header.php'; ?>
<?php
require_once '../class/service/OrderService.php';
$orderService = new OrderService();


?>
<!--notification menu end -->

<!-- //header-ends -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">ADD SUBSCRIPTION</h3>				<h2> <?php echo $viewName['FULL_NAME']; ?></h2>
		<script src="js/jquery.min.js"> </script>

		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal" id="registerSubAdmin"
					action="../ajax/add-sub-admin.php" method="post">
					<label for="focusedinput" class="col-sm-2 control-label"> <script
							type="text/javascript" src="js/subAdmin.js"></script></label> <br>
					<br> <br>
			
			</div>
			<?php if(isset($_GET['addSubscription'])){
	if($_GET['addSubscription']==1){?>
		<div class="succ" ><font color="green"><strong>You Have Successfully  Added  The Subscription!!</strong></font></div>
	<?php }elseif($_GET['addSubscription'] == 0){?>
		<div><font color="red"><strong>Could Not Add. Please Try Again</strong></font></div>
	<?php } ?>
	<?php }?>
			<div class="form-group">

				<div class="col-sm-8">
					<select name="" class="form-control1" id="profile">
						<option value="">---SELECT---</option>
						<option value="IRONING">IRONING</option>
						<option value="WASH & FOLD">WASH & FOLD</option>
						<option value="WASH & IRON">WASH & IRON</option>
					</select>
				</div>

				<!--<div class="col-sm-2 jlkdfj1">
										<p class="help-block">Your help text!</p>
									</div>-->
			</div>


			<br> <br>
			<div class="form-control1" id="washAndIron">
				<strong> WASH & IRON SUBSCRIPTION PACKAGE</strong><br />
				<table width="100%">
					<tr>
						<th class="th">Load In Kgs</th>
						<th class="th">Validity (In Days)</th>
						<th class="th">Normal Pricing</th>
						<th class="th">Discount</th>
						<th class="th">Subscription Pricing</th>
						<th class="th">Pick ups</th>
						<th class="th"> Subscription </th>
						<!--<th class="th">Get This</th>-->
					</tr>
					<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->

					</tr>
<?php
$name1="WASH & IRON";
$viewWashAndIrons=$orderService->viewSubscriptions($name1);
foreach($viewWashAndIrons as $viewWashAndIron)
{
?>


<tr>
						<td class="td"><?php echo $viewWashAndIron['LOAD']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['VALIDITIY']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>
						<td><a class="btn-success btn" href="../ajax/add-subscription.php?userId=<?php echo $userId; ?>&packageId=<?php echo $viewWashAndIron['PACKAGE_ID']; ?>&validitiy=<?php echo $viewWashAndIron['VALIDITIY']; ?>">Subscribe</a></td>

<?php } ?>
<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->
					</tr>

				</table>
			</div>
			<br>
			<div class="form-control1" id="washAndFold">
				<strong> WASH & FOLD SUBSCRIPTION PACKAGE</strong>
				<table width="100%">
					<tr>
						<th class="th">Load In Kgs</th>
						<th class="th">Validity (In Days)</th>
						<th class="th">Normal Pricing</th>
						<th class="th">Discount</th>
						<th class="th">Subscription Pricing</th>
						<th class="th">Pick ups</th>
						<th class="th"> Subscription </th>
						<!--<th class="th">Get This</th>-->
					</tr>
					<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->

					</tr>
<?php
$name1="WASH & FOLD";
$viewWashAndIrons=$orderService->viewSubscriptions($name1);
foreach($viewWashAndIrons as $viewWashAndIron)
{
?>


<tr>
						<td class="td"><?php echo $viewWashAndIron['LOAD']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['VALIDITIY'] ?></td>
						<td class="td"><?php echo $viewWashAndIron['PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>
						<td><a class="btn-success btn" href="../ajax/add-subscription.php?userId=<?php echo $userId; ?>&packageId=<?php echo $viewWashAndIron['PACKAGE_ID']; ?>">Subscribe</a></td>

<?php } ?>
<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->
					</tr>

				</table>
			</div>

			<br>
			<div class="form-control1" id="Ironing">
				<strong>IRONING SUBSCRIPTION PACKAGE</strong>
				<table width="100%">
					<tr>
						<th class="th">Load In Pieces</th>
						<th class="th">Validity (In Days)</th>
						<th class="th">Normal Pricing</th>
						<th class="th">Discount</th>
						<th class="th">Subscription Pricing</th>
						<th class="th">Pick ups</th>
						<th class="th"> Subscription </th>
						<!--<th class="th">Get This</th>-->
					</tr>
					<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->

					</tr>
<?php
$name1="IRONING";
$viewWashAndIrons=$orderService->viewSubscriptions($name1);
foreach($viewWashAndIrons as $viewWashAndIron)
{
?>


<tr>
						<td class="td"><?php echo $viewWashAndIron['LOAD']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['VALIDITIY'] ?></td>
						<td class="td"><?php echo $viewWashAndIron['PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>
						<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>
						<td><a class="btn-success btn" href="../ajax/add-subscription.php?userId=<?php echo $userId; ?>&packageId=<?php echo $viewWashAndIron['PACKAGE_ID']; ?>">Subscribe</a></td>

<?php } ?>
<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->
					</tr>

				</table>
			</div>




			<div></div>



			<div class="panel-footer"></div>
			</form>
		</div>
	</div>
</div>
</div>
<!--body wrapper end-->
</div>
<!--footer section start-->
<footer>
	<p>
		&copy 2016 HeyDhobi. All Rights Reserved | Design by <a
			href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a>
	</p>
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