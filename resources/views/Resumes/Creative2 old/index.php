	<?php
	    session_start();
		if(!isset($_SESSION["email"])):
	        header("Location: ../clogin.php");
	    endif;

	    //Instantiate db.php 
	    include '../../db.php';
	    $db = new Database();
	?>
	<!DOCTYPE html>
	<!-- <html class="no-js" lang="en"> -->
	    
	<head>
			<meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	        <meta name="description" content="Mim is a Personal Portfolio Template">
	        <meta name="keywords" content="Personal , Personal portfolio template, Personal portfolio, landing page, material design, portfolio, personal">
	        <meta name="author" content="regaltheme.com">

			
	        <title>Creative 2</title>
			
			<link rel="stylesheet" type="text/css" href="assets/css/semantic/semantic.css">
			<!-- favicon -->
	        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
			
			<style> 
				.center {
					padding-left: 25%;
				}
			</style>
			<!-- style css -->
			<link rel="stylesheet" href="style.css">
			<!-- modernizr js -->
	        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
			
	    </head>
	    <body>
	        <!--[if lt IE 8]>
	            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	        <![endif]-->
			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	        <!--[if lt IE 9]>
	          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	        <![endif]-->
			
			<!-- Loading Bar Start -->
			<div id="loading">
				<div id="loading-center">
					<div id="loading-center-absolute">
						<img src="assets/img/Jobfinder-logo.png" alt="Mim" />
						<div class="object" id="object_three"></div>
					</div>
				</div>
			</div>
			<!-- Loading Bar End -->
			<div id="home"></div>
			
			<!-- Header Section Start -->
			<header class="header-style-1 bg-color-1"><!-- style="height: 80%;" -->
				<div class="top clearfix">
					<div class="header-top active-sticky ptb-50">
						<div class="container">
							<div class="row">
								<div class="col-xs-6 col-sm-5">
									<div class="left">
										<div class="logo">
											<a href="index.html"><img src="assets/img/Jobfinder-logo.png" alt="Mim" /></a>
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-7">
									<div class="right">
	<!-- 									<div class="expand-menu-open floatright">
											<i class="zmdi zmdi-menu"></i>
										</div> -->
										<nav class="mainmenu onepage-nev floatright">
											<ul class="clearfix">
												<li><a href="#home">Home</a></li>
												<li><a href="#about">About</a></li>
												<li><a href="#skills">Skills</a></li>
												<li><a href="#education">Education</a></li>
												<li><a href="#experience">Experience</a></li>
												<li><a href="#portfolio">PORTFOLIO</a></li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bottom slider-area">
					<div class="container">
						<div class="row relative">
							<div class="col-xs-12 col-sm-6 static">
								<div class="slider-text percent-50">
									<h5 class="mb-11">Hello, I am</h5>
									<h1 class="mb-30">
			                            <?php 
			                                $result = $db->get_candidate_user_info("romeo@gmail.com", 3);
			                                $result1 =$db->get_candidate_user_info("romeo@gmail.com", 4);
			                                foreach($result[1] as $row) {
			                                    echo $row[0]." ";	
			                                }
			                                foreach($result1[1] as $row1) {
			                                    echo $row1[0] ;	
			                                }
			                            ?>
									</h1>
									<p class="font-16 line-height-28" style="padding-left: 2%;">
			                            <?php 
			                                $result2 = $db->get_candidate_user_info("romeo@gmail.com", 15);
			                                $result3 =$db->get_candidate_user_email("romeo@gmail.com");
			                                $result4 =$db->get_candidate_user_info("romeo@gmail.com", 6);
			                                $result5 =$db->get_candidate_user_info("romeo@gmail.com", 7);
			                                $result6 =$db->get_candidate_user_info("romeo@gmail.com", 8);
			                                $result14 =$db->get_candidate_user_info("romeo@gmail.com", 9);

			                                foreach($result2[1] as $row2) {
			                                	if(empty($row2)) {
			                                		break;
			                                	}
			                                	else {
			                                		echo "<strong>Address: </strong>";
				                                    echo $row2[0];
				                                    echo "<br>";
			                                	}
			                                }
			                                foreach($result3[1] as $row3) {
			                                	if(empty($row3[0])) {
			                                		break;
			                                	}
			                                	else {
			                                		echo "<strong>Email: </strong>";
				                                    echo $row3[0];
				                                    echo "<br>";
			                                	}
			                                }
			                                foreach($result4[1] as $row4) {
			                                	foreach($result5[1] as $row5) {
				                                	if(empty($row4[0])) {
				                                		break;
				                                	}
				                                	else {
					                                	if(empty($row5[0])) {
					                                		break;
					                                	}

					                                	else {
			                                				echo "<strong>Contact Number(s): </strong>";
						                                    echo $row4[0]. ", ".$row5[0];
						                                    echo "<br>";
					                                	}
				                                	}
			                                	}
			                                }
			                                foreach($result6[1] as $row6) {
			                                	foreach($result14[1] as $row14) {
				                                	if(empty($row6[0])) {
				                                		break;
				                                	}
				                                	else {
					                                	if(empty($row14[0])) {
					                                		break;
					                                	}

					                                	else {
			                                				echo "<strong>Tel No(s): </strong>";
						                                    echo $row6[0]. ", ".$row14[0];
						                                    echo "<br>";
					                                	}
				                                	}
			                                	}
			                                }
			                            ?>
									</p>
									<br></br>
									<div class="slider-button smooth-scroll mt-40">
										<a class="btn lg-btn" href="#portfolio">my work</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="slider-img text-right">
									<img class="ui large circular image" src="
										<?php 
			                                $result7 = $db->get_candidate_user_info("24", 2);
			                                foreach($result7[1] as $row7) {
			                                    echo $row7[0] ;	
			                                }

			                            ?>
			                        ">
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- Header Section End -->
			<!-- About Section Start -->
			<section class="about-area section-padding light-bg text-center" id="about">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title mb-60">
								<h2 class="mb-20">About Me</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12" style="padding-left: 50px;">
							<div class="left mr-40 animate move-fadeInUp" >
								<h3 class="font-22 capitalize">Howdy!</h3>
								<p class="font-16 line-height-28">
		                            <?php 
		                                $result8 = $db->get_resume_detail("24");
		                                foreach($result8[1] as $row8) {
		                                    echo $row8[3] ;	
		                                }
		                            ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- About Section End -->

			<!-- Skills Section Start -->
			<section class="experience-area section-padding bg-color-1" id="skills">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-60">
								<h2 class="mb-20">My Skills</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row" >

						<!-- <div class="col-xs-12 col-sm-6 mobile-mb-30 "> -->
							<div class="skill-progress" >

		                            <?php 
		                            	$result9 = $db->get_candidate_skill("24");
		                                foreach($result9[1] as $row9) {
									?>
					                           <div class="skill-bar text-center" data-percentage= "<?php echo $row9[4]."%"; ?>">
											 	    <h4 class="progress-title-holder"> 
													        <span class="progress-title" style="font-size: 20px;"><?php echo $row9[3]; ?></span>
													        <br></br>	
															<span class="progress-wrapper">
																<span class="progress-mark">
																	<span class="percent"></span>
																</span>
															</span>
													  </h4>
													 <div class="progress-outter">
														 <div class="progress-content"></div>
												 	 </div>
											    </div>
											    <br></br>
		                            <?php
		                            	}
		                            ?>
								
							</div>
						<!-- </div> -->


				</div>
			</section>
			<!-- Skills Section End -->

			<!-- Education Section Start -->
			<section class="experience-area section-padding light-bg" id="education">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-60">
								<h2 class="mb-20">My Education</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-12" style="overflow-wrap: break-word; padding-left: 30%; padding-right: 10%;">
							<!-- style="overflow-wrap: break-word; border: 1px solid green; padding-left: 30%; padding-right: 10%;" -->
							<?php 
			                            $result10 = $db->get_candidate_education("24");
				                        foreach($result10[1] as $row10) {
				                        	if(empty($row10[5])) {

				                        	}
		                     ?>
									<p>
										<h2 class="capitalize font-20"><?php echo $row10[4]; ?></h2>
										<h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row10[5]; ?></h4>
										<p class="montserrat weight-medium"><?php echo $row10[7]."-".$row10[8]; ?></p>
										<p><?php echo $row10[6]; ?></p>
										<br>
									</p>
							<?php
										}
							?>
							</div>
					</div>
				</div>
			</section>
			<!-- Education Section End -->

			<!-- Experience Section Start -->
			<section class="portfolio-area portfolio-one section-padding bg-color-1 clearfix" id="experience">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-60">
								<h2 class="mb-20">My Experience</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="animate move-fadeInLeft mb-20 center clearfix">
						<?php 
			                           $result11 = $db->get_candidate_experience("24");
				                       foreach($result11[1] as $row11) {
		                ?>
							<div class="single-experi mb-50 ">
								<div class="left-text floatleft relative">
									<h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row11[3]; ?></h4>
									<p class="montserrat weight-medium"><?php echo $row11[6]."-".$row11[7]; ?></p>
								</div>
								<div class="right-text"  id ="exp-right" style="overflow-wrap: break-word;>
									<i class="zmdi zmdi-check-circle"></i>
									<h3 class="capitalize font-20"><?php echo $row11[4]; ?></h3>	
									<p><?php echo $row11[5]; ?></p>
								</div>
							</div>
						<?php
									}
						?>
						</div>
					</div>
				</div>
			</section>
			<!-- Experience Section End -->

			<!-- Portfolio Section Start -->
			<section class="portfolio-area portfolio-one light-bg section-padding clearfix" id="portfolio">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-30">
								<h2 class="mb-20">My Portfolio</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row text-center">
						<h4 class="mb-20">Photos</h4>
						<div class="col-xs-12">
							<div class="portfolio-grid">
							<?php 
			                            $result12 = $db->get_candidate_portfolio_photos("24");
				                        foreach($result12[1] as $row12) {
		                     ?>
								<div class="grid-item new gallery percent-33">
									<div class="single-portfolio overlay light-1 text-center">
										<img src="<?php echo $row12[3]; ?>" alt="Mim" />
										<div class="zoom-icon">
											<a href="<?php echo $row12[3]; ?>" class="fancybox">
												<i class="zmdi zmdi-filter-center-focus"></i>
											</a>
										</div>
										<div class="project-title text-left">
											<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php echo $row12[5]; ?></h4>
											<p class="montserratlight"><?php echo $row12[6]; ?></p>
										</div>
									</div>
								</div>
							<?php
										}
							?>
							</div>
						</div>
					</div>
					<br></br>
					<br></br>
					<div class="row text-center">
						<h4 class="mb-20">Videos</h4>
							<div class="col-xs-12">
								<div class="portfolio-grid">
								<?php 
				                            $result13 = $db->get_candidate_portfolio_videos("24");
					                        foreach($result13[1] as $row13) {
			                     ?>
										<div class="grid-item web design web gallery percent-33">
											<div class="single-portfolio overlay light-1 text-center">
												<img src="<?php echo $row13[3]; ?>" alt="Mim" />
												<div class="title plr-40 text-center">
													<div class="zoom-icon">
														<a class="various fancybox" data-fancybox-type="iframe" title="<?php echo $row13[5]; ?>" href="<?php echo $row13[4] ."?&amp;autoplay=1"?>;">
															<i class="zmdi zmdi-play"></i>
														</a>
													</div>
													<div class="project-title text-left">
														<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php echo $row13[5]; ?></h4>
														<p class="montserratlight"><?php echo $row13[6]; ?></p>
													</div>
												</div>
											</div>
										</div>

								<?php
											}
								?>	
								</div>
							</div>
					</div>
				</div>
			</section>
			<!-- Portfolio Section End -->
			<!-- Footer Section Start -->
			<footer class="footer bg-color-1 ptb-20">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="left floatleft">
								<p></p>
							</div>
							<div class="right social-link floatright">
								<!-- <ul class="clearfix">
									<li><a href="http://www.facebook.com/" target="_blank">Facebook</a></li>
									<li><a href="http://www.twitter.com/" target="_blank">Twitter</a></li>
									<li><a href="http://www.linkedin.com/" target="_blank">Linkden</a></li>
									<li><a href="mailto:regaltheme@gmail.com" target="_blank">Email</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- Footer Section End -->
			
			<!-- All JS Here -->
			<!-- jQuery Latest Version -->
	        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
			<!-- Bootstrap JS -->
	        <script src="assets/js/bootstrap.min.js"></script>
			<!-- One Page Nav JS -->
	        <script src="assets/js/one-page-nav.js"></script>
			<!-- Waypoints JS -->
	        <script src="assets/js/waypoints.min.js"></script>
			<!-- Progressbar JS -->
	        <script src="assets/js/progressbar.js"></script>
			<!-- Isotope -->
	        <script src="assets/js/isotope.pkgd.js"></script>
			<!-- Isotope -->
	        <script src="assets/js/jquery.validate.min.js"></script>
			<!-- Slick Slider JS -->
	        <script src="assets/js/slick.min.js"></script>
			<!-- Fancybox JS -->
	        <script src="assets/js/jquery.fancybox.pack.js"></script>
			<!-- Plugins JS -->
	        <script src="assets/js/plugins.js"></script>
			<!-- main JS -->
	        <script src="assets/js/main.js"></script>

	        <script type="text/javascript">
	            $(document).ready(function(){
					$("#skill_bar").progress();       
	            });
	        </script>
	        </script>
	    </body>

	</html>
