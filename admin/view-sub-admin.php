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
<?php require_once '../class/service/AdminService.php';
	  $adminService= new AdminService();
	  $viewSubAdmins=$adminService->getSubAdmins();
	  
	  ?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">VIEW SUB-ADMIN</h3>
					<?php if(isset($_GET['successUpdateSubAdmin'])){
	if($_GET['successUpdateSubAdmin']==1){?>
		<div>You Have Successfully Edited An Sub-Admin Profile!!</div>
	<?php }elseif($_GET['successUpdateSubAdmin'] == 0){?>
		<div>Could Not Edit</div>
	<?php } ?>
	<?php }?>
	<?php if(isset($_GET['successDeleteSubAdmin'])){
	if($_GET['successDeleteSubAdmin']==1){?>
		<div>You Have Successfully Deleted  the Sub-Admin Profile!!</div>
	<?php }elseif($_GET['successDeleteSubAdmin'] == 0){?>
		<div>Could Not Delete</div>
	<?php } ?>
	<?php }?>
			     
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<?php if(sizeof($viewSubAdmins)==0) { ?>
				<h5> Sorry No Sub-Admins To Display</h5>
				<?php } ?>
						<table class="table">
						  <thead>
							<tr>
							  <th>Number</th>
							  <th>Name</th>
							  <th>Email-Id</th>
							  <th>Status</th>
							  <th>Archive</th>
							   <?php if($adminId==1) { ?>
							<th>Accept</th>
							<th>Reject</th>
							<th> Action </th>
							<th> Delete </th>
							<?php } ?>
							
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach ($viewSubAdmins as $viewSubAdmin) { ?>
							<tr class="active">
							 <td><?php echo $viewSubAdmin['ADMIN_ID']; ?></td>
							  <td><?php echo $viewSubAdmin['ADMIN_NAME']; ?></td>
							    <td><?php echo $viewSubAdmin['ADMIN_EMAIL']; ?></td>
							  <td><?php echo $viewSubAdmin['TYPE']; ?></td>
							  <td><?php echo $viewSubAdmin['ARCHIVE']; ?></td>
							   <?php if($adminId==1) { ?>
							  <td><a href="../ajax/accept-sub-admin.php?subAdminId=<?php echo $viewSubAdmin['ADMIN_ID']; ?> ">Activate</a></td>
							  <td><a href="../ajax/reject-sub-admin.php?subAdminId=<?php echo $viewSubAdmin['ADMIN_ID']; ?> ">De-Activate</a> </td>
							  <td><a href="edit-sub-admin.php?subAdminId=<?php echo $viewSubAdmin['ADMIN_ID']; ?>">Edit</a> 
							<td> <a href="../ajax/delete-sub-admin.php?subAdminId=<?php  echo $viewSubAdmin['ADMIN_ID']?> ">Delete</a>
							 </td>
							 <?php } ?>
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