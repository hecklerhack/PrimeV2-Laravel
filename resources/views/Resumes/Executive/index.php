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
    } 
    
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
<html lang="en-US" class="theme-color-07aaf5 light_skin">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


           
        <title>Resume | <?php 
            if(isset($_GET["u"])){
                echo $_GET['u'];    
            } else {
                echo $_SESSION['email'];
            }
            
            
            ?></title>

    <meta name='robots' content='noindex,follow' />
        <link rel='dns-prefetch' href='//www.google.com' />
        <link rel='dns-prefetch' href='//maps.googleapis.com' />
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel="alternate" type="application/rss+xml" title="Rs-Card Doctor Resume &raquo; Comments Feed" href="http://px-lab.com/themes/rscard-wp/doctor/comments/feed/" />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/px-lab.com\/themes\/rscard-wp\/doctor\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.4"}};
			!function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
            img.wp-smiley, img.emoji {
	           display: inline !important;
	           border: none !important;
               box-shadow: none !important;
               height: 1em !important;
               width: 1em !important;
               margin: 0 .07em !important;
               vertical-align: -0.1em !important;
               background: none !important;
               padding: 0 !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="assets/css/semantic/semantic.css">
        <link rel='stylesheet' id='rscard-woocommerce-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/woocommerce/css/woocommerce.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='rscard-woocommerce-layout-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/woocommerce/css/woocommerce-layout.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='rscard-woocommerce-smallscreen-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/woocommerce/css/woocommerce-smallscreen.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='google-font0-css'  href='https://fonts.googleapis.com/css?family=Fredoka+One&#038;ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='Open Sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700&#038;ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='Fredoka One-css'  href='https://fonts.googleapis.com/css?family=Fredoka+One%3A400&#038;ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='icon-fonts-map-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/fonts/map-icons/css/map-icons.min.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='icon-fonts-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/fonts/icomoon/style.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='map-icons-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/fonts/map-icons/css/map-icons.min.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='icomoon-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/fonts/icomoon/style.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='bxslider-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.bxslider/jquery.bxslider.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='custom-scroll-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.customscroll/jquery.mCustomScrollbar.min.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='mediaelement-player-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.mediaelement/mediaelementplayer.min.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='owl-carousel-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.owlcarousel/owl.carousel.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='owl-carousel-theme-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.owlcarousel/owl.theme.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='slick-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.slick/slick.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='option-panel-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.optionpanel/option-panel.css?ver=4.7.4' type='text/css' media='all' />
        <link rel='stylesheet' id='rscard-style-css'  href='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/style.css?ver=4.7.4' type='text/css' media='all' />
        <script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
        <script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
        <script type='text/javascript'>
        /* <![CDATA[ */
        var ajax_var = {"url":"http:\/\/px-lab.com\/themes\/rscard-wp\/doctor\/wp-admin\/admin-ajax.php","nonce":"ab8894c872"};
        var date = {"months":["January","February","March","April","May","June","July","August","September","October","November","December"],"weeks":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]};
        /* ]]> */
        </script>
        <script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/site.js?ver=1'></script>
        <script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/libs/modernizr.js?ver=4.7.4'></script>	
        <link rel='https://api.w.org/' href='http://px-lab.com/themes/rscard-wp/doctor/wp-json/' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://px-lab.com/themes/rscard-wp/doctor/xmlrpc.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://px-lab.com/themes/rscard-wp/doctor/wp-includes/wlwmanifest.xml" /> 
    <meta name="generator" content="WordPress 4.7.4" />
    <meta name="generator" content="WooCommerce 2.6.9" />
        <link rel="canonical" href="http://px-lab.com/themes/rscard-wp/doctor/" />
        <link rel='shortlink' href='http://px-lab.com/themes/rscard-wp/doctor/' />
        <link rel="alternate" type="application/json+oembed" href="http://px-lab.com/themes/rscard-wp/doctor/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpx-lab.com%2Fthemes%2Frscard-wp%2Fdoctor%2F" />
        <link rel="alternate" type="text/xml+oembed" href="http://px-lab.com/themes/rscard-wp/doctor/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fpx-lab.com%2Fthemes%2Frscard-wp%2Fdoctor%2F&#038;format=xml" />
    <meta name="generator" content="WPML ver:3.4.0 stt:1,46;" />
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--><style type='text/css'>
            body,
            select,
            textarea,
            input[type='tel'],
            input[type='text'],
            input[type='email'],
            input[type='search'],
            input[type='password'],
            .btn,
            .filter button,
            .nav-wrap .nav a,
            .mobile-nav .nav a {
                font-family: "Open Sans", sans-serif;
            }
				
            .logo,
            .site-title {
                font-family: "Fredoka One", cursive;
            }
				
            h1,
            h2,
            h3,
            h4,
            h5,
            h6  {
                font-family: "Open Sans", sans-serif;
            }
            .head-bg:before {
                background-color: rgba(44, 51, 64, 0.8);
            }
			.theme-color-07aaf5 a,
			.theme-color-07aaf5 blockquote:before,			
			.theme-color-07aaf5 .contact-map .contact-info a:hover,
			.theme-color-07aaf5 .interests-list i,
			.theme-color-07aaf5 .input-field.used label,
			.theme-color-07aaf5 .logo span,
			.theme-color-07aaf5 #map .map-icon,
			.theme-color-07aaf5 .head-cont .btn-mobile,
			.theme-color-07aaf5 .page-404 h2 span,
			.theme-color-07aaf5 .post-box .post-title a:hover,
			.theme-color-07aaf5 .post-single .post-title a:hover,
			.theme-color-07aaf5 .post-pagination .post-title a:hover,
			.theme-color-07aaf5 .post-comments .section-title,
			.theme-color-07aaf5 .ref-box .person-speech:before,			
			.theme-color-07aaf5 .service-icon,
			.theme-color-07aaf5 .statistic-value,
			.theme-color-07aaf5 .service-sub-title,			
			.theme-color-07aaf5 .styled-list li:before,			
			.theme-color-07aaf5 .timeline-box .date,			
			.theme-color-07aaf5 .twitter-icon .rsicon,			
			.theme-color-07aaf5 .tabs-vertical .tabs-menu a:hover,			
			.theme-color-07aaf5 .tabs-vertical .tabs-menu .active a,			
			.theme-color-07aaf5 .widget-title,
			.theme-color-07aaf5 .widget_search label:before,
			.theme-color-07aaf5 .widget_search .search-form:before,
			.theme-color-07aaf5 .widget_meta ul li a:hover,
			.theme-color-07aaf5 .widget_archive ul li a:hover,
			.theme-color-07aaf5 .widget_nav_menu ul li a:hover,
			.theme-color-07aaf5 .widget_categories ul li a:hover,
			.theme-color-07aaf5 .widget_recent_entries ul li a:hover,
			.theme-color-07aaf5 .widget_recent_comments ul li a:hover,
			.theme-color-07aaf5 .widget-popuplar-posts .post-title a:hover,
			.theme-color-07aaf5 .widget-recent-posts .post-title a:hover,
			.theme-color-07aaf5 .head-woo-count {
                color: #07aaf5; 
            }
			  
			.theme-color-07aaf5 .head-nav .sub-menu li:hover>a,
			.theme-color-07aaf5 .head-nav .sub-menu li.active,
			.theme-color-07aaf5 .head-lang .lang-list a:hover {
                color: #07aaf5 !important;
			}
			  			
			.theme-color-07aaf5 mark,
			.theme-color-07aaf5 .btn-primary,
			.theme-color-07aaf5 .btn-primary-outer,
			.theme-color-07aaf5 .btn-sidebar-close,
			.theme-color-07aaf5 .calendar-today .date,
			.theme-color-07aaf5 .calendar-body .busy-day,
			.theme-color-07aaf5 .calendar-body td .current-day,
			.theme-color-07aaf5 .filter .active:after,
			.theme-color-07aaf5 .filter-bar .filter-bar-line,
			.theme-color-07aaf5 .input-field .line:before,
			.theme-color-07aaf5 .input-field .line:after,
			.theme-color-07aaf5 .mobile-nav,
			.theme-color-07aaf5 .head-nav .nav>ul>li>a:after,
			.theme-color-07aaf5 .post-datetime,
			.theme-color-07aaf5 .profile-social,
			.theme-color-07aaf5 .profile-preword span,
			.theme-color-07aaf5 .progress-bar .bar-fill,
			.theme-color-07aaf5 .progress-bar .bar-line:after,
			.theme-color-07aaf5 .price-box.box-primary .btn,
			.theme-color-07aaf5 .price-box.box-primary .price-box-top,
			.theme-color-07aaf5 .profile-list .button,
			
			.theme-color-07aaf5 .pagination span.page-numbers.current,
			.theme-color-07aaf5 .pagination a.page-numbers:active,
			
			.theme-color-07aaf5 .latest-tweets .slick-dots button:hover,
			.theme-color-07aaf5 .latest-tweets .slick-dots .slick-active button,
						
			.theme-color-07aaf5 .tabs-horizontal .tabs-menu a:hover:after,
			.theme-color-07aaf5 .tabs-horizontal .tabs-menu .active a:after,
			.theme-color-07aaf5 .togglebox-header,
			.theme-color-07aaf5 .accordion-header,
			.theme-color-07aaf5 .timeline-bar,
			.theme-color-07aaf5 .timeline-box .dot,
			.theme-color-07aaf5 .timeline-box-compact .date span,
			.theme-color-07aaf5 .widget_tag_cloud a:hover,
			.theme-color-07aaf5 .widget_product_tag_cloud a:hover,
			.theme-color-07aaf5 .wpcf7-form .wpcf7-submit {
                background-color: #07aaf5; 
            }
			  
			.theme-color-07aaf5 .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current,
			.theme-color-07aaf5 .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
                background: #07aaf5; 
            }
			  
			.theme-color-07aaf5 .timeline-box-inner,
			.theme-color-07aaf5 .price-box.box-primary .btn,
			.theme-color-07aaf5 .widget_search .search-form,
			.theme-color-07aaf5 .widget_product_search .search-form,
			.theme-color-07aaf5 .widget_tag_cloud a:hover,
			.theme-color-07aaf5 .widget_product_tag_cloud a:hover,
			.theme-color-07aaf5 .wpcf7-form .wpcf7-form-control:focus {
                border-color: #07aaf5; 
            }
			  
			.theme-color-07aaf5 .page-404 h2 span:before,
			.theme-color-07aaf5 .profile-preword span:before,
			.theme-color-07aaf5 .timeline-box-compact .date span:before {
                border-left-color: #07aaf5; 
            }
			  
			.theme-color-07aaf5 .price-box.box-primary .price-box-top:before {
                border-top-color: #07aaf5; 
            }
            .woocommerce .star-rating,
            .woocommerce .star-rating:before,
            .woocommerce .product-links .button,
            .woocommerce .product-links .button:hover,
            .woocommerce div.product p.price,
            .woocommerce div.product span.price,
            .widget_product_search .woocommerce-product-search:before {
                color: #07aaf5;
            }

            .woocommerce span.onsale,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt,
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover:after,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:after {
                background-color: #07aaf5;
            }

            .woocommerce span.onsale:before {
                border-left-color: #07aaf5;
            }
				
            .widget_product_search .woocommerce-product-search {
                border-color: #07aaf5;
            }
    
    
   
    .div {
        border-bottom: 1px solid #4588ba;
        margin-top:2%;
        margin-bottom:3%;
    }
    
    .work_head, .educ_head, .mem_head, .ach_head {
        font-weight: 600;
    }
    
    .work_des, .mem_des, .ach_des {
        font-style: italic;
        margin-top: -2%;
    }
    
    .work_comp {
        margin-top: 1%;
    }
    
    .educ_sch {
        margin-top: -2%;
    }
    
    .work_loc, .work_date, .educ_loc, .educ_date, .mem_date, .ach_date {
        margin-top: -2%;
        font-size: 14px;
    }

