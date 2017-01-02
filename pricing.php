<?php include 'header.php'; ?>

<?php

require_once 'class/service/OrderService.php';

$orderService = new OrderService();

?>

	<!-- BANNER -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script>

$(document).ready(function(){

$(".priceshow").hide();

    $(".click").click(function(){

        $(".priceshow").toggle();

    });

});

</script>

	<!--<div class="section subbanner" style="background:url('images/pricing.jpg') no-repeat center center;   -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div class="caption">

						<h3>PRICING</h3>

						<ol class="breadcrumb">

						  <li><a href="#">Home</a></li>

						  <li class="active">Pricing</li>

						</ol>

					</div>

				</div>

			</div>

		</div>

		

	</div>-->

	

	

	<!-- ABOUT SECTION -->

	<div id="services" class="section services">

		<div class="container">

			<!--  -->

			<div class="row raise"> 

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1">OUR PRICING TABLE</h2>

						<p class="sublead">THE STRESS FREE SOLUTION TO ALL YOUR LAUNDRY PROBLEMS!</p>

					</div>

				</div>

			</div>

			

				

				

			<div class="row">

			

				<div class="col-sm-12 col-md-3">

					<div class="panel panel-default panel-pricing wow fadeInDown">

						<header class="panel-heading">

							<h3>Wash and Fold</h3>

							<div class="price">

								<sup>Rs.</sup>49

							</div>

						</header>

						<div class="panel-body">

							<table class="table">

								<tbody>

									<tr><td>1 Kg</td></tr>

									<tr><td>Home Delivery</td></tr>

									<tr><td>Expert Washing</td></tr>

									<tr><td>Delivery in 48 hours</td></tr>

								</tbody>

							</table>

						</div>

						

					</div>

		

				</div>

<div class="col-sm-12 col-md-3">

					<div class="panel panel-default panel-pricing wow fadeInDown">

						<header class="panel-heading">

							<h3>Ironing</h3>

							<div class="price">

								<sup>Starts at</sup> Rs.6

							</div>

						</header>

						<div class="panel-body">

							<table class="table">

								<tbody>

									<tr><td>Per Piece</td></tr>

									<tr><td>Home Delivery</td></tr>

									<tr><td> Steam Ironing</td></tr>

									<tr><td>Delivery in 48 hours</td></tr>

								</tbody>

							</table>

						</div>

						

					</div>

		

				</div>

				

				<div class="col-sm-12 col-md-3">

					<div class="panel panel-default panel-pricing wow fadeInDown">

						<header class="panel-heading">

							<h3>Wash and Iron</h3>

							<div class="price">

								<sup>Rs.</sup>79

							</div>

						</header>

						<div class="panel-body">

							<table class="table">

								<tbody>

									<tr><td>1 Kg</td></tr>

									<tr><td>Home Delivery</td></tr>

									<tr><td>Expert Laundering</td></tr>

									<tr><td>Delivery in 48 hours</td></tr>

								</tbody>

							</table>

						</div>

						

					</div>

		

				</div>

				

				<div class="col-sm-12 col-md-3">

					<div class="panel panel-default panel-pricing wow fadeInDown">

						<header class="panel-heading">

							<h3>Dry Cleaning</h3>

							<div class="price">

								<sup>Starts at</sup> Rs.30

							</div>

						</header>

						<div class="panel-body">

							<table class="table">

								<tbody>

									<tr><td>Per Piece</td></tr>

									<tr><td>Home Delivery</td></tr>

									<tr><td>7 stage Cleaning</td></tr>

									<tr><td>Delivery in 72 hours</td></tr>

								</tbody>

							</table>

						</div>

						<!--<footer class="panel-footer">

							<a href="schedule-a-pickup.php" class="btn btn-primary btn-block">ORDER NOW</a>

						</footer>-->

					</div>

		

				</div>

				

				

				

			</div>

<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1">IRONING SUBSCRIPTION PACKAGE</h2>

					</div>

				</div>

			</div>

			

			<div class="row">

<div class="col-sm-12 col-md-12">

<table width="100%">

<tr>

<th class="th">Load In Pieces</th>

<th class="th">Validity (In Days)</th>

<th class="th">Normal Pricing</th>

<!--<th class="th">Discount</th>-->

<th class="th">Subscription Pricing</th>

<th class="th">Pick ups</th>

<!--<th class="th">Get This</th>-->

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

<?php /*?><!--<td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td>--><?php */?>

<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>

<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>

<?php } ?>

</table>

</div>

			</div>

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1">WASH & FOLD SUBSCRIPTION PACKAGE</h2>

					</div>

				</div>

			</div>

<div class="row">

<div class="col-sm-12 col-md-12">

<table width="100%">

<tr>

