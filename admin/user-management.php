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


<?php include 'header.php'; ?>
<?php  require_once '../class/service/AdminService.php';require_once '../class/service/UserService.php';
$adminService= new AdminService();$userService= new UserService();
$viewsUsers=$adminService->showUsers();
?><script src="jquery-1.12.2.min.js"></script>   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>       <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link><script src="YourJquery source path"></script><script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>      <!-- Javascript -->      <script>      jQuery(document).ready(function()   			{  				var term = "";	  				$("#name").keyup(function(){  						term = $(this).val;			  					});  					$("#name").autocomplete({  					      source: '../ajax/search-name.php?term='+term,  					      focus: function(event, ui) {   					       event.preventDefault();   					       $("#name").val(ui.item.label);     						},  					      select: function (event, ui) {  					        $("#name").val(ui.item.label);             					        $("#userId").val(ui.item.value);             					        return false;        					        }      					 });   			});      </script> 

		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">USER MANAGEMENT</h3><form action="name-search-result.php" method="get" align="center">  
					<input id="name"  class="form-control1" type="text" name="term" placeholder="Search By Name" style="width:40%; float:left;"><input id="userId"  type="hidden" name="userId"><input type="submit" class="btn-success btn" name="Search" value="Search" style="float:left;"><br /><br /></form>
					<?php  if(sizeof($viewsUsers)==0) {?>
					<h3> There are no Users to display...!!!</h3>
					<?php } ?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							<th>Customer ID</th>							<th> Registered On </th>	
							  <th>Full Name</th>
							  <th>Mobile Number</th>
							  <th>Address</th>
							  <th>Email-Id</th>
							  <th>View Orders</th>
							  <th>View Subscriptions</th>
							  <th>Add Subscription</th>
							  <th>Add Order</th>
							   
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach ($viewsUsers as $viewsUser) { ?>
							<tr class="active">
							<td><b>HD</b><?php echo strtok($viewsUser['USER_ID'], '-'); ?></td>   								<td><?php echo date("d/m/Y", $viewsUser['CREATED_ON']); ?> </td>
							  <td><?php echo $viewsUser['FULL_NAME']; ?></td>
							  <td><?php echo $viewsUser['MOBILE_NUMBER']; ?></td>
							  <td><?php echo $viewsUser['ADDRESS'].",".$viewsUser['ZIP']; ?>, <?php echo $viewsUser['CITY']; ?>, <?php  $viewSuburb=$userService->viewSuburbById($viewsUser['SUBURB']); ?><?php echo $viewSuburb['SUBURB']; ?></td>
							  <td><?php echo $viewsUser['EMAIL']; ?></td>
							  <td><a class="btn-success btn" href="view-user-order.php?userId=<?php echo $viewsUser['USER_ID']; ?>">VIEW</a></td>
							  <td><a class="btn-success btn" href="view-user-subscription.php?userId=<?php echo $viewsUser['USER_ID']; ?>"> VIEW</a></td>
							  <td> <a class="btn-success btn" href="add-subscription.php?userId=<?php echo $viewsUser['USER_ID']; ?>">ADD</a></td>
							  <td> <a class="btn-success btn" href="add-customer-order.php?userId=<?php echo $viewsUser['USER_ID']; ?>">ADD</a></td>
							</tr>
							<?php } ?>
						  </tbody>
						</table>
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
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>