input[type="checkbox"] {
 -webkit-appearance:none;/* Hides the default checkbox style */ 
 height:2em;
 width:2em;
 cursor:pointer;
 position:relative;
 -webkit-transition: .15s;
 border-radius:2em;
 background-color:#900;
}

input[type="checkbox"]:checked {
 background-color:green;
}

input[type="checkbox"]:before, input[type="checkbox"]:checked:before {
 position:absolute;
 top:0;
 left:0;
 width:100%;
 height:100%;
 line-height:2em;
 text-align:center;
 color:#fff;
 content: '✘';
}

input[type="checkbox"]:checked:before {
 content: '✔';
}

input[type="checkbox"]:hover:before {
 background:rgba(255,255,255,0.3);
}
    
    </style><style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
			<script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},
                    i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	            ga('create', 'UA-71657642-2', 'auto');
	            ga('send', 'pageview');
	        </script>
</head>
<body class="home page-template page-template-page-home page-template-page-home-php page page-id-310 header-has-img  masthead-fixed loading">
    <div class="wrapper">
        <header class="header">
            <div class="head-bg" style="background-image: url('http://px-lab.com/themes/rscard-wp/doctor/wp-content/uploads/2015/11/cover.jpg')"></div>
                <div class="head-bar has-woo has-lang has-sidebar">
                    <div class="head-bar-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-xs-6">
                                <a class="logo" href="http://px-lab.com/themes/rscard-wp/doctor/"></a>
                            </div>
                            <div class="col-lg-10 col-md-9 col-xs-6">
                                <div class="head-cont clearfix">
                                    <div class="head-items">
                                        <div id="head-nav" class="head-nav">
                                            <nav class="nav">
                                                <ul class="clearfix">
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-244">
                                                        <a href="#about">About</a>
                                                    </li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-246">
                                                        <a href="#skills">Skills</a>
                                                    </li>
                                                    <?php
                                                        $result11_temp = $db->get_candidate_experience($id);
                                                        $chk_work = false;
                                                        foreach($result11_temp[1] as $row11) {
                                                            if($row11[4] == 1){
                                                                $chk_work = true;
                                                                break;
                                                            }
                                                        }
                                                        if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
                                                    ?>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-246">
                                                        <a href="#experience">Experience</a>
                                                    </li>
                                                    <?php }
                                                        $result12_temp = $db->get_candidate_education($id);
                                                        $chk_educ = false;
                                                        foreach($result12_temp[1] as $row12) {
                                                            if($row12[10] == 1){
                                                                $chk_educ = true;
                                                                break;
                                                            }
                                                        }
                                                        if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){
                                                    ?>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-246">
                                                        <a href="#education">Education</a>
                                                    </li>
                                                    <?php } ?>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children menu-item-246">
                                                        <a href="#membership">Memberships</a>
                                                    </li>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-247">
                                                        <a href="#achievements">Achievements</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <div class="content">
            <div class="container">
                <section id="about" class="section section-about">
                    <div class="animate-up">
                        <div class="section-box">
                            <div class="profile">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="profile-photo">
                                            <img class="ui medium circular image" src="
                                                <?php 
                                                    $result7 = $db->get_candidate_user_info($id, 2);
                                                    foreach($result7[1] as $row7) {
                                                        if($row7[0] != ""){
                                                            echo "../../".$row7[0];
                                                        } else {
                                                            echo "../../uploads/default.jpg";
                                                        }
                                                    }

                                                ?>
                                            " alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="profile-info">
                                            <!--<div class="profile-items clearfix">
                                            </div>-->
                                                <div class="profile-preword">
                                                    <span>Im</span>
                                                </div>
                                            <h1 class="profile-title">
                                                <?php 
                                                    $result = $db->get_candidate_user_info($id, 3);
                                                    $result1 = $db->get_candidate_user_info($id, 4);
                                                    foreach($result[1] as $row) {
                                                        echo "&nbsp;".$row[0]." ";   
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
                                             
                                            <div class="section-txt-btn" style="font-size: 15px; font-style: italic;">

                                            <p>
                                                <?php 
                                                    /*$result8 = $db->get_resume_detail($id);
                                                     foreach($result8[1] as $row8) {
                                                        echo "\"".$row8[2]."\"";
                                                    }*/
                                                    $result8 = $db->get_intro($id);
                                                     foreach($result8[1] as $row8) {
                                                        echo "\"".$row8[0]."\"";
                                                    }
                                                ?>
                                            </p>
                                            </div>
                                        </div>
                                        <ul class="profile-list">
                                            <li class="clearfix">
                                                <strong class="title">Address</strong>
                                                    <?php 
                                                        $result2 = $db->get_candidate_user_info($id, 6); //15);
                                                            foreach($result2[1] as $row2) {
                                                                if(empty($row2)) {
                                                                    break;
                                                                }
                                                                else {
                                                    ?>
                                                        <span class="cont"><?php echo $row2[0]; ?></span>
                                                    <?php
                                                                }
                                                            }
                                                    ?>  
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">E-mail</strong>
                                                    <?php 
                                                        $result3 = $db->get_candidate_user_email($id);
                                                            foreach($result3[1] as $row3) {
                                                                if(empty($row3)) {
                                                                    break;
                                                                }
                                                                else {
                                                    ?>
                                                        <span class="cont"><?php echo $row3[0]; ?></span>
                                                    <?php
                                                                }
                                                            }
                                                    ?> 
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Phone</strong>
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
                                                    <span class="cont">+63 <?php echo $row4[0];//.",".$row5[0]; ?></span>
                                                <?php
                                                            //}
                                                        //}
                                                    //}
                                                }      
                                                ?>
                                            </li>
                                            <li class="clearfix">
                                                <strong class="title">Telephone</strong>
                                                <?php
                                                    $result6 =$db->get_candidate_user_info($id, 7); //8);
                                                    //$result14 =$db->get_candidate_user_info($_SESSION["email"], 9);

                                                    foreach($result6[1] as $row6) {
                                                        /*foreach($result14[1] as $row14) {
                                                            if(empty($row6[0])) {
                                                                break;
                                                            }
                                                            else {
                                                                if(empty($row14[0])) {
                                                                    break;
                                                                }

                                                                else {*/
                                                ?>

                                                <span class="cont"><?php echo $row6[0];//. ", ".$row14[0]; ?></span>

                                                <?php
                                                                //}
                                                            //}
                                                        //}
                                                    }
                                                ?>
                                            </li>
                                             <li class="clearfix">
                                                 <?php 
                                                $result = $db->list_links($id);
                                                foreach($result as $row):
                                                    //Changes ex: "FaCeBoOk" into "facebook" for icon compatibility
                                                    $row[0] = str_replace(" ", "", strtolower($row[0]));
                                            ?>
                                                <div class="title" ><i class="circular <?php echo $row[0]; ?> icon"></i></div>
                                            <span class="item"><p>
                                              <a href="http://www.<?php echo $row[1]; ?>"><strong><?php echo $row[1]; ?></strong></a></p>
                                            </span>
                                                    <br>
                                            <?php endforeach; ?>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>			
                <section id="skills" class="section section-skills">
					<div class="animate-up">
						<h2 class="section-title">Professional	Skills</h2>
							<div class="section-box">
								<div class="row">
                                   <div class="animate-right">
                                <?php
                                    $result9 = $db->get_candidate_skill($id);
                                    foreach($result9[1] as $row9) {
                                ?>
                                        <div class="progress-bar">
                                            <div class="bar-data">
                                                <span class="bar-title" style="font-size: 150%;"><strong><?php echo $row9[2]; ?></strong></span>
                                                <span class="bar-value"><?php echo $row9[3]."%"; ?></span>                         
                                            </div>
                                            
                                            <div class="bar-line">
                                                <span class="bar-fill" data-width="<?php echo $row9[3]."%"; ?>"></span>

                                            </div>
                                        </div>
                                    <br></br>
                            <?php
                                }
                            ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>

                <?php
                    if((isset($_GET["u"]) && $chk_work) || !isset($_GET["u"])){
                ?>
                 
                <section id="experience" class="section section-experience">
					<div class="animate-up">
						<h2 class="section-title">Work Experience</h2>
                      
                            <div class="timeline-box-inner animate-right">
                                 <div class="timeline-head">
                                     <center>

                                        <?php
                                                    $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
                                                    $result11 = $db->get_candidate_experience($id);
                                                    $ctr = 0;
                                                    $prev = false;
                                                    foreach($result11[1] as $row11) {
                                                        if((isset($_GET["u"]) && $row11[4] == 1) || !isset($_GET["u"])){
                                                            //echo $prev;
                                                    if($prev == 1){ ?>
                                                        <div class="div"></div>
                                                    <?php } else if($ctr != 0 && !isset($_GET["u"])) { ?>
                                                        <div class="div"></div>
                                                    <?php }
                                                        
                                        ?>
                                     
                                            <?php if(!isset($_GET["u"])){ ?>
                                     <input class="work" type="checkbox" value="<?php echo $row11[0]; ?>" <?php echo ($row11[4] == 1 ? "checked" : "unchecked"); ?>>
                                <?php } ?>
                                                     <h3 class="work_head"><?php echo $row11[5]; ?></h3>
                                                     <div class="work_des"><?php echo $row11[8]; ?></div>
                                                     <h4 class="work_comp"><?php echo $row11[6]; ?></h4>
                                                    
                                                     <p class="work_loc"><?php echo $arr_loc[$row11[7]-1]; ?></p>
                                                     <div class="work_date"><div class="date"><?php $date = date_create($row11[9]);
                                                            $date1 = date_create($row11[10]);
                                                            echo date_format($date, 'F Y')." - ";
                                                            echo ($row11[10] == date("Y") ? "present" : date_format($date1, 'F Y')); ?></div></div>
                                     
                                        <?php
                                                    $ctr++;
                                                            if(isset($_GET["u"]) && $row11[4] == 1){
                                                                $prev = true;
                                                            } else {
                                                                $prev = false;
                                                            }
                                                    } }
                                        ?>
                                     </center>
                                 </div>
							</div>
					</div>
				</section>
                <?php } ?>
				<?php
                    if((isset($_GET["u"]) && $chk_educ) || !isset($_GET["u"])){
                ?>
                <section id="education" class="section section-education">
                    <div class="animate-up">
                        <h2 class="section-title">Education</h2>
                            <div class="timeline-box-inner animate-right">
                                 <div class="timeline-head">
                                     <center>
                                        <?php
                                     $result_loc = $db->get_location();
                                                    $arr_loc = array();
                                                    foreach($result_loc as $row){ 
                                                        array_push($arr_loc, $row[1].", ".$row[2]);
                                                    }
                                                    $result12 = $db->get_candidate_education($id);
                                                    $ctr = 0;
                                                    $prev = false;
                                                    foreach($result12[1] as $row12) {
                                                        if((isset($_GET["u"]) && $row12[10] == 1) || !isset($_GET["u"])){
                                                            if($prev == 1){ ?>
                                                        <div class="div"></div>
                                                    <?php } else if($ctr != 0 && !isset($_GET["u"])) { ?>
                                                        <div class="div"></div>
                                                    <?php }
                                        ?>
                                         
                                     <?php if(!isset($_GET["u"])){ ?>
                                     <input class="education" type="checkbox" value="<?php echo $row12[0]; ?>" <?php echo ($row12[10] == 1 ? "checked" : "unchecked"); ?>>
                                <?php } ?>
                                                     <h3 class="educ_head"><?php echo $row12[3]?></h3>
                                                     <h4 class="educ_sch"><?php echo $row12[4]; ?></h4>
                                                     <p class="educ_loc"><?php echo $arr_loc[$row12[5]-1]; ?></p>
                                                     <div class="educ_date"><div class="date"><?php $date = date_create($row12[6]);
                                                            $date1 = date_create($row12[7]);
                                                            echo date_format($date, 'F Y')." - ";
                                                            echo ($row12[7] == date("Y") ? "present" : date_format($date1, 'F Y')); ?></div></div>
                                        <?php 
                                                    $ctr++;
                                                    if(isset($_GET["u"]) && $row11[4] == 1){
                                                                $prev = true;
                                                            } else {
                                                                $prev = false;
                                                            }
                                                    } }
                                        ?>
                                         </center>
                                    </div>
                            </div>
                    </div>
				</section>
                <?php } ?>
				
                <section id="membership" class="section section-text">
					<div class="animate-up">
						<h2 class="section-title">Professional Memberships</h2>
                            <div class="timeline-box-inner animate-right">
                                 <div class="timeline-head">
                                     <center>
                                    <?php 
                                            $result16 = $db->get_candidate_membership($id);
                                         $ctr = 0;
                                            foreach($result16[1] as $row16) {
                                    ?>      
                                            <h3 class="mem_head"><?php echo $row16[2]; ?></h3>
                                            <h4 class="mem_des"><?php echo $row16[3]; ?></h4>
                                            <div class="mem_date"><div class="date"><?php echo $row16[4]." - ";
                                                            echo ($row16[5] == date("Y") ? "present" : $row16[5]); ?></div></div>
                                                <?php //echo "<strong>".$row16[4]."(".$row16[3].") </strong>, ".$row16[5]."-".$row16[6]; ?>
                                    <?php
                                                $ctr++;
                                                    if($ctr != $result16[1]->rowCount()){ ?>
                                                        <div class="div"></div>
                                                    <?php }
                                            }
                                    ?>
                                         </center>
                                </div>
                            </div>
                    </div>
				</section>
									
				<section id="achievements" class="section section-text">
					<div class="animate-up">
						<h2 class="section-title">Achievements</h2>
                            <div class="timeline-box-inner animate-right">
                                 <div class="timeline-head">
    								<div class='row'>
                                        <div class='animate-right'>
                                            <?php 
                                                    $result17 = $db->get_candidate_achievement($id);
                                                    $ctr = 0;
                                                    foreach($result17[1] as $row17) {
                                            ?>
                                                <center>
                                                        <h3 class="ach_head"><?php echo $row17[2]; ?></h3>
                                                        <p class="ach_des"><?php echo $row17[3]; ?></p>
                                            <div class="ach_date"><div class="date"><?php echo $row17[4]; ?></div></div>
                                                        </center>    

                                            <?php
                                                        $ctr++;
                                                    if($ctr != $result17[1]->rowCount()){ ?>
                                                        <div class="div"></div>
                                                    <?php }
                                                    }
                                            ?>
                                        </div>
                                    </div>
							     </div>
                            </div>
					</div>
				</section>
            <br><br>
