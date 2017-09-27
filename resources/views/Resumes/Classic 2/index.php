<?php
    include '../../db.php';
    $db = new Database();
    session_start();
    if(!isset($_SESSION["email"])){
        if (!isset($_GET['u'])){
            header("Location: ../clogin.php");
        }
    }
    
    if(isset($_GET["u"])){
        $id = $db->get_user_email($db->get_user_info_using_url(2,$_GET['u']));
    } else if(($db->get_user_type(4, $_SESSION["email"]) != 1) || ($db->get_user_type(5, $_SESSION["email"]) != 1)){
        $id = $_SESSION["email"];
    } else {
        header("Location: ../../../employer/index.php");
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

<!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
    
<!-- Mirrored from demo.deviserweb.com/cv/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2017 04:18:17 GMT -->
<head>
        <meta charset="utf-8">
        
        <!-- TITLE OF SITE-->
        <title>Resume | <?php 
            if(isset($_GET["u"])){
                echo $_GET['u'];    
            } else {
                echo $_SESSION['email'];
            }
            
            ?></title>
        
        <!-- META TAG -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="CV, Portfolio, Resume">
        <meta name="author" content="Md. Siful Islam, Desiver Web">
        
        <!-- FAVICON -->
        <!--<link rel="icon" href="assets/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/images/apple-icon-76x76.html">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-icon-114x114.png">-->

        <!-- ========================================
                Stylesheets
        ==========================================--> 
        
        <!-- MATERIALIZE CORE CSS -->
        <link href="assets/css/materialize.min.css" rel="stylesheet">
        

        <!-- ADDITIONAL CSS -->
        <link rel="stylesheet" href="assets/css/animate.css">
        

        <!-- FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,400italic,700italic' rel='stylesheet' type='text/css'>
        

        <!--FONTAWESOME CSS-->
        <link href="assets/icons/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
        

        <!-- CUSTOM STYLE -->
        <link href="assets/css/style.css" rel="stylesheet">
        

        <!-- RESPONSIVE CSS-->
        <link href="assets/css/responsive.css" rel="stylesheet">

        <!-- COLORS -->        
        <link rel="alternate stylesheet" href="assets/css/colors/red.css" title="red">
        <link rel="alternate stylesheet" href="assets/css/colors/purple.css" title="purple">
        <link rel="alternate stylesheet" href="assets/css/colors/orange.css" title="orange">
        <link rel="alternate stylesheet" href="assets/css/colors/green.css" title="green">
        <link rel="stylesheet" href="assets/css/colors/lime.css" title="lime">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        
        <!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
        <!--<link rel="stylesheet" href="assets/css/demo.css">-->
    
        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif] -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
           <style>
               
    </style>
    </head>
    <body>
        <!-- Start Container-->
        <div class="container">
            <!-- row -->
            <div class="row">
            <!-- =========================================
                           SIDEBAR   
            ==========================================-->
                <!-- Start Sidebar -->
                <aside class="col l4 m12 s12 sidebar z-depth-1" id="sidebar">
                    <!--  Sidebar row -->
                    <div class="row">                      
                        <!--  top section   -->
                        <div class="heading">                            
                            <!-- ====================
                                      IMAGE   
                            ==========================-->
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
                            <!-- =========================================
                                       NAVIGATION   
                            ==========================================-->
                            <!--<div class=" nav-icon">
                                <nav>
                                    <div class="nav-wrapper">
                                      <ul id="nav-mobile" class="side-nav">                                  
                                        <li><a href="index-2.html">Resume</a></li>                                        
                                        <li><a href="project.html">Projects</a></li>
                                        <li><a href="cover-latter.html">Cover Latter</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                      </ul>
                                      <a href="#" data-activates="nav-mobile" class="button-collapse  "><i class="mdi-navigation-menu"></i></a>
                                    </div>
                                </nav>
                            </div>-->                        
                            <!-- ========================================
                                       NAME AND TAGLINE
                            ==========================================-->
                            <div class="title col s12 m12 l9 right  wow fadeIn" data-wow-delay="0.1s">   
                                <h2 style="text-shadow: 3px 3px 3px #000;">
                                    <?php 
                                            $result = $db->get_candidate_user_info($id, 3);
                                            $result1 = $db->get_candidate_user_info($id, 4);
                                            foreach($result[1] as $row) {
                                                    echo $row[0]." ";   
                                            }
                                            foreach($result1[1] as $row1) {
                                                    echo $row1[0] ; 
                                            }
                                    ?>
                                </h2> <!-- title name -->
                                <!-- <span>UI & UX Expert</span>  <!-- tagline -->
                            </div>                         
                        </div>
                        <div class="col l12 m12 s12  mobile sidebar-item">
                            
                            <center><p><?php 
                                    echo "Last updated: ".time_elapsed_string($db->get_last_resume_updated($id)); 
                                    echo "<br>Last active: ".time_elapsed_string($db->get_last_active($id));
                                ?></p></center>
                                
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-mobile"></i> <!-- icon -->
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a2" data-wow-delay="0.2s" >
                                    
                                    <div class="section-item-details">
                                        
                                        <div class="personal">
                                        <?php
                                            $result4 =$db->get_candidate_user_info($id, 5);
                                            foreach($result4[1] as $row4) {
                                                echo "<strong> Mobile Number: </strong><br>";
                                        ?>
                                            <h4><?php echo "+63 ".$row4[0]; ?></h4> <!-- Number -->             
                                            <!-- <span>mobile</span> -->
                                        <?php
                                                    }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                        </div>
                        <!-- MOBILE NUMBER -->
                        <div class="col l12 m12 s12  mobile sidebar-item">
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-phone"></i> <!-- icon -->
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a2" data-wow-delay="0.2s" >
                                    <div class="section-item-details">
                                        <div class="personal">
                                        <?php
                                            $result4 =$db->get_candidate_user_info($id, 7);
                                            foreach($result4[1] as $row4) {
                                                echo "<strong>Telephone Number: </strong><br>";
                                        ?>
                                            <h4><?php echo $row4[0]; ?></h4> <!-- Number -->             
                                            <!-- <span>mobile</span> -->
                                        <?php
                                                    }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                        </div>
                        <!--  EMAIL -->
                        <div class="col l12 m12 s12  email sidebar-item ">
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-envelope"></i> <!-- icon -->
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a3" data-wow-delay="0.3s">
                                    <div class="section-item-details">
                                        <?php
                                            $result3 =$db->get_candidate_user_email($id);
                                                foreach($result3[1] as $row3) {
                                                    if(empty($row3[0])) {
                                                        break;
                                                    }
                                                    else {
                                                        echo "<strong>Email: </strong>";
                                                        echo "<br>";

                                        ?>
                                        <div class="personal">                                    
                                            <h4><a href="#"><?php echo $row3[0]; ?></a></h4> <!-- Email --> 
                                        </div>
                                        <?php
                                                        }
                                                    }
                                        ?>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                         <!--  LINKS -->
                        <?php 
                            $result_temp = $db->list_links($id);
                            $chk_link = false;
                                    foreach($result_temp as $row){
                                        if(strlen($row[1]) > 0){
                                            $chk_link = true;
                                            break;
                                        }
                                    }
                        
                            if($chk_link){ ?>
                        <div class="col l12 m12 s12  email sidebar-item ">
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-globe"></i>
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a3" data-wow-delay="0.3s">
                                    <div class="section-item-details">
                                        <strong>Websites:</strong><br>
                                       <?php 
                                    $result = $db->list_links($id);
                                    foreach($result as $row):
                                        //Changes ex: "FaCeBoOk" into "facebook" for icon compatibility
                                        $row[0] = str_replace(" ", "", strtolower($row[0]));
                                ?>
                                <div class="item"><p><i class="fa fa-<?php echo $row[0]; ?> "></i>
                                  <a href="http://www.<?php echo $row[1]; ?>"><strong><?php echo $row[1]; ?></strong></a></p>
                                </div>
                                        <br>
                                <?php endforeach; ?>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                        <?php } ?>
                
                        <!-- ADDRESS  -->
                        <div class="col l12 m12 s12  address sidebar-item ">
                            <div class="row">                                
                                <div class="col l3 m12  s12 icon">
                                    <i class="fa fa-home"></i> <!-- icon -->
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a4" data-wow-delay="0.4s">
                                    <div class="section-item-details">
                                    <?php 
                                        $result2 = $db->get_candidate_user_info($id, 6);//15);
                                            foreach($result2[1] as $row2) {
                                                if(empty($row2)) {
                                                    break;
                                                }
                                                else {
                                                    echo "<strong>Address: </strong>";
                                                    echo "<br>";
                                    ?>
                                        <div class="address-details"> <!-- address  -->
                                            <h4><?php echo $row2[0]; ?></h4> 
                                        </div> 
                                    <?php
                                                }
                                            }
                                    ?>                        
                                    </div>
                                </div>
                            </div>            
                        </div>
                        <!-- SKILLS -->
                        <div class="col l12 m12 s12 skills sidebar-item" >
                            <div class="row">
                                <div class="col m12 l3 s12 icon">
                                    <i class="fa fa-calendar-o"></i> <!-- icon -->
                                </div>
                                 <!-- Skills -->
                                <div class="col m12 l9 s12 skill-line a5 wow fadeIn" data-wow-delay="0.5s">
                                    <h3>Professional Skills</h3>

                                    <?php 
                                        $result9 = $db->get_candidate_skill($id);
                                        foreach($result9[1] as $row9) {
                                            // print_r($row1);
                                    ?>
                                                <span><?php echo $row9[2]; ?></span>                                    
                                                <div class="progress">
                                                    <div class="determinate"><?php echo $row9[3]."%"; ?></div>
                                                </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>   <!-- end row -->
                </aside><!-- end sidebar -->
                <section class="col s12 m12 l8 section">
                        <div class="row">

                    <!-- ========================================
                        About Me 
                    ==========================================-->

                            <div class="section-wrapper z-depth-1">                           
                                <div class="section-icon col s12 m12 l2">
                                       <i class="fa fa-user"></i>
                                </div>
                                
                                <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s"> 
                                    <h2>About Me</h2>
                                    <ul> <!-- interetsr icon start -->
                                        <p style="padding-left: 2%; padding-right: 2%; font-style: italic; font-size: 15px;">
                                            <?php 
                                                /*$result8 = $db->get_resume_detail($id);
                                                foreach($result8[1] as $row8) {
                                                    echo $row8[2]; 
                                                }*/
                                                
                                                $result8 = $db->get_intro($id);
                                                foreach($result8[1] as $row8) {
                                                    echo "\"".$row8[0]."\"";
                                                }
                                            ?>
                                        </p>
                                    </ul> <!-- interetsr icon end -->
                                </div>                          
                            </div>

                    <!-- =========================================
                        Work experiences
                    ===========================================-->
                        <?php 
                            $result11 = $db->get_candidate_experience($id);
                            $result11_temp = $db->get_candidate_experience($id);
                            $chk_work = false;
                            foreach($result11_temp[1] as $row11) {
                                if($row11[2] == 1){
                                    $chk_work = true;
                                    break;
                                }
                            }
                            if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
                            ?>
                            <div class="section-wrapper z-depth-1">
                                <div class="section-icon col s12 m12 l2">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s">
                                    <h2>Work Experience</h2>

                                        <?php 
                                                    $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
                                                    $result11 = $db->get_candidate_experience($id);
                                                    foreach($result11[1] as $row11) {
                                         ?>
                                           <?php if((isset($_GET["u"]) && $row11[2] == 1) || !isset($_GET["u"])){ ?>
                                            <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s">
                                                <?php if(!isset($_GET["u"])){ ?>
                                                <button class="view_button" style="background-color: <?php echo ($row11[2] == 1 ? "#20d83c" : "#ff1e1e"); ?>; color: white;" onclick="change_button(this, 'work')" value="<?php echo $row11[0]; ?>"><?php echo ($row11[2] == 1 ? "Shown" : "Hidden"); ?></button>
                                                <?php } ?>
                                                <br>
                                                <h3><?php echo $row11[5]; ?><span><br><?php echo " ".$row11[6]; ?></span></h3>
                                                
                                                <span><?php 
                                                            $date =  date_create($row11[9]);
                                                            $date1 =  date_create($row11[10]);
                                                            echo date_format($date, 'F Y')." - ";
                                                            echo ($row11[10] == date("Y") ? "present" : date_format($date1, 'F Y')); ?></span>
                                                <p><?php echo $arr_loc[$row11[7]-1]; ?></p>
                                                
                                            </div>

                                        <?php }
                                                    }
                                        ?>
                                </div>                            
                            </div>
                            <?php } ?>

                    <!-- =======================================
                        Education 
                    ==========================================-->
                            <?php 
                            $result10 = $db->get_candidate_education($id);
                            $result10_temp = $db->get_candidate_education($id);
                            $chk_educ = false;
                            foreach($result10_temp[1] as $row10) {
                                if($row10[8] == 1){
                                    $chk_educ = true;
                                    break;
                                }
                            }
                            if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){
                            ?>
                        <div class="section-wrapper z-depth-1">
                            <div class="section-icon col s12 m12 l2">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s" >
                                <h2>Education </h2> 
                                    <?php 
                                        $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
                                                foreach($result10[1] as $row10) {
                                     ?>
                                        <?php if((isset($_GET["u"]) && $row10[8] == 1) || !isset($_GET["u"])){ ?>
                                                <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s" >
                                                    <?php if(!isset($_GET["u"])){ ?>
                                                    <button class="view_button" style="background-color: <?php echo ($row10[8] == 1 ? "#20d83c" : "#ff1e1e"); ?>; color: white;" onclick="change_button(this, 'education')" value="<?php echo $row10[0]; ?>"><?php echo ($row10[8] == 1 ? "Shown" : "Hidden"); ?></button>
                                                    <?php } ?>
                                                    <h3><?php echo $row10[3]; ?><span><br><?php echo $row10[4]; ?></span></h3>
                                                    <span><?php echo $arr_loc[$row10[5]-1]; ?></span>
                                                    <p><?php 
                                                            $date =  date_create($row10[6]);
                                                            $date1 =  date_create($row10[7]);
                                                            echo "(".date_format($date, 'F Y')." - ";
                                                            echo ($row10[7] == date("Y") ? "present" : date_format($date1, 'F Y')).")"; ?></p>
                                                </div>
                                    <?php }
                                                }
                                    ?>
                            </div>
                        </div>
                            <?php } ?>
                     <!-- ========================================
                        Achievements 
                    ==========================================-->

                        <div class="section-wrapper z-depth-1">
                            <div class="section-icon col s12 m12 l2">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s" >
                                <h2>Achievements</h2> 
                                    <?php 
                                                $result10 = $db->get_candidate_achievement($id);
                                                foreach($result10[1] as $row10) {
                                     ?>

                                                <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s" >
                                                    <h3><?php echo $row10[2]; ?><span><br><?php echo $row10[3]; ?></span></h3>
                                                    <span><?php echo $row10[4]."<br><br>"; ?></span>
                                                </div>
                                    
                                    <?php
                                                }
                                    ?>
                            </div>
                        </div>
                            
                    <!-- ========================================
                        Memberships 
                    ==========================================-->

                        <div class="section-wrapper z-depth-1">
                            <div class="section-icon col s12 m12 l2">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s" >
                                <h2>Memberships</h2> 
                                    <?php 
                                                $result10 = $db->get_candidate_membership($id);
                                                foreach($result10[1] as $row10) {
                                     ?>

                                                <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s" >
                                                    <h3><?php echo $row10[3]; ?><span><br><?php echo $row10[2]; ?></span></h3>
                                                    <span><?php echo $row10[4]." - ";
                                                        echo ($row10[5] == date("Y") ? "present" : $row10[5]); ?></span>
                                                </div>
                                                <br><br>
                                    <?php
                                                }
                                    ?>
                            </div>
                        </div>
                    </div><!-- end row -->
                </section><!-- end sectiosn -->
            </div> <!-- end row -->
        </div>  <!-- end container -->
 <!--=====================
                JavaScript
        ====================== -->
        <!-- Jquery core js-->
        <script src="../../../../js/jquery.js"></script>
        <script>
            function change_button(elt, table){
                var act;
                if(elt.innerText === "Shown"){
                    elt.style.backgroundColor = "#ff1e1e";
                    elt.innerText = "Hidden";
                    act = 0;
                } else {
                    elt.style.backgroundColor = "#20d83c";
                    elt.innerText = "Shown";
                    act = 1;
                }
                
                $.ajax({
                    type: "post",
                    url: "../../db.php",
                    data: {"request" : "update-resume", "no" : "1", "table": table, "id" : elt.value, "act": act},
                    dataType: "json"
                });
            }
            </script>
        
                <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <script src="assets/js/jquery.min.js"></script>
        
        <!-- materialize js-->
        <script src="assets/js/materialize.min.js"></script>
        
        <!-- wow js-->
        <script src="assets/js/wow.min.js"></script>
        
        <!-- Map api -->
        <script src="http://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        
        <!-- Masonry js-->
        <script src="assets/js/masonry.pkgd.js"></script>

        <script src="assets/js/validator.min.js"></script>
        
        <!-- Customized js -->
        <script src="assets/js/init.js"></script>

    </body>

<!-- Mirrored from demo.deviserweb.com/cv/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2017 04:18:48 GMT -->
</html>
