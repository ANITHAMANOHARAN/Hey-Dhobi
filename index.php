<?php include 'header.php'; ?>

<style>

.hideme

{

    opacity:0;

}

</style>

<script src="http://code.jquery.com/jquery-1.7.1.js" type="text/javascript"></script>

<script>

		$(document).ready(function() {

    

    /* Every time the window is scrolled ... */

    $(window).scroll( function(){

    

        /* Check the location of each desired element */

        $('.hideme').each( function(i){

            

            var bottom_of_object = $(this).offset().top + $(this).outerHeight();

            var bottom_of_window = $(window).scrollTop() + $(window).height();

            

            /* If the object is completely visible in the window, fade it it */

            if( bottom_of_window > bottom_of_object ){

                

                $(this).animate({'opacity':'1'},1500);

                    

            }

            

        }); 

    

    });

    

});

	</script>

<link rel="stylesheet" href="css/hover.css" type="text/css" />

	<!-- BANNER -->

	

	<div class="section banner" >

		

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->

			<div class="carousel-inner" role="listbox">

					<!--<div class="item active">

					<img src="images/diwali.jpg" alt="...">

					<div class="carousel-caption">

						<div class="container">

							<div class="wrap-caption">

							

							</div>

						</div>

					</div>

				</div>-->

				

				<div class="item active">

					<img src="images/bannernewest1.jpg" alt="...">

					<div class="carousel-caption">

						<div class="container">

							<div class="wrap-caption">

								<div class="caption-heading">TO SAVE YOU FROM ALL YOUR LAUNDRY BURDEN</div>

								<div class="caption-desc">Our Dhobi's are all ready to have hands with your pile of clothes.</div>

								<a href="schedule-a-pickup.php" title="" class="btn btn-default">BOOK A DHOBI</a>

							</div>

						</div>

					</div>

				</div>

				<div class="item">

					<img src="images/bannernew1.jpg" alt="...">

					<div class="carousel-caption">

						<div class="container">

							<div class="wrap-caption">

								<div class="caption-heading">OUR EXPERT DHOBI'S MAKE YOUR LAUNDRY EASY</div>

								<div class="caption-desc">It is no longer a tedious job to get your laundry done. </div>

								<a href="schedule-a-pickup.php" title="" class="btn btn-default">BOOK A DHOBI</a>

							</div>

						</div>

					</div>

				</div>

				

				<div class="item">

					<img src="images/bannernewest5.jpg" alt="...">

					<div class="carousel-caption">

						<div class="container">

							<div class="wrap-caption">

								<div class="caption-heading">BUDGET PRICING & SUBSCRIPTION OFFERS JUST FOR YOU!</div>

								<div class="caption-desc">When you get expert services in your budget, what more you can expect!</div>

								<a href="schedule-a-pickup.php" title="" class="btn btn-default">BOOK A DHOBI</a>

							</div>

						</div>

					</div>

				</div>

				

			</div>

			<!-- Controls -->

			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">

				<span class="fa fa-chevron-left" ></span>

				<span class="sr-only">Previous</span>

			</a>

			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">

				<span class="fa fa-chevron-right" ></span>

				<span class="sr-only">Next</span>

			</a>

		</div>

