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

<?php  require_once '../class/service/AdminService.php';
require_once '../class/service/UserService.php';

$adminService= new AdminService();
$userService= new UserService();
$userId=$_GET['userId'];
$viewsUsers=$adminService->viewNameById($userId);

?>
<script src="jquery-1.12.2.min.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <!-- Javascript -->
      


		<!-- //header-ends -->

			<div id="page-wrapper">

				<div class="graphs">

					<h3 class="blank1"> SEARCH RESULT</h3>

					<?php  if(sizeof($viewsUsers)==0) {?>

					<h3> There are no Result to display...!!!</h3>

					<?php } ?>

					 <div class="xs tabls">

						<div class="bs-example4" data-example-id="contextual-table">

						<table class="table">

						  <thead>

							<tr>

							<th>Customer ID</th>

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

							<td><b>HD</b><?php echo strtok($viewsUser['USER_ID'], '-'); ?></td>

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