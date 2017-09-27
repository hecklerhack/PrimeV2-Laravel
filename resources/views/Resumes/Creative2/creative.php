<?php
    include '../../db.php';
    $db = new Database();
    session_start();
    if(!isset($_SESSION["email"])){
        if (!isset($_GET['u'])){
        header("Location: ../../pages/clogin.php");
        }   
    }

    
    if(isset($_GET["u"])){
        $id = $db->get_user_email($db->get_user_info_using_url(2,$_GET['u']));
    } else if(($db->get_user_type(4, $_SESSION["email"]) != 1) || ($db->get_user_type(5, $_SESSION["email"]) != 1)){
        $id = $_SESSION["email"];
    } 
    //Instantiate db.php 
    function time_elapsed_string($datetime, $full = false) {
            date_default_timezone_set("Asia/Manila");
            $now = new DateTime(date("Y-m-d h:i:sa"));
            $now->setTimezone(new DateTimeZone('Asia/Manila'));  
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
        
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
        
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
	?>
</style>
	<!DOCTYPE html>
	<!-- <html class="no-js" lang="en"> -->
<html>
	<head>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
	        <meta name="description" content="Mim is a Personal Portfolio Template">
	        <meta name="keywords" content="Personal , Personal portfolio template, Personal portfolio, landing page, material design, portfolio, personal">
	        <meta name="author" content="regaltheme.com">

			
	       <title>Resume | <?php 
            if(isset($_GET["u"])){
                echo $_GET['u'];    
            } else {
                echo $_SESSION['email'];
            }
            
            
            ?></title>
			
			<link rel="stylesheet" type="text/css" href="assets/css/semantic/semantic.css">
			<!-- favicon -->
	        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
			
			<style> 
				.center {
					padding-left: 25%;
				}
                
                /* The switch - the box around the slider */
            .switch {
              position: relative;
              display: inline-block;
              width: 45px;
              height: 25px;
            }

            /* Hide default HTML checkbox */
            .switch input {display:none;}

            /* The slider */
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #d92525;
              -webkit-transition: .4s;
              transition: .4s;
            }

            .slider:before {
              position: absolute;
              content: "";
              height: 15px;
              width: 15px;
              left: 1.75px;
              bottom: 6px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }

            input:checked + .slider {
              background-color: green;
            }

            input:focus + .slider {
              box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }

            .slider.round:before {
              border-radius: 50%;
            }
                
                li[class='clearfix'] {
                    margin-bottom: -1%;
                }
                
            div.gallery {
                margin: 5px;
                border: 3px solid #ccc;
                float: left;
                width: 375px;
            }
            
            div.gallery:hover {
                border: 1px solid #777;
            }
            
            div.gallery img {
                width: 100%;
                height: auto;
            }
            
            div.desc {
                padding: 15px;
                text-align: center;
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
			
			
			<div id="home"></div>
			
			<!-- Header Section Start -->
            
			<section class="experience-area section-padding light-bg text-center"><!-- style="height: 80%;" -->
				<div class="top clearfix">
					<div class="header-top active-sticky ptb-50">
						<div class="container">
							<div class="row">
								<div class="col-xs-6 col-sm-5">
									<div class="left">
										<div class="logo">
											
										</div>
									</div>
								</div>
                                
								<div class="col-sm-13">
                                    
									<div class="left">
                                        
	<!-- 									<div class="expand-menu-open floatright">
											<i class="zmdi zmdi-menu"></i>
										</div> -->
										<nav class="mainmenu onepage-nev floatright">
                                            
											<ul class="clearfix">
												<li><a href="#home">Home</a></li>
												<li><a href="#about">About</a></li>
												<li><a href="#skills">Skills</a></li>
                                                <?php
                                                    $result10_temp = $db->get_candidate_education($id);
                                                    $chk_educ = false;
                                                    foreach($result10_temp[1] as $row10) {
                                                        if($row10[9] == 1){
                                                            $chk_educ = true;
                                                            break;
                                                        }
                                                    }
                                                    if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){
                                                ?>
												<li><a href="#education">Education</a></li>
                                                <?php }
                                                    $result11_temp = $db->get_candidate_experience($id);
                                                    $chk_work = false;
                                                    foreach($result11_temp[1] as $row11) {
                                                        if($row11[3] == 1){
                                                            $chk_work = true;
                                                            break;
                                                        }
                                                    }
                                                    if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
                                                ?>
												<li><a href="#experience">Experience</a></li>
                                                <?php } ?>
                                                
                                                <?php 
                                                        if($chk_work && $chk_educ){
                                                            $bg = 0;
                                                        } else if($chk_work){
                                                            $bg = 1;
                                                            /*
                                                                work = light bg
                                                                ach = dark bg
                                                                mem = light bg
                                                                portfolio = dark bg
                                                            */
                                                        } else if($chk_educ){
                                                            $bg = 2;
                                                            /*
                                                                ach = dark bg
                                                                mem = light bg
                                                                portfolio = dark bg
                                                            */
                                                        } else {
                                                            $bg = 0;
                                                        }
                                                ?>
                                                <li><a href="#achievement">Achievement</a></li>
                                                <li><a href="#membership">Membership</a></li>
												<li><a href="#portfolio">PORTFOLIO</a></li>
                                                
											</ul>
										</nav>
									</div>
								</div>
                                <!--<div class="col-xs-10 col-sm-2">
                                <div class="ui small test modal confirm">
                                    <div class="header">
                                      Save
                                    </div>
                                    <div class="content">
                                      <p>Do you want to save changes?</p>
                                    </div>
                                    <div class="actions">
                                      <div id = "unconfirm_update" class="ui blue button cancel">
                                        Cancel
                                      </div>
                                      <div id = "cancel_update" class="ui negative button cancel">
                                        No
                                      </div>
                                      <div id = "confirm_update" class="ui positive button ok">
                                        Yes-->
                                        <!--<i id = "confirm_update_icon" class="checkmark icon"></i>s-->
                                      <!--</div>
                                    </div>
                                </div>
                                    <input type="button" class="ui green button" value="Save Changes" onclick = "confirm_action()">
                                    
                                </div>-->
							</div>
						</div>
					</div>
				</div>
				<div class="bottom slider-area">
					<div class="container">
						<div class="row relative">
							<div class="col-xs-12 col-sm-6 static">
								
							</div>
							<!--<div class="col-xs-12 col-sm-6">
								<div class="slider-img text-right">

									<!-- Retrieves candidate photo based on ID 
									<img class="ui large circular image" src="
										<?php 
                                                    $result7 = $db->get_candidate_user_info($id, 2);
                                                    foreach($result7[1] as $row7) {
                                                        echo $row7[0] ; 
                                                    }

                                                ?>
			                        ">
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</section>
			<!-- Header Section End -->

            <!-- About Section Start -->
			<section class="experience-area section-padding bg-color-1 text-center"  id="home">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title mb-60">
									<h5 class="mb-11">Hello, I am</h5>
									<h1 class="mb-30">
                                        
                                        <!--<form method="post">
                                        <input type="hidden" name="request" value="update-resume-show-experience">
                                        <input type="submit" value="go">
                                        </form>--Testing>

										<!-- Retrieves candidate name based on ID -->
				                            <?php 
                                        
				                                $result = $db->get_candidate_user_info($id, 3);
				                                $result1 =$db->get_candidate_user_info($id, 4);
				                                foreach($result[1] as $row) {
				                                    echo $row[0]." ";	
				                                }
				                                foreach($result1[1] as $row1) {
				                                    echo $row1[0] ;	
				                                }
				                            ?>
									</h1>
									
									 <center><p><?php 
                                    echo "Last updated: ".time_elapsed_string($db->get_last_resume_updated($id)); 
                                    echo "<br>Last active: ".time_elapsed_string($db->get_last_active($id));
                                     ?></p></center>
									<br>
                                <div class="feature-img">
                                <!--<a href="index-2.html">--><img src="<?php 
                                                    $result7 = $db->get_candidate_user_info($id, 2);
                                                    foreach($result7[1] as $row7) {
                                                        if($row7[0] != ""){
                                                            echo "../../".$row7[0];
                                                        } else {
                                                            echo "../../uploads/default.jpg";
                                                        }
                                                    }

                                                ?>" class="responsive-img" alt=""><!--</a> -->
                            </div>           
								
								<div class="horizontal-line"><br>
									<div class="top"></div>
									<div class="bottom"></div><br>
                                   
                                        <ul class="profile-list">
                                            <li class="clearfix">
                                                    <?php 
                                                        $result2 = $db->get_candidate_user_info($id, 6); //15);
                                                            foreach($result2[1] as $row2) {
                                                                if(empty($row2)) {
                                                                    break;
                                                                }
                                                                else {
                                                    ?>
                                                        <p class="font-20 line-height-28"><?php echo $row2[0];?></p>
                                                
                                                    <?php
                                                                }
                                                            }
                                                    ?> 
                                            
                                                <h5 class="capitalize font-15">Address</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                    <?php 
                                                        $result3 = $db->get_candidate_user_email($id);
                                                            foreach($result3[1] as $row3) {
                                                                if(empty($row3)) {
                                                                    break;
                                                                }
                                                                else {
                                                    ?>
                                                        <p class="font-20 line-height-28"><?php echo $row3[0]; ?></p>
                                                    <?php
                                                                }
                                                            }
                                                    ?>
                                                <h5 class="capitalize font-15">E-mail</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                <?php
                                                    $result4 =$db->get_candidate_user_info($id, 5); //6);
                                                    //$result5 =$db->get_candidate_user_info($_SESSION["email"], 7);
                                                    foreach($result4[1] as $row4) {
                                                    /*foreach($result5[1] as $row5) {
                                                        if(empty($row4[0])) {
                                                            break;
                                                        }
                                                        else {
                                                            if(empty($row5[0])) {
                                                                break;
                                                            }*/

                                                            //else {
                                                ?>
                                                    <p class="font-20 line-height-28">+63 <?php echo $row4[0]; ?></p>
                                                <?php
                                                            //}
                                                        //}
                                                    //}
                                                }      
                                                ?>
                                                <h5 class="capitalize font-15">Phone</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                <?php
                                                    $result6 =$db->get_candidate_user_info($id, 7); //8);
                                                    

                                                    foreach($result6[1] as $row6) {
                                                ?>

                                                <p class="font-20 line-height-28"><?php echo $row6[0];?></p>

                                                <?php 
                                                    }
                                                ?>
                                                <h5 class="capitalize font-15">Telephone</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                
                                                <?php 
                                                $result = $db->list_links($id);
                                                foreach($result as $row):
                                                    //Changes ex: "FaCeBoOk" into "facebook" for icon compatibility
                                                    $row[0] = str_replace(" ", "", strtolower($row[0]));
                                                
                                            ?>
                                              <a href="http://www.<?php echo $row[1]; ?>"><p class="font-20 line-height-28"><i class="circular <?php echo $row[0]; ?> icon"></i><?php echo $row[1]; ?></p></a>
                                            
                                                    <br>
                                            <?php endforeach; ?>
                                            <h5 style="margin-top: -3%;" class="capitalize font-15">Links</h5>
                                            </li>
                                        </ul>
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12" style="padding-left: 50px;">
							<div class="left mr-40 animate move-fadeInUp" >
								<!--<h3 class="font-22 capitalize">Howdy!</h3>-->
								<p class="font-16 line-height-28">

									<!-- Retrieves candidate intro based on ID 
			                            <?php 
			                                $result8 = $db->get_resume_detail($id);
			                                foreach($result8[1] as $row8) {
			                                    echo urldecode($row8[2]);	
			                                }
			                            ?>-->
								</p>
							</div>
						</div>
					</div>
			</section>
			<!-- About Section End -->

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
						<div class="col-xs-12" style="padding-left: 5%; padding-right: 5%;">
							<div class="left mr-40 animate move-fadeInUp" >
								<!--<h3 class="font-22 capitalize">Howdy!</h3>-->
								<p class="font-20 line-height-28" style="font-style: italic;">

									<!-- Retrieves candidate intro based on ID -->
			                            <?php 
			                                /*$result8 = $db->get_resume_detail($id);
			                                foreach($result8[1] as $row8) {
			                                    echo "\"".urldecode($row8[2])."\"";	
			                                }*/
                                    
                                            $result8 = $db->get_intro($id);
			                                foreach($result8[1] as $row8) {
			                                    echo "\"".$row8[0]."\"";	
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

								<!-- Retrieves all candidate skills based on ID -->
		                            <?php 
		                            	$result9 = $db->get_candidate_skill($id);
		                                foreach($result9[1] as $row9) {
									?>
					                           <div class="skill-bar text-center" data-percentage= "<?php echo $row9[3]."%"; ?>">
											 	    <h4 class="progress-title-holder"> 
													        <span class="progress-title" style="font-size: 20px;"><?php echo $row9[2]."<br>"; ?></span>
													        <br>
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
											    <br><br>
		                            <?php
		                            	}
		                            ?>
								
							</div>
						 </div>


				</div>
			</section>
			<!-- Skills Section End -->

			<!-- Education Section Start -->
            
                    <?php 
                        if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){ ?>
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
							<div class="col-xs-12" style="overflow-wrap: break-word; float: center;">

							<!-- Retrieves all candidate education based on ID -->
								<?php
                                                 $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
				                            $result10 = $db->get_candidate_education($id);
                                                foreach($result10[1] as $row10) {
                                                    if((isset($_GET["u"]) && $row10[9] == 1) || !isset($_GET["u"])){
			                     ?>
                                
                                <center>
                                <?php if(!isset($_GET["u"])){ ?>
                                
                                     <label class = 'switch'>
                                                <input class="education" name='show_education_resume_2' value='<?php echo $row10[0]; ?>' type='checkbox' <?php if($row10[9] == 1){ ?> checked <?php } else { ?> unchecked  <?php } ?>>
                                                <div class='slider round'></div>
                                            </label>
                                <?php } ?>
											<h2 class="capitalize font-20"><?php echo $row10[4]; ?></h2>
											<h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row10[3]; ?></h4>
											<p class="montserrat weight-medium"><?php echo $arr_loc[$row10[5]-1]; ?></p>
											<p><?php $date =  date_create($row10[6]);
                                                            $date1 =  date_create($row10[7]);
                                                            echo date_format($date, 'F Y')." - ";
                                                echo ($row10[7] == date("Y") ? "present" : date_format($date, 'F Y')); ?></p>
											<br>
                                    </center>
								<?php
											} }
								?>

							</div>
					</div>
                
				</div>
			</section>
            <?php } ?>
			<!-- Education Section End -->

			<!-- Experience Section Start -->
            <?php 
                if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
            ?>
			<!--<section class="portfolio-area portfolio-one section-padding bg-color-1 clearfix" id="experience">-->
            
            <section class="portfolio-area portfolio-one section-padding <?php echo (isset($_GET["u"]) && $bg == 1 ? "light-bg" : "bg-color-1"); ?> clearfix" id="experience">
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
					<div class="row">
						<div class="animate move-fadeInLeft mb-20 clearfix">

							<!-- Retrieves all candidate experience based on ID -->
								<?php
                                        $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
					                $result11 = $db->get_candidate_experience($id);
						                foreach($result11[1] as $row11) {
                                            if((isset($_GET["u"]) && $row11[3] == 1) || !isset($_GET["u"])){
				                ?>
                                           
                                            <!--<label class = 'switch'>
                                                <input name='show_experience_resume_2' value='<?php echo $row11[0]; ?>' type='checkbox' <?php if($row11[3] == 1){ ?> checked <?php } else { ?> unchecked  <?php } ?>>
                                                <div class='slider round'></div>
                                            </label>--Slider-->
                            
											<!--<div class="single-experi mb-50">-->
                            <center>
                                                <?php if(!isset($_GET["u"])){ ?>
                                            <label class = 'switch'>
                                                <input class="work" name='show_experience_resume_2' value='<?php echo $row11[0]; ?>' type='checkbox' <?php if($row11[3] == 1){ ?> checked <?php } else { ?> unchecked  <?php } ?>>
                                                <div class='slider round'></div>
                                            </label>
                                                <?php } ?>
												<!--<div class="left-text floatleft relative">-->
													<!--<h4 class="montserrat weight-medium mb-5 capitalize"><?php //echo $row11[7];//comp_name ?></h4>
													<p class="montserrat weight-medium"><?php /*echo $row11[10]."-";
                                                        echo ($row11[11] == date("Y") ? "present" : $row11[11]); //date*/?></p>-->
												<!--</div>-->
												<!--<div class="right-text floatcenter relative"  id ="exp-right" style="overflow-wrap: break-word;">-->
													<!--<i class="zmdi zmdi-check-circle"></i>-->
                                                    
													<h3 class="capitalize font-23"><?php echo $row11[5]; //position?></h3>
                                                    <!--<a data-tooltip="Edit"><i class="write square icon" data-mem-id="<?php echo $row11[0]; ?>"></i></a>-->	
													<p style="font-style: italic; margin-top: -1%; margin-bottom: 1%;"><?php echo $row11[8]; //location ?></p>
                                                    <h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row11[6];//comp_name ?></h4>
													<p><?php echo $arr_loc[$row11[7]-1]; //location ?></p>
                                                    
													<p class="montserrat weight-medium"><?php $date =  date_create($row11[9]);
                                                            $date1 =  date_create($row11[10]);
                                                            echo date_format($date, 'F Y')." - ";
                                                        echo ($row11[10] == date("Y") ? "present" : date_format($date1, 'F Y')); //date?></p>
                                <br>
                                </center>
												<!--</div>-->
											<!--</div>-->
								<?php
										} }
								?>
						</div>
					</div>
				</div>
			</section>
            <?php } ?>
            
			<!-- Experience Section End -->
            <!--<section class="experience-area section-padding light-bg" id="achievement">-->
            <section class="experience-area section-padding <?php echo (isset($_GET["u"]) && $bg != 0 ? "bg-color-1" : "light-bg"); ?>" id="achievement">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-60">
								<h2 class="mb-20">My Achievements</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-12" style="overflow-wrap: break-word;">
                                                                                                                                
							<!-- Retrieves all candidate education based on ID -->
								<?php 
				                            $result10 = $db->get_candidate_achievement($id);
					                        foreach($result10[1] as $row10) {
					                        	/*if(empty($row10[5])) {

					                        	}*/
			                     ?>
                                <center>
										
											<h2 class="capitalize font-20"><?php echo $row10[2]; ?></h2>
											<h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row10[3]; ?></h4>
											<p class="montserrat weight-medium"><?php echo $row10[4]?></p>
											<br>
                                    </center>
								<?php
											}
								?>

							</div>
					</div>
				</div>
			</section>
			<!-- Achievement Section End -->
            <!-- Membership Section End -->
            <!--<section class="experience-area section-padding bg-color-1" id="membership">-->
            <section class="experience-area section-padding <?php echo (isset($_GET["u"]) && $bg != 0 ? "light-bg" : "bg-color-1"); ?>" id="membership">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title text-center mb-60">
								<h2 class="mb-20">My Memberships</h2>
								<div class="horizontal-line">
									<div class="top"></div>
									<div class="bottom"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-12" style="overflow-wrap: break-word; padding-left: 10%; padding-right: 10%;">
                                                                                                                                
							<!-- Retrieves all candidate education based on ID -->
								<?php 
				                            $result10 = $db->get_candidate_membership($id);
					                        foreach($result10[1] as $row10) {
					                        	if(empty($row10[5])) {

					                        	}
			                     ?>
										<p>  
                                            <center>                                                                                
											<h2 class="capitalize font-20"><?php echo $row10[3]; ?></h2>
											<h4 class="montserrat weight-medium mb-5 capitalize"><?php echo $row10[2]; ?></h4>
											<p class="montserrat weight-medium"><?php echo $row10[4]." - ";
                                                echo ($row10[5] == date("Y") ? "present" : $row10[5]); ?></p>
											<br>
                                            </center>                                   
										</p>
								<?php
											}
								?>

							</div>
					</div>
				</div>
			</section>
			<!-- Membership Section End -->                                                                   
            
			<!-- Portfolio Section Start -->
			<!--<section class="portfolio-area portfolio-one light-bg section-padding clearfix" id="portfolio">-->
			<?php 
                    $photos_temp = $db->get_creative_contents($id);
                        $chk_photo = false;
                        foreach($photos_temp as $photo) {
                            if(strpos($photo[0], "uploads/") !== false){
                                $chk_photo = true;
                                break;
                            }
                        }
            
                    $videos_temp = $db->get_creative_contents($id);
                    $chk_vid = false;
                    foreach($videos_temp as $video) {
                        if(strpos($video[0], ".com") !== false){
                            $chk_vid = true;
                            break;
                        }
                    }
                
                if($chk_photo || $chk_vid){
                    
            ?>
			<section class="portfolio-area portfolio-one <?php echo (isset($_GET["u"]) && $bg != 0 ? "bg-color-1" : "light-bg"); ?> section-padding clearfix" id="portfolio">
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
                    
                    <?php
                        if($chk_photo){
                    ?>
					<div class="row text-center">
						<h4 class="mb-20">Photos</h4>
						<div class="col-xs-12">
							<div class="portfolio-grid">

								<!-- Retrieves all candidate porfolio photos based on ID -->
									<?php 
					                            $photos = $db->get_creative_contents($id);
						                        foreach($photos as $photo) {
                                                    if(strpos($photo[0], "uploads/") !== false){
                                                        
				                     ?>
				                     
                                        <center>
										<div class="gallery">
											<div class="single-portfolio overlay light-1 text-center">
												<img src="<?php echo "../../".$photo[0]; ?>" alt="Mim" />
												<div class="zoom-icon">
													<a href="<?php echo "../../".$photo[0]; ?>" class="fancybox">
														<i class="zmdi zmdi-filter-center-focus"></i>
													</a>
												</div>
												<div class="project-title text-left">
													<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php echo $photo[1]; ?></h4>
												</div>

										</div>
										</div>
                                        </center>
                                            
									<?php
												} }
									?>
                            
							</div>
						</div>
					</div>
					<br>
					<br>
                    <?php } 
                    
                    if($chk_vid){
                    ?>
					<div class="row text-center">
						<h4 class="mb-20">Videos</h4>
							<div class="col-xs-12">
								<div class="portfolio-grid">

									<!-- Retrieves all candidate porfolio videos based on ID -->
										<?php 
						                            $videos = $db->get_creative_contents($id);
							                        foreach($videos as $video) {
                                                        if(strpos($video[0], ".com") !== false){
                                                            $video_pos = strpos($video[0], "embed/");
                                                            $video_id = substr($video[0], $video_pos+6);
					                     ?>
                                        <center>
												<div class="grid-item web design web gallery percent-33">
													<div class="single-portfolio overlay light-1 text-center">
														<img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" alt="Mim" />
														<div class="title plr-40 text-center">
															<div class="zoom-icon">
																<a class="various fancybox" data-fancybox-type="iframe" title="<?php echo $video[1]; ?>" href="<?php echo $video[0] ."?&amp;autoplay=1"?>;">
																	<i class="zmdi zmdi-play"></i>
																</a>
															</div>
															<div class="project-title text-left">
																<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php echo $video[1]; ?></h4>
															</div>
														</div>
													</div>
												</div>
                                            </center>

										<?php
													} }
										?>	
								</div>
							</div>
					</div>
                    <?php } ?>
				</div>
			</section>
            <?php } ?>
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
            <!---Editing Experience-->
            <div class="ui modal" data-for="edit-membership">
                  <div class="header">Edit Experience</div>
                  <div class="content">
                    <form class="ui form" data-for="edit-membership" method="post" action="db.php">
                      <input type="hidden" name="request" value="update-resume-show-experience">
                        <input type="hidden" name="membership[no]" data-name="no">
       
                   
                      <button class="ui green button" name="show" value="1"type="submit">Show</button>
                      <button class="ui red button" name="show" value="0" type="button">Hide</button>
                    </form>
                  </div>
                </div>
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

	
            

		<script src="../../../../js/jquery.js"></script>
        
 <script type="text/javascript">
     
     
	            $(document).ready(function(){
					//$("#skill_bar").progress();
                    $("input[type='checkbox']").on("change", function(){
                        var act;
                        if(this.checked){
                            act = "1";
                        } else {
                            act = "0";
                        }
                        $.ajax({
                            type: "post",
                            url: "../../db.php",
                            data: {"request" : "update-resume", "no": "2", "id" : this.value, "table" : this.className, "act" : act},
                            dataType: "json"
                        });
                    });
	            });
            
</script>
            
            
	    </body>

	</html>