<th class="th">Load In Kgs</th>

<th class="th">Validity (In Days)</th>

<th class="th">Normal Pricing</th>

<!--<th class="th">Discount</th>-->

<th class="th">Subscription Pricing</th>

<th class="th">Pick ups</th>

<!--<th class="th">Get This</th>-->

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

<?php /*?><td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td><?php */?>

<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>

<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>

<?php } ?>

</table>

</div>

			</div>

<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1">WASH & IRON SUBSCRIPTION PACKAGE</h2>

					</div>

				</div>

			</div>

			

			<div class="row">

<div class="col-sm-12 col-md-12">

<table width="100%">

<tr>

<th class="th">Load In Kgs</th>

<th class="th">Validity (In Days)</th>

<th class="th">Normal Pricing</th>

<!--<th class="th">Discount</th>-->

<th class="th">Subscription Pricing</th>

<th class="th">Pick ups</th>

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

<td class="td"><?php echo $viewWashAndIron['VALIDITIY'] ?></td>

<td class="td"><?php echo $viewWashAndIron['PRICING']; ?></td>

<?php /*?><td class="td"><?php echo $viewWashAndIron['DISCOUNT']; ?></td><?php */?>

<td class="td"><?php echo $viewWashAndIron['SUBSCRIPTION_PRICING']; ?></td>

<td class="td"><?php echo $viewWashAndIron['PICK_UPS']; ?></td>

<?php } ?>

<!--<td class="td"><a href="upgrade-subscription.php">BUY NOW</a></td>-->

</tr>

</table>

</div>

			</div>

			<!--  -->

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1">DRY CLEANING/IRONING DETAIL PRICE</h2>

						<p class="sublead">When the laundry starts piling up - all you have to do is pick up the phone, or

click on the mouse, and we will sort out the rest!</p>

<center><a class="btn btn-default click" style="width:20%;">VIEW PRICING</a></center>

					</div>

				</div>

			</div>

			

