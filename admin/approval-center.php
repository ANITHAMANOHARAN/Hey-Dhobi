<?php include 'header.php'; ?>
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

<?php require_once '../class/service/AdminService.php';
	  require_once '../class/service/UserService.php';
	  $userService= new UserService();
	  $adminService= new AdminService();
	  $viewUsers=$adminService->showUsers();
	  
	  ?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
				
					<h3 class="blank1">USER CENTER</h3>
					<?php if(sizeof($viewUsers)==0) { ?>
				<h5> Sorry No Users To Display</h5>
				<?php } ?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  <th>User Name</th>
							  <th>Mobile Number</th>
							  <th>City</th>
							  <th>Suburbs</th>
							  <th>Address</th>
							  <th>Active</th>
							<th>Accept</th>
							<th>Reject</th>
							
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach ($viewUsers as $viewUser) { ?>
							<tr class="active">
							 
							  <td><?php echo $viewUser['FULL_NAME']; ?></td>
							  <td><?php echo $viewUser['MOBILE_NUMBER']; ?></td>
							  <td><?php echo $viewUser['CITY']; ?></td>
							  <td><?php echo $viewUser['SUBURB']; ?></td>
							   <td><?php echo $viewUser['ADDRESS']; ?></td>
							    <td><?php echo $viewUser['EMAIL']; ?></td>
							  <td><?php echo $viewUser['ACTIVE']; ?></td>
							  <td><a href="../ajax/activateUsersFromAdmin?userId=<?php echo $viewUser['USER_ID']; ?> ">Accept</a></td>
							  <td><a href="../ajax/activateUsersFromAdmin?userId=<?php echo $viewUser['USER_ID']; ?> ">Reject</a> </td>
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
        <?php  include 'footer.php'; ?>