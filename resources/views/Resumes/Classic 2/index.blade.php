<?php
  /*  include '../../db.php';
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
}*/
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
            /*if(isset($_GET["u"])){
                echo $_GET['u'];    
            } else {
                echo $_SESSION['email'];
            }
            */
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
                                                   /* $result7 = $db->get_candidate_user_info($id, 2);
                                                    foreach($result7[1] as $row7) {
                                                        if($row7[0] != ""){
                                                            echo "../../".$row7[0];
                                                        } else {
                                                            echo "../../uploads/default.jpg";
                                                        }
                                                    }
                                                    */
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
                                            /*$result = $db->get_candidate_user_info($id, 3);
                                            $result1 = $db->get_candidate_user_info($id, 4);
                                            foreach($result[1] as $row) {
                                                    echo $row[0]." ";   
                                            }
                                            foreach($result1[1] as $row1) {
                                                    echo $row1[0] ; 
                                            }*/
                                    ?>
                                </h2> <!-- title name -->
                                <!-- <span>UI & UX Expert</span>  <!-- tagline -->
                            </div>                         
                        </div>
                        <div class="col l12 m12 s12  mobile sidebar-item">
                            
                            <center><p><?php 
                                  /*  echo "Last updated: ".time_elapsed_string($db->get_last_resume_updated($id)); 
                                    echo "<br>Last active: ".time_elapsed_string($db->get_last_active($id));*/
                                ?></p></center>
                                
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-mobile"></i> <!-- icon -->
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a2" data-wow-delay="0.2s" >
                                    
                                    <div class="section-item-details">
                                        
                                        <div class="personal">
                                        <?php
                                            /*$result4 =$db->get_candidate_user_info($id, 5);
                                            foreach($result4[1] as $row4) {
                                                echo "<strong> Mobile Number: </strong><br>";*/
                                        ?>
                                            <h4><?php //echo "+63 ".$row4[0]; ?></h4> <!-- Number -->             
                                            <!-- <span>mobile</span> -->
                                        <?php
                                                   // }
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
                                            /*$result4 =$db->get_candidate_user_info($id, 7);
                                            foreach($result4[1] as $row4) {
                                                echo "<strong>Telephone Number: </strong><br>";*/
                                        ?>
                                            <h4><?php // echo $row4[0]; ?></h4> <!-- Number -->             
                                            <!-- <span>mobile</span> -->
                                        <?php
                                          //          }
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
                                            /*$result3 =$db->get_candidate_user_email($id);
                                                foreach($result3[1] as $row3) {
                                                    if(empty($row3[0])) {
                                                        break;
                                                    }
                                                    else {
                                                        echo "<strong>Email: </strong>";
                                                        echo "<br>";
                                                    */
                                        ?>
                                        <div class="personal">                                    
                                            <h4><a href="#"><?php //echo $row3[0]; ?></a></h4> <!-- Email --> 
                                        </div>
                                        <?php
                                         //               }
                                         //           }
                                        ?>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                         <!--  LINKS -->
                        <?php 
                          /*  $result_temp = $db->list_links($id);
                            $chk_link = false;
                                    foreach($result_temp as $row){
                                        if(strlen($row[1]) > 0){
                                            $chk_link = true;
                                            break;
                                        }
                                    }
                        
                            if($chk_link){ */?>
                        <div class="col l12 m12 s12  email sidebar-item ">
                            <div class="row">                                
                                <div class="col m12 s12 l3 icon">
                                    <i class="fa fa-globe"></i>
                                </div>                                
                                <div class="col m12 s12 l9 info wow fadeIn a3" data-wow-delay="0.3s">
                                    <div class="section-item-details">
                                        <strong>Websites:</strong><br>
                                       <?php 
                                   /* $result = $db->list_links($id);
                                    foreach($result as $row):
                                        //Changes ex: "FaCeBoOk" into "facebook" for icon compatibility
                                        $row[0] = str_replace(" ", "", strtolower($row[0]));*/
                                ?>
                                <div class="item"><p><i class="fa fa-<?php // echo $row[0]; ?> "></i>
                                  <a href="http://www.<?php //echo $row[1]; ?>"><strong><?php //echo $row[1]; ?></strong></a></p>
                                </div>
                                        <br>
                                <?php //endforeach; ?>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                        <?php //} ?>
                
                        <!-- ADDRESS  -->
                        
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
