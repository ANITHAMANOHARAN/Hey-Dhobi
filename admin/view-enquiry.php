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

<?php  include 'header.php'; ?>
<?php 
require_once '../class/service/AdminService.php';
require_once '../class/service/OrderService.php';
$adminService= new AdminService();
$orderService= new OrderService();
$viewEnquirys=$adminService->viewEnquiry();
?>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
				<?php if(isset($_GET['successReply'])) { ?>
				<?php if($_GET['successReply']==1) { ?>
				<h3> You Have Successfully Replyed</h3>
				<?php } ?>
				<?php if($_GET['successReply']==0) {  ?>
				<h3> Sorry Could Not Reply</h3>
				<?php  } } ?>
					<h3 class="blank1">VIEW ENQUIRY</h3>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<?php if(sizeof($viewEnquirys)==0){ ?>
						<div> Sorry No Enquiry To Display </div>
						<?php } ?>
						<table class="table">
						  <thead>
							<tr>
							  
							  <th>Name</th>
							  <th>Email-Id</th>
							  <th>Message</th>
							  <th>Reply</th>
							  <th>Action</th>
							  
							
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach($viewEnquirys as $viewEnquiry) { ?>
							<tr class="active">
							  <td><?php echo $viewEnquiry['NAME']; ?></td>
							  <td><?php echo $viewEnquiry['EMAIL_ID']; ?></td>
							  <td><?php echo $viewEnquiry['MESSAGE']; ?></td>
							  <td><a href="reply.php?enquiryId=<?php echo $viewEnquiry['ENQUIRY_ID']; ?>&email=<?php echo $viewEnquiry['EMAIL_ID']; ?>">Reply</a></td>
							  <td><a href="../ajax/delete-enquiry.php?enquiryId=<?php echo $viewEnquiry['ENQUIRY_ID'] ?>">Delete</a></td>
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
			   <p>&copy 2016 Hey Dhobi. All Rights Reserved | Design by <a href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a></p>
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