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
<?php $enquiryId=$_GET['enquiryId'];
$email=$_GET['email'];

?>

<?php include 'header.php'; ?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">REPLY</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="../ajax/add-reply.php?enquiryId=<?php echo $enquiryId ?>&email=<?php echo $email; ?>" method="post" >
								<div class="form-group">
								
									<label for="txtarea1" class="col-sm-2 control-label">REPLY</label>
									<div class="col-sm-8"><textarea name="message" id="txtarea1" cols="50" rows="4" class="form-control1"> </textarea></div>
								</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn">Submit</button>
									<button class="btn-inverse btn">Reset</button>
								</div>
							</div>
						 </div>		
							</form>
						</div>
					</div>
				</div>
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2016 Temple Timing. All Rights Reserved | Design by <a href="https://10dumbs.com/" target="_blank">10Dumbs Inc.</a></p>
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