<!-- 							</div>
</div> -->
<footer class="footer">
</footer>
</div>
<a href="#" class="btn-scroll-top"><i class="rsicon rsicon-arrow-up"></i></a>
<div id="overlay"></div>
<div id="preloader">
	<div class="preload-icon"><span></span><span></span></div>
	<div class="preload-text"></div>
</div>

<script type='text/javascript' src='https://www.google.com/recaptcha/api.js?onload=PxRecaptchaCallback&#038;render=explicit&#038;ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/rs-card-contact-form/js/contact-form.js?ver=4.7.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/themes\/rscard-wp\/doctor\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/themes\/rscard-wp\/doctor\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View Cart","cart_url":"http:\/\/px-lab.com\/themes\/rscard-wp\/doctor\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='//px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.6.9'></script>
<script type='text/javascript' src='//px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/themes\/rscard-wp\/doctor\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/themes\/rscard-wp\/doctor\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type='text/javascript' src='//px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.6.9'></script>
<script type='text/javascript' src='//px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js?ver=1.4.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/themes\/rscard-wp\/doctor\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/themes\/rscard-wp\/doctor\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type='text/javascript' src='//px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.6.9'></script>
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=+AIzaSyA5OES_3FSQgjB8F_RCyJZnblbM4TReJXU&#038;ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/fonts/map-icons/js/map-icons.min.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-includes/js/imagesloaded.min.js?ver=3.2.0'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/isotope.pkgd.min.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.appear.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.onepagenav.min.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.bxslider/jquery.bxslider.min.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.customscroll/jquery.mCustomScrollbar.concat.min.js?ver=4.7.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var mejsL10n = {"language":"en-US","strings":{"Close":"Close","Fullscreen":"Fullscreen","Turn off Fullscreen":"Turn off Fullscreen","Go Fullscreen":"Go Fullscreen","Download File":"Download File","Download Video":"Download Video","Play":"Play","Pause":"Pause","Captions\/Subtitles":"Captions\/Subtitles","None":"None","Time Slider":"Time Slider","Skip back %1 seconds":"Skip back %1 seconds","Video Player":"Video Player","Audio Player":"Audio Player","Volume Slider":"Volume Slider","Mute Toggle":"Mute Toggle","Unmute":"Unmute","Mute":"Mute","Use Up\/Down Arrow keys to increase or decrease volume.":"Use Up\/Down Arrow keys to increase or decrease volume.","Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds."}};
var _wpmejsSettings = {"pluginPath":"\/themes\/rscard-wp\/doctor\/wp-includes\/js\/mediaelement\/"};
/* ]]> */
</script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-includes/js/mediaelement/mediaelement-and-player.min.js?ver=2.22.0'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.owlcarousel/owl.carousel.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/themes/rs-card/js/plugins/jquery.slick/slick.min.js?ver=4.7.4'></script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-includes/js/wp-embed.min.js?ver=4.7.4'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var icl_vars = {"current_language":"en","icl_home":"http:\/\/px-lab.com\/themes\/rscard-wp\/doctor","ajax_url":"http:\/\/px-lab.com\/themes\/rscard-wp\/doctor\/wp-admin\/admin-ajax.php","url_type":"3"};
/* ]]> */
</script>
<script type='text/javascript' src='http://px-lab.com/themes/rscard-wp/doctor/wp-content/plugins/sitepress-multilingual-cms/res/js/sitepress.js?ver=4.7.4'></script>
        <script src="../../../../js/jquery.js"></script>
        <script>
            $(document).ready(function(){
               $("input[type='checkbox']").on("click", function(){
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
                            data: {"request" : "update-resume", "no": "3", "id" : this.value, "table" : this.className, "act" : act},
                            dataType: "json"
                        });
                    });
               });
            });
        </script>
</body>
</html>