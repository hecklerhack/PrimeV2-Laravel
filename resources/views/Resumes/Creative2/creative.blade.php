<?php
   /* include '../../db.php';
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
    } */
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
            /*if(isset($_GET["u"])){
                echo $_GET['u'];    
            } else {
                echo $_SESSION['email'];
            }*/
            
            
            ?></title>
			
			<link rel="stylesheet" type="text/css" href="{{asset('Creative2/assets/css/semantic/semantic.css')}}">
			<!-- favicon -->
	        <link rel="shortcut icon" type="image/x-icon" href="{{asset('Creative2/assets/img/favicon.ico')}}">
			
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
			<link rel="stylesheet" href="{{asset('Creative2/style.css')}}">
			<!-- modernizr js -->
	        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
			
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
                                                    $chk_educ = false;
													foreach($education as $educ){
                                                        if($educ->show_resume_2 == 1){
                                                            $chk_educ = true;
                                                            break;
                                                        }
													}
                                                    //if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){*/
                                                ?>
												@if($chk_educ)
													<li><a href="#education">Education</a></li>
												@endif
                                                <?php 
							
                                                   // $result11_temp = $db->get_candidate_experience($id);
                                                    $chk_work = false;
													foreach($experience as $exp){
                                                        if($exp->show_resume_2 == 1){
                                                            $chk_work = true;
                                                            break;
                                                        }
													}
                                                    //if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){ */
                                                ?>
												@if($chk_work)
												<li><a href="#experience">Experience</a></li>
                                                <?php //} ?>
                                                @endif
                                                <?php 
                                                        if($chk_work && $chk_educ){
                                                            $bg = 0;
                                                        } else if($chk_work){
                                                            $bg = 1;
                                                       } else if($chk_educ){
                                                            $bg = 2;
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
                                                  /*  $result7 = $db->get_candidate_user_info($id, 2);
                                                    foreach($result7[1] as $row7) {
                                                        echo $row7[0] ; 
                                                    }
													*/
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
											{{$candidate->first_name." ".$candidate->last_name}}
									</h1>
									
									 <center><p><?php 
                                    echo "Last updated: ".time_elapsed_string($resume->last_resume_update); 
                                    echo "<br>Last active: ".time_elapsed_string($user->last_active);
                                     ?></p></center>
									<br>
                                <div class="feature-img">
                                <!--<a href="index-2.html">-->
								@if($candidate->dp_link != "")
									<img src="{{asset('candidates/images/'.$candidate->dp_link)}}" class="responsive-img" alt-"">
								@else
									<img src="{{asset('candidates/images/default.jpg')}}" class="responsive-img" alt="">
								@endif
                            </div>           
								
								<div class="horizontal-line"><br>
									<div class="top"></div>
									<div class="bottom"></div><br>
                                   
                                        <ul class="profile-list">
                                            <li class="clearfix">
                                                    <?php 
                                                       /* $result2 = $db->get_candidate_user_info($id, 6); //15);
                                                            foreach($result2[1] as $row2) {
                                                                if(empty($row2)) {
                                                                    break;
                                                                }
                                                                else { */
                                                    ?>
													@if(!empty($candidate->location))
                                                        <p class="font-20 line-height-28">{{$candidate->location}}</p>
													@endif
                                            
                                                <h5 class="capitalize font-15">Address</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                    <?php 
                                                     /*   $result3 = $db->get_candidate_user_email($id);
                                                            foreach($result3[1] as $row3) {
                                                                if(empty($row3)) {
                                                                    break;
                                                                }
                                                                else { */
                                                    ?>
													@if(!empty($user->email))
                                                        <p class="font-20 line-height-28">{{$user->email}}</p>
													@endif
                                                <h5 class="capitalize font-15">E-mail</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                <?php
                                                  /*  $result4 =$db->get_candidate_user_info($id, 5); 
                                                    foreach($result4[1] as $row4) {*/
                                                ?>
											
                                                    <p class="font-20 line-height-28">+63 {{$candidate->mobile_no}}</p>
                                                <h5 class="capitalize font-15">Phone</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                <?php
                                                   // $result6 =$db->get_candidate_user_info($id, 7); //8);
                                                    

                                                   // foreach($result6[1] as $row6) {
                                                ?>

                                                <p class="font-20 line-height-28">{{$candidate->tel_no}}</p>

                                                <h5 class="capitalize font-15">Telephone</h5>
                                            </li>
                                            <li class="clearfix">
                                                <br>
                                                
                                                <?php 
                                               // $result = $db->list_links($id);
                                                foreach($links as $link):
                                                    //Changes ex: "FaCeBoOk" into "facebook" for icon compatibility
                                                    $link->website = str_replace(" ", "", strtolower($link->website)); 
												
                                            ?>
                                              <a href="http://www.{{$link->link}}"><p class="font-20 line-height-28"><i class="circular <?php echo $link->website ?> icon"></i><?php echo $link->link ?></p></a>
                                            
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
										{{"\"".$resume->intro."\""}}
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
									@foreach($skills as $skill)
					                           <div class="skill-bar text-center" data-percentage= "<?php echo $skill->percent."%"; ?>">
											 	    <h4 class="progress-title-holder"> 
													        <span class="progress-title" style="font-size: 20px;"><?php echo $skill->skills."<br>"; ?></span>
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
									@endforeach
								
							</div>
						 </div>


				</div>
			</section>
			<!-- Skills Section End -->
			<!-- Education Section Start -->
            
                    <?php 
                       // if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){ ?>
			@if($chk_educ)
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
                                   /*              $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
				                            $result10 = $db->get_candidate_education($id);
                                                foreach($result10[1] as $row10) {
                                                    if((isset($_GET["u"]) && $row10[9] == 1) || !isset($_GET["u"])){*/
			                     ?>
                                @foreach($education as $educ)
                                <center>
                                <?php //if(!isset($_GET["u"])){ ?>
                                @if(Session::has("u"))  <!-- temporary condition -->
                                     <label class = 'switch'>
                                                <input class="education" name='show_education_resume_2' value='<?php echo $educ->id ?>' type='checkbox' <?php if($educ->show_resume_2 == 1){ ?> checked <?php } else { ?> unchecked  <?php } ?>>
                                                <div class='slider round'></div>
                                            </label>
                                <?php //} ?>
								@endif
											<h2 class="capitalize font-20">{{$educ->school}}</h2>
											<h4 class="montserrat weight-medium mb-5 capitalize">{{$educ->degree}}</h4>
											<p class="montserrat weight-medium"><?php //echo $arr_loc[$row10[5]-1]; ?>{{$educ->location}}</p>
											<p><?php $date =  date_create($educ->year_entered);
                                                            $date1 =  date_create($educ->year_ended);
                                                            echo date_format($date, 'F Y')." - ";
                                                echo ($educ->year_ended == date("Y") ? "present" : date_format($date, 'F Y')); ?></p>
											<br>
                                    </center>
								@endforeach
							@endif
							</div>
					</div>
                
				</div>
			</section>
            <?php //} ?>
			<!-- Education Section End -->

			<!-- Experience Section Start -->
			<?php 
               // if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
            ?>
            @if(($resume->url && $chk_work) || empty($resume->url))
            <!--section class="portfolio-area portfolio-one section-padding <?php echo (isset($_GET["u"]) && $bg == 1 ? "light-bg" : "bg-color-1"); ?> clearfix" id="experience"-->
			<section class="portfolio-area portfolio-one section-padding <?php echo ($resume->url && $bg == 1 ? "light-bg" : "bg-color-1"); ?> clearfix" id="experience">
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
                                     /*   $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
					                $result11 = $db->get_candidate_experience($id);
						                foreach($result11[1] as $row11) {
                                            if((isset($_GET["u"]) && $row11[3] == 1) || !isset($_GET["u"])){*/
				                ?>
								@foreach($experience as $exp)
									@if($exp->show_resume_2 == 1)
                            <center>
                                                <?php //if(!isset($_GET["u"])){ ?>
												@if(Session::has("u")) <!-- temporary condition -->
                                            <label class = 'switch'>
                                                <input class="work" name='show_experience_resume_2' value='{{$exp->id}}' type='checkbox' <?php if($exp->show_resume_2 == 1){ ?> checked <?php } else { ?> unchecked  <?php } ?>>
                                                <div class='slider round'></div>
                                            </label>
                                                <?php //} ?>
											@endif
                                                    
													<h3 class="capitalize font-23">{{$exp->position}}</h3>
													<p style="font-style: italic; margin-top: -1%; margin-bottom: 1%;">{{$exp->description}}</p>
                                                    <h4 class="montserrat weight-medium mb-5 capitalize">{{$exp->company}}</h4>
													<p>{{$exp->location}}</p>
                                                    
													<p class="montserrat weight-medium"><?php $date =  date_create($exp->year_entered);
                                                            $date1 =  date_create($exp->year_ended);
                                                            echo date_format($date, 'F Y')." - ";
                                                        echo ($exp->year_ended == date("Y") ? "present" : date_format($date1, 'F Y')); //date?></p>
                                <br>
                                </center>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</section>
            <?php //} ?>
			@endif
            
			<!-- Experience Section End -->
			<!-- Achievement Section Start -->
			<section class="experience-area section-padding <?php echo (Session::has("u") && $bg != 0 ? "bg-color-1" : "light-bg"); ?>" id="achievement">
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
				                        //    $result10 = $db->get_candidate_achievement($id);
					                    //    foreach($result10[1] as $row10) {
					                        	/*if(empty($row10[5])) {

					                        	}*/
			                     ?>
								 @foreach($achievement as $ach)
                                <center>
										
											<h2 class="capitalize font-20">{{$ach->title}}</h2>
											<h4 class="montserrat weight-medium mb-5 capitalize">{{$ach->description}}</h4>
											<p class="montserrat weight-medium">{{$ach->year}}</p>
											<br>
                                    </center>
								@endforeach
							</div>
					</div>
				</div>
			</section>
			<!-- Achievement Section End -->
            <!-- Membership Section start -->
			<section class="experience-area section-padding <?php echo (Session::has('u') && $bg != 0 ? "light-bg" : "bg-color-1"); ?>" id="membership">
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
				                           /* $result10 = $db->get_candidate_membership($id);
					                        foreach($result10[1] as $row10) {
					                        	if(empty($row10[5])) {

					                        	}*/
			                     ?>
								 @foreach($membership as $mem)
										<p>  
                                            <center>                                                                                
											<h2 class="capitalize font-20">{{$mem->description}}</h2>
											<h4 class="montserrat weight-medium mb-5 capitalize">{{$mem->assoc}}</h4>
											<p class="montserrat weight-medium"><?php echo $mem->year_entered." - ";
                                                echo ($mem->year_ended == date("Y") ? "present" : $mem->year_ended); ?></p>
											<br>
                                            </center>                                   
										</p>
								@endforeach
							</div>
					</div>
				</div>
			</section>
			<!-- Membership Section End -->                                                                   
            
			<!-- Portfolio Section Start -->
			<?php 
                   /* $photos_temp = $db->get_creative_contents($id);
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
                */
            ?>
			<section class="portfolio-area portfolio-one <?php echo (Session::has('u')) && $bg != 0 ? "bg-color-1" : "light-bg"); ?> section-padding clearfix" id="portfolio">
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
                        //if($chk_photo){
                    ?>
					<div class="row text-center">
						<h4 class="mb-20">Photos</h4>
						<div class="col-xs-12">
							<div class="portfolio-grid">

								<!-- Retrieves all candidate porfolio photos based on ID -->
									<?php 
					                    /*        $photos = $db->get_creative_contents($id);
						                        foreach($photos as $photo) {
                                                    if(strpos($photo[0], "uploads/") !== false){
                                        */                
				                     ?>
				                     
                                        <center>
										<div class="gallery">
											<div class="single-portfolio overlay light-1 text-center">
												<img src="<?php //echo "../../".$photo[0]; ?>" alt="Mim" />
												<div class="zoom-icon">
													<a href="<?php //echo "../../".$photo[0]; ?>" class="fancybox">
														<i class="zmdi zmdi-filter-center-focus"></i>
													</a>
												</div>
												<div class="project-title text-left">
													<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php //echo $photo[1]; ?></h4>
												</div>

										</div>
										</div>
                                        </center>
                                            
									<?php
										//		} }
									?>
                            
							</div>
						</div>
					</div>
					<br>
					<br>
                    <?php /*} 
                    
                    if($chk_vid){*/
                    ?>
					<div class="row text-center">
						<h4 class="mb-20">Videos</h4>
							<div class="col-xs-12">
								<div class="portfolio-grid">

									<!-- Retrieves all candidate porfolio videos based on ID -->
										<?php 
						                      /*      $videos = $db->get_creative_contents($id);
							                        foreach($videos as $video) {
                                                        if(strpos($video[0], ".com") !== false){
                                                            $video_pos = strpos($video[0], "embed/");
                                                            $video_id = substr($video[0], $video_pos+6);*/
					                     ?>
                                        <center>
												<div class="grid-item web design web gallery percent-33">
													<div class="single-portfolio overlay light-1 text-center">
														<img src="https://img.youtube.com/vi/<?php //echo $video_id; ?>/mqdefault.jpg" alt="Mim" />
														<div class="title plr-40 text-center">
															<div class="zoom-icon">
																<a class="various fancybox" data-fancybox-type="iframe" title="<?php //echo $video[1]; ?>" href="<?php //echo $video[0] ."?&amp;autoplay=1"?>;">
																	<i class="zmdi zmdi-play"></i>
																</a>
															</div>
															<div class="project-title text-left">
																<h4 class="font-20 montserrat weight-regular capitalize no-margin"><?php //echo $video[1]; ?></h4>
															</div>
														</div>
													</div>
												</div>
                                            </center>

										<?php
											//		} }
										?>	
								</div>
							</div>
					</div>
                    <?php// } ?>
				</div>
			</section>
            <?php// } ?>
			<!-- Portfolio Section End -->
			
			<!-- All JS Here -->
			<!-- jQuery Latest Version -->
	        <script src="{{asset('Creative2/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
			<!-- Bootstrap JS -->
	        <script src="{{asset('Creative2/assets/js/bootstrap.min.js')}}"></script>
			<!-- One Page Nav JS -->
	        <script src="{{asset('Creative2/assets/js/one-page-nav.js')}}"></script>
			<!-- Waypoints JS -->
	        <script src="{{asset('Creative2/assets/js/waypoints.min.js')}}"></script>
			<!-- Progressbar JS -->
	        <script src="{{asset('Creative2/assets/js/progressbar.js')}}"></script>
			<!-- Isotope -->
	        <script src="{{asset('Creative2/assets/js/isotope.pkgd.js')}}"></script>
			<!-- Isotope -->
	        <script src="{{asset('Creative2/assets/js/jquery.validate.min.js')}}"></script>
			<!-- Slick Slider JS -->
	        <script src="{{asset('Creative2/assets/js/slick.min.js')}}"></script>
			<!-- Fancybox JS -->
	        <script src="{{asset('Creative2/assets/js/jquery.fancybox.pack.js')}}"></script>
			<!-- Plugins JS -->
	        <script src="{{asset('Creative2/assets/js/plugins.js')}}"></script>
			<!-- main JS -->
	        <script src="{{asset('Creative2/assets/js/main.js')}}"></script>

	
            

		<script src="{{asset('js/jquery.js')}}"></script>
        
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
                      /*  $.ajax({
                            type: "post",
                            url: "../../db.php",
                            data: {"request" : "update-resume", "no": "2", "id" : this.value, "table" : this.className, "act" : act},
                            dataType: "json"
                        });*/
                    });
	            });
            
</script>
            
            
	    </body>

	</html>