<div class="priceshow">

			<div class="row">

			

				<div class="col-sm-12 col-md-6">

					<div class="price-detail">

						<div class="price-detail-heading">Dry Cleaning</div>

						<div class="price-detail-body">

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shirt</div>

								<div class="item-price">Rs. 40</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Trousers</div>

								<div class="item-price">Rs. 40</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Jeans</div>

								<div class="item-price">Rs. 50</div>

							</div>

							<!--<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>T Shirt</div>

								<div class="item-price">Rs. 35</div>

							</div>-->

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Salwar</div>

								<div class="item-price">Rs. 40</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Kurta</div>

								<div class="item-price">Rs. 45</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Heavy Kurta</div>

								<div class="item-price">Rs. 90</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Sweater</div>

								<div class="item-price">Rs. 60</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Jacket</div>

								<div class="item-price">Rs. 80</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Leather Jacket</div>

								<div class="item-price">Rs. 350</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Long Skirt/Gaghra</div>

								<div class="item-price">Rs. 150</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blazer (Normal)</div>

								<div class="item-price">Rs. 140</div>

							</div>

						<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blazer (Velvet)</div>

								<div class="item-price">Rs. 170</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Suit</div>

								<div class="item-price">Rs. 175</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>3 Piece Suit</div>

								<div class="item-price">Rs. 220</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shoes</div>

								<div class="item-price">Rs. 80</div>

							</div>							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Starch+Roll Press</div>

								<div class="item-price">Rs. 100</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Dupatta</div>

								<div class="item-price">Rs. 30</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree</div>

								<div class="item-price">Rs. 80</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Dresses</div>

								<div class="item-price">Rs. 60</div>

							</div>

							

							

							

							

							

							

							

							

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Bag</div>

								<div class="item-price">Rs. 100</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Single Bed Sheet</div>

								<div class="item-price">Rs. 30</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Double Bed Sheet</div>

								<div class="item-price">Rs. 60</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Pillow Cover</div>

								<div class="item-price">Rs. 35</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Roll Press (Normal)</div>

								<div class="item-price">Rs. 50</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Roll Press (Heavy)</div>

								<div class="item-price">Rs. 80</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Starch</div>

								<div class="item-price">Rs. 50</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree (Regular)</div>

								<div class="item-price">Rs. 80</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree (Medium)</div>

								<div class="item-price">Rs. 150</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree (Heavy)</div>

								<div class="item-price">Rs. 250</div>

							</div>

							

							<!--<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree (Super Heavy)</div>

								<div class="item-price">Rs. 350</div>

							</div>-->

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (Regular)</div>

								<div class="item-price">Rs. 30</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (Medium)</div>

								<div class="item-price">Rs. 50</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (Heavy)</div>

								<div class="item-price">Rs. 70</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (super Heavy)</div>

								<div class="item-price">Rs. 90</div>

							</div>

							

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Curtains</div>

								<div class="item-price">7/sq ft</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Carpet</div>

								<div class="item-price">20/sq ft</div>

							</div>

							

							<!--<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Single Blanket (Jaipur)</div>

								<div class="item-price">Rs. 100</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Double Blanket (Jaipur)</div>

								<div class="item-price">Rs. 200</div>

							</div>-->

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Single Blanket (Normal)</div>

								<div class="item-price">Rs. 100</div>

							</div>

							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Double Blanket (Normal)</div>

								<div class="item-price">Rs. 200</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Mink Blanket/ Comforter (Single)</div>

								<div class="item-price">Rs. 200</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Mink Blanket/Comforter (Double)</div>

								<div class="item-price">Rs. 400</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Anarkali</div>

								<div class="item-price">Rs. 120</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Wedding Gowns</div>

								<div class="item-price">Rs. 350</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Bleach</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Cushion Cover (Regular)</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Cushion Cover (Large)</div>

								<div class="item-price">Rs. 80</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Tie</div>

								<div class="item-price">Rs. 50</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Cap</div>

								<div class="item-price">Rs. 50</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Door Mat</div>

								<div class="item-price">Rs. 50</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Pillow</div>

								<div class="item-price">Rs. 60</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shawl</div>

								<div class="item-price">Rs. 60</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shorts</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Skirt</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Towels</div>

								<div class="item-price">Rs. 50</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Top</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Tracks / Lower</div>

								<div class="item-price">Rs. 40</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Woollen Jacket</div>

								<div class="item-price">Rs. 200</div>

							</div>

						</div>

					</div>

		

				</div>

				<div class="col-sm-12 col-md-6">

					<div class="price-detail">

						<div class="price-detail-heading">IRONING</div>

						<div class="price-detail-body">

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shirt</div>

								<div class="item-price">Rs. 6</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Pant/Trousers</div>

								<div class="item-price">Rs. 6</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>T-Shirt</div>

								<div class="item-price">Rs. 6</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Jeans</div>

								<div class="item-price">Rs. 6</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Salwar</div>

								<div class="item-price">Rs. 6</div>

							</div>

								<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Kurta</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Heavy Kurta</div>

								<div class="item-price">Rs. 25</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Dupatta</div>

								<div class="item-price">Rs. 6</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Dress</div>

								<div class="item-price">Rs. 25</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree</div>

								<div class="item-price">Rs. 20</div>

							</div>						

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Sweater</div>

								<div class="item-price">Rs. 15</div>

							</div>		
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Pillow Cover</div>

								<div class="item-price">Rs. 6</div>

							</div>					

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Jacket</div>

								<div class="item-price">Rs. 15</div>

							</div>				

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Suit 2 Pcs</div>

								<div class="item-price">Rs. 55</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Suit 3 Pcs</div>

								<div class="item-price">Rs. 60</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blazers (Normal)</div>

								<div class="item-price">Rs. 50</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blazers (Velvet)</div>

								<div class="item-price">Rs. 50</div>

							</div>						

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Single Bed Sheet</div>

								<div class="item-price">Rs. 15</div>

							</div>						

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Double Bed Sheet</div>

								<div class="item-price">Rs. 25</div>

							</div>							

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Curtains</div>

								<div class="item-price">Rs. 25</div>

							</div>							


							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Bed Covers</div>

								<div class="item-price">Rs. 25</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Saree (Regular)</div>

								<div class="item-price">Rs. 25</div>

							</div>
							
								<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (Regular) </div>

								<div class="item-price">Rs. 6</div>

							</div>
								<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Blouse (Regular) </div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Anarkali</div>

								<div class="item-price">Rs. 20</div>

							</div>

							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Wedding Gowns</div>

								<div class="item-price">Rs. 80</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Cushion Cover (Regular)</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Cushion Cover (Large)</div>

								<div class="item-price">Rs. 15</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Tie</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shawl</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Shorts</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Skirt</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Top</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Tracks / Lower</div>

								<div class="item-price">Rs. 6</div>

							</div>
							
							<div class="item">

								<div class="item-name"><i class="fa fa-check-circle"></i>Woollen Jacket</div>

								<div class="item-price">Rs. 30</div>

							</div>

						</div>

					</div>

		

				</div>

				

				

				

				<div class="col-sm-12 col-md-12">

				

				<p class="more-info-price">Get discount 10%-15% if you join our membership. <br />

				Don't worry if your items not listed here, <a href="mailto:contact@heydhobi.in" title="">Send Us Message</a> and we will take care of it.</p>

				</div>

			</div>

</div>

		</div>

	</div>

	

	

<?php include 'footer.php'; ?>