<!--<marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()" style="

        padding: 10px;

    color: #f63954;

    font-weight: bold;

    background: #fcfcfc;

    font-size: 12px;

    border-top: 1px solid rgb(241, 241, 241);

    text-transform: uppercase;">On the occasion of Independence Day, we would be closed on 15th August 2016. Regrets for the inconvenience caused. Happy Independence Day.</marquee>-->

		<!-- END CAROUSEL -->

		

		<!--<div class="work-info">

			<div class="container">

				<div class="work-info-item">

					<div class="work-info-icon">

						<span class="fa fa-phone"></span>

					</div>

					<div class="work-info-body">

						Have a question? call us now

						<div class="work-info-lead">+62 7144 3300</div>

					</div>

				</div>

				<div class="work-info-item">

					<div class="work-info-icon">

						<span class="fa fa-clock-o"></span>

					</div>

					<div class="work-info-body">

						We are open Non-Fri

						<div class="work-info-lead">Mon - Fri 08:00 - 17:00</div>

					</div>

				</div>

				<div class="work-info-item">

					<div class="work-info-icon">

						<span class="fa fa-envelope"></span>

					</div>

					<div class="work-info-body">

						Need Support? Drop us an email

						<div class="work-info-lead"><a href="mailto:Support@yoursite.com" title="">Support@yoursite.com</a></div>

					</div>

				</div>

			</div>

		</div>-->

	</div>

	

	

	<!-- ABOUT SECTION -->

	<div class="section about" style="background:url('images/BG.png') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead hideme">HOW IT WORKS?</h2>

						<!--<p class="sublead">This template is designed with a unique and simple, so that it can promote and laundry business solution.</p>-->

					</div>

				</div>

			</div>

			

			<div class="row">

			

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

					<div class="why-item">

						<div class="">

							<!--<div class="fa fa-flash"></div>-->

							<img src="images/5.png" class="">

						</div>

						<div class="ket">

							<h4>SIGN UP</h4>

							<p class="hideme">Simple registration process & you can place your order hassle free.</p>

						</div>

					</div>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

					<div class="why-item">

						<div class="">

							<!--<div class="fa fa-money"></div>-->

							<img src="images/2.png">

						</div>

						<div class="ket">

							<h4>PICK UP</h4>

							<p class="hideme">Our Dhobi's are all ready to pick your clothes up. Count on us!</p>

						</div>

					</div>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

					<div class="why-item">

						<div class="">

							<!--<div class="fa fa-truck"></div>-->

							<img src="images/4.png">

						</div>

						<div class="ket">

							<h4>CLEAN UP</h4>

							<p class="hideme">Let our expert Dhobi's do all the cleaning work for you.</p>

						</div>

					</div>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

					<div class="why-item">

						<div class="">

							<!--<div class="fa fa-life-bouy"></div>-->

							<img src="images/3.png">

						</div>

						<div class="ket">

							<h4>DELIVER</h4>

							<p class="hideme">What counts most is delivery with right approach. Expect from us :)</p>

						</div>

					</div>

				</div>

				

			</div>

			

		</div>

	</div>

<div class="section blog pbot-main">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title1">

						<h2 class="lead1 hideme leftaligner leftborder">WHY TRUST US?</h2>

						<p class="sublead hideme leftaligner">We provide on-demand laundry services that focus on the convenience of the end user. We pride ourselves on using the best of machinery and detergents in order to give the end user only the best quality of service! We want the world to know about our expert laundry services - we want every new customer to turn into a repeat customer, and every repeat customer to be our staunchest advocate!</p><br />

						<p><a href="about.php" title="" class="btn btn-default rightaligner">READ MORE</a></p>

					</div>

				</div>

				

	

	<?php if(isset($_GET['successAddOrder'])){

	if($_GET['successAddOrder']==1){?>

		<div class="succ">You Have Successfully Placed Your Order!!</div>

	<?php }elseif($_GET['successAddOrder'] == 0){?>

		<div>Could Not Edit</div>

	<?php } ?>

	<?php }?>

	<?php if(isset($_GET['successEnquiry'])){

	if($_GET['successEnquiry']==1){?>

		<div class="succ">You Have Successfully Sent An enquiry!!</div>

	<?php }elseif($_GET['successEnquiry'] == 0){?>

		<div class="fail">Could Not Send</div>

	<?php } ?>

	<?php  } ?>

				<!--<div class="col-sm-12 col-md-3">

				<img src="images/logoblack.png" class="logoblack" />

				</div>-->

				

			</div>		

		</div>

	</div>

	

	<div class="section stat-facts"  style="background:url('images/BG.png') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">

		<div class="bg-overlay">

			<div class="container">

			<div class="page-title">

						<h2 class="lead hideme">CRAZY PRICING</h2>

						<p class="sublead white" style="color:#FFFFFF;">Rs. 30 Will be charged extra as delivery charges for order below Rs.150 or below 3 KGs.</p>

					</div>

				<div class="row">

					

					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

						<div class="stat-item">

							<div class="">

								<!--<i class="fa fa-briefcase"></i>		-->	

								<img src="images/6.png">				

								</div>

							<div class="stat-title">

								<h3 class="number hideme">WASH & FOLD</h3>

								<p>Rs.49/Kg</p>

								<!--<p><a href="account.php"><button type="submit" class="btn btn-default">Get This</button></a></p>-->

							</div>	

						</div>

					</div>

					

					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

						<div class="stat-item">

							<div class="">

								<img src="images/7.png">						

								</div>

							<div class="stat-title">

								<h3 class="number hideme">STEAM IRONING</h3>

								<p>Starts at Rs.6</p>

								<!--<p><a href="account.php"><button type="submit" class="btn btn-default">Get This</button></a></p>-->

							</div>	

						</div>

					</div>

					

					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

						<div class="stat-item">

							<div class="">

								<img src="images/8.png">						

								</div>

							<div class="stat-title">

								<h3 class="number hideme">WASH & IRON</h3>

								<p>Rs.79/Kg</p>

								<!--<p><a href="account.php"><button type="submit" class="btn btn-default">Get This</button></a></p>-->

							</div>	

						</div>

					</div>

					

					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

						<div class="stat-item">

							<div class="">

								<img src="images/9.png">						

								</div>

							<div class="stat-title">

								<h3 class="number hideme">DRY CLEAN</h3>

								<p>Starts at Rs.30</p>

								<!--<p><a href="account.php"><button type="submit" class="btn btn-default">Get This</button></a></p>-->

							</div>	

						</div>

					</div>

					

				</div>

			</div>

		</div>

	</div>

	

	<!-- SERVICES SECTION -->

	<!--<div class="section services">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead">OUR SERVICES</h2>

						<p class="sublead">This template is designed with a unique and simple, so that it can promote and laundry business solution.</p>

					</div>

				</div>

			</div>

			

			<div class="row">

			

				<div class="col-sm-6 col-md-4">

					<div class="services-item left">

						<div class="icon">

							<img src="images/home-service-img-1.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>COIN LAUNDRY</h4>

							<p>Yes! Our templates already for desktop, tablet and mobile layout versions.</p>

						</div>

					</div>

					<div class="services-item left">

						<div class="icon">

							<img src="images/home-service-img-2.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>REDENTIAL LAUNDRY</h4>

							<p>We give you good documentation to make easy to understand.</p>

						</div>

					</div>

					<div class="services-item left">

						<div class="icon">

							<img src="images/home-service-img-3.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>BUSINESS LAUNDRY</h4>

							<p>Create and publish dynamic websites for dekstop and mobile devices.</p>

						</div>

					</div>

				</div>

				

				<div class="col-sm-6 col-md-4 col-md-offset-4">

					<div class="services-item right">

						<div class="icon">

							<img src="images/home-service-img-4.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>COIN LAUNDRY</h4>

							<p>Yes! Our templates already for desktop, tablet and mobile layout versions.</p>

						</div>

					</div>

					<div class="services-item right">

						<div class="icon">

							<img src="images/home-service-img-5.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>REDENTIAL LAUNDRY</h4>

							<p>We give you good documentation to make easy to understand.</p>

						</div>

					</div>

					<div class="services-item right">

						<div class="icon">

							<img src="images/home-service-img-6.jpg" alt="" class="img-circle" />						</div>

						<div class="ket">

							<h4>BUSINESS LAUNDRY</h4>

							<p>Create and publish dynamic websites for dekstop and mobile devices.</p>

						</div>

					</div>

				</div>

				

				<div class="col-sm-12 col-md-4 col-md-offset-4">

					<div class="services-item-image">

						<img src="images/service_img_home2-u24208-fr.png" alt="" />					</div>

				</div>

				

			</div>

			

		</div>

	</div>-->

		

	

	

	<div class="section blog pbot-main">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-6">

					<div class="page-title">

						<h2 class="lead1 hideme leftaligner leftborder">OUR SERVICES</h2>

						<p class="sublead hideme leftaligner">Our dhobi's are all ready to deliver the best services.</p>

					</div>

				</div>

			</div>

			

			<div class="row">

				

				<div class="col-sm-12 col-md-4 hover01">

					<div class="blog-item">

						<div class="gambar">

							<!--<div class="icon-news">

								<div class="fa fa-image"></div>

							</div>-->

							<figure><img src="images/oner.jpg" alt="" class="img-responsive"/>	</figure>					</div>

						<div class="item-body">

							<div class="description">

								<p class="lead">

									<a href="services.php#wf" title="">WASHING</a>								</p>

								<p class="hideme">When our dhobi's are all geared up for washing your clothes. Then why worry about the pile of unwashed clothes?</p>

							</div>

							<div class="body-footer">

								<div class="author">

									<a href="services.php#wf" title=""><i class="fa fa-arrow-circle-right"></i> READ MORE</a>								</div>

								<div class="date">

									<a href="schedule-a-pickup.php"><img src="images/book.png" width="13" /> BOOK A DHOBI	</a>							</div>

							</div>

						</div>

					</div>

				</div>

				

				<div class="col-sm-12 col-md-4 hover01">

					<div class="blog-item">

						<div class="gambar">

							<!--<div class="icon-news">

								<div class="fa fa-image"></div>

							</div>-->

							<figure><img src="images/two.jpg" alt="" class="img-responsive" /></figure>						</div>

						<div class="item-body">

							<div class="description">

								<p class="lead">

									<a href="services.php#if" title="">IRONING</a>								</p>

								<p class="hideme">Our Dhobi's wash your clothes well but iron it better. What a boon it is to get all sorted nice & clean.</p>

							</div>

							<div class="body-footer">

								<div class="author">

									<a href="services.php#if" title=""><i class="fa fa-arrow-circle-right"></i> READ MORE	</a>							</div>

								<div class="date">

									<a href="schedule-a-pickup.php"><img src="images/book.png" width="13" /> BOOK A DHOBI</a>								</div>

							</div>

						</div>

					</div>

				</div>

				

				<div class="col-sm-12 col-md-4 hover01">

					<div class="blog-item">

						<div class="gambar">

							<!--<div class="icon-news">

								<div class="fa fa-image"></div>

							</div>-->

							<figure><img src="images/Dry.jpg" alt="" class="img-responsive" /></figure>						</div>

						<div class="item-body">

							<div class="description">

								<p class="lead">

									<a href="services.php#d" title="">DRY CLEAN</a>								</p>

								<p class="hideme">Washing, Ironing & what's next! Yes, Dry-cleaning that make your clothes all suited up.</p>

							</div>

							<div class="body-footer">

								<div class="author">

									<a href="services.php#d" title=""><i class="fa fa-arrow-circle-right"></i> READ MORE	</a>							</div>

								<div class="date">

									<a href="schedule-a-pickup.php"><img src="images/book.png" width="13" /> BOOK A DHOBI		</a>						</div>

							</div>

						</div>

					</div>

				</div>

				

			</div>

		</div>

	</div>

	

	<div class="section about" style="background:url('images/BG.png') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead hideme">CONTACT US</h2>

					</div>

				</div>

			</div>

			

			<div class="row">

			<form action="ajax/add-enquiry.php" method="post">

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

									<div class="form-group">

										<input type="text"  name="name" class="form-control marbot" placeholder="Your Full Name">

									</div>

								

				</div>

				

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

									<div class="form-group">

										<input type="text" name="emailId" class="form-control marbot" placeholder="Your Email Here">

									</div>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

									<div class="form-group">

										<input type="text" name="message" class="form-control" placeholder="Your Message Here">

									</div>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

									<div class="form-group">

				<button type="submit" class="btn btn-defaultcontact">SEND</button><br><br>

				</div>

				</div>

				</form>

				

				

				

			</div>

			

		</div>

	</div>

	

	<!-- TESTIMONIALS SECTION -->

	<div class="section testimonials">

		<div class="container">

			

			<div class="row">

				<div class="col-sm-12 col-md-12">

					<div class="page-title">

						<h2 class="lead1 hideme leftaligner leftborder">TESTIMONIALS</h2>

						<p class="sublead hideme leftaligner">What our happy customers say about us, matters the most.</p>

					</div>

				</div>

			</div>

			

			<div class="row">

				

				<div class="col-sm-12 col-md-6">

					<div class="testimonials-item">

						<div class="people">

							<img src="images/default.png" alt="" class="img-circle"  width="120"/>

							<h3>Anurag Poddar</h3>

						</div>

						<div class="quote-box">

							<p>"Everyday I use to think about my laundry problem. Here I got the Solution!"</p>

					</div>

				</div>

				</div>

				

				<div class="col-sm-12 col-md-6">

					<div class="testimonials-item">

						<div class="people">

							<img src="images/default.png" alt="" class="img-circle" width="120" />

							<h3>Siddharth</h3>

						</div>

						<div class="quote-box">

							<p>"It got all sorted when I found Heydhobi! Brilliant Services. Thanks"</p>	

						</div>

					</div>

				</div>

				

				<div class="col-sm-12 col-md-6">

					<div class="testimonials-item">

						<div class="people">

							<img src="images/default.png" alt="" class="img-circle" width="120" />

							<h3>Nemiraj Dhoka</h3>

						</div>

						<div class="quote-box">

							<p>"Their expert dhobi's truly made my task easy. Very resonable prices."</p>

						</div>

					</div>

				</div>

				

				<div class="col-sm-12 col-md-6">

					<div class="testimonials-item">

						<div class="people">

							<img src="images/default.png" alt="" class="img-circle" width="120" />

							<h3>Alisha J.</h3>

						</div>

						<div class="quote-box">

							<p>"Wow! That is great service. Easy pickup & drop service saves a lot of time."</p>

						</div>

					</div>

				</div>

				

			</div>

		</div>

	</div>

	<?php include 'footer.php'; ?>