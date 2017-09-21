<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/semantic/semantic.css')}}">
        <link href='https://fonts.googleapis.com/css?family=Quantico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Job Finder | Home</title>
        <style>
            * { 
                box-sizing: border-box;
                font-size: 1.0em;
                font-weight: 100;
                margin: 0;
            }
			html, body {
				width: 100%;
				font-family: GillSans, Calibri, Trebuchet, sans-serif;
			}
			.head { background-color: #2185D0; }
            .white { color: #FFF !important; }
            div.search-bar { 
                background-color: #EEEEEE;
                margin-bottom: 20px;
            }
            div.search-bar div {
                padding-top: 3px;
                padding-bottom: 3px;
            }
            #myInput {
                background-image: url('/css/searchicon.png'); /* Add a search icon to input */
                background-position: 10px 12px; /* Position the search icon */
                background-repeat: no-repeat; /* Do not repeat the icon image */
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }
            #myUL {
                /* Remove default list styling */
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            #myUL li a {
                border: 1px solid #ddd; /* Add a border to all links */
                margin-top: -1px; /* Prevent double borders */
                background-color: #f6f6f6; /* Grey background color */
                padding: 12px; /* Add some padding */
                text-decoration: none; /* Remove default text underline */
                font-size: 18px; /* Increase the font-size */
                color: black; /* Add a black text color */
                display: block; /* Make it into a block element to fill the whole list */
            }

            #myUL li a.header {
                background-color: #e2e2e2; /* Add a darker background color for headers */
                cursor: default; /* Change cursor style */
            }

            #myUL li a:hover:not(.header) {
                background-color: #eee; /* Add a hover effect to all links, except for headers */
            }
            
            
            #edit_pic {
                position:absolute;
                top:35%;
                margin: auto;
                z-index: 2;
                opacity: 0;
                transition: opacity 1s ease-in-out;
                -moz-transition: opacity 1s ease-in-out;
                -webkit-transition: opacity 1s ease-in-out;
            }
            
            #delete_pic {
                position:absolute;
                top:55%;
                margin: auto;
                z-index: 2;
                opacity: 0;
                transition: opacity 1s ease-in-out;
                -moz-transition: opacity 1s ease-in-out;
                -webkit-transition: opacity 1s ease-in-out;
            }
            
            #display_pic {
                position: relative;
                transition: opacity 1s ease-in-out;
                -moz-transition: opacity 1s ease-in-out;
                -webkit-transition: opacity 1s ease-in-out;
                display: block;
                width: 100%;
            }
            
            #display_pic:hover {
                opacity:0.5;
            }
            
            #display_pic_div {
                position: relative;
                margin: 20px auto 0;
                width: 100%;
                max-width: 400px;
            }
            
            
            .fa.fa-thumbs-down {
                color: white;
                text-shadow: 0px 1px 5px #000;
            }
            
            .fa.fa-thumbs-up {
                color: white;
                text-shadow: 0px 1px 5px #000;
            }
            
            .fa.fa-thumbs-up:hover {
                color: #32ffff;
            }
            
            .fa.fa-thumbs-down:hover {
                color: #ff0a0a;
            }
            
            .invited_icons {
                background: transparent;
                border: none !important;
                float: right;
            }
            
            .fa.fa-comments {
                text-shadow: 0px 1px 5px #000;
                color: white;
            }
            
            .fa.fa-comments:hover {
                 color: yellow;
            }
            
            .resume_name {
                display: inline;
            }
            
              /* Popup container - can be anything you want */
            .pop_up {
                position: relative;
                display: inline-block;
                margin-top: 40px;
                margin-left: 89px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* The actual popup */
            .pop_up .pop_up_text {
                width: 200px;
                background-color: #1a94db;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 8px 0;
                position: absolute;
                font-size: 13px;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -80px;
            }

            /* Popup arrow */
            .pop_up .pop_up_text::after {
                content: "";
                position: absolute;
                top: 0%;
                left: 25%;
                margin-top: -10px;
                border-width: 5px;
                border-style: solid;
                border-color: transparent transparent #1a94db transparent;
            }
            
            .bullseye.icon {
                color: red;
            }
            
            .default_button {
                background: transparent;
                border: none !important;
                width: 25px;
            }
            
            
            .gallery_container {
                padding: 5px;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .creative_pics {
                height: 10%;
                width: 10%;
                border: 1px solid gray;
                cursor: pointer;
            }
            
            .creative_pics:hover {
                -webkit-transform:scale(1.1); /* Safari and Chrome */
                -moz-transform:scale(1.1); /* Firefox */
                -ms-transform:scale(1.1); /* IE 9 */
                -o-transform:scale(1.1); /* Opera */
                 transform:scale(1.1);
            }
            
            .display_picture {
                width: 100%;
                height: 10%;
                position: relative;
            }
            
            .delete_display_picture {
                display: inline-block;
                float:right;
                margin:5px 5px 0 0;
                position: absolute;
                top: 0;
                right: 0;
            }
            
            #resume_1, #resume_2, #resume_3, .info_cont {
                white-space: nowrap;
                overflow:hidden !important;
                text-overflow: ellipsis;
            }
            
            #resume_notif {
                overflow: auto;
            }
            
            .block-wrap {
              display: inline-block;
              max-width: 100%;
            }
            
            .textResume {
              display: block;
              overflow: hidden;
              white-space: nowrap;
              text-overflow: ellipsis;
            }
            
            .right.text.icon {
              float: right;
              margin-left: 5px;
              cursor: pointer;
            }
            
            .left.text.icon {
                float: left;
                margin-right: 5px;
            }
            
            .chevron.circle.right.icon, .right.text.icon, .camera.icon, .record.icon, .toggle.on.icon {
                cursor: pointer;
            }
            
            .chevron.circle.right.icon:hover, .right.text.icon:hover, .camera.icon:hover, .record.icon:hover, .toggle.on.icon:hover {
                color: blue;
            }
            
            .card {
                position: relative;
                width: 50%;
            }
            .image {
              opacity: 1;
              display: block;
              width: 100%;
              height: auto;
              transition: .5s ease;
              backface-visibility: hidden;
            }
            .middle {
              transition: .5s ease;
              opacity: 0;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              -ms-transform: translate(-50%, -50%)
            }
            .card:hover .image {
              opacity: 0.3;
            }
            .card:hover .middle {
              opacity: 1;
            }
		</style>
	</head>

    <body>
        <div class="head">
          <div class="ui container grid">
            <div class="two wide left floated column">
              <a href="index.php"><button class="ui primary fluid button">Home</button></a>
            </div>
            <div class="four wide right floated column">
              <div class="ui primary buttons">
                  <div class="two wide column">
                <a id="profile">
                    <button class="ui primary fluid button" id="nav_name">

                    </button>
                  </a>
                  </div>
                  <div class="two wide column">
                  <!--button id="logout" class="ui primary fluid button" data-link="logout.php">Log out</button-->
                  <form action="{{route('logout')}}" method="post">
                  {{ csrf_field() }}
                    <button id="logout" class="ui primary fluid button" href="{{route('logout')}}">Log out</button>
                    </form>
                  </div>
              </div>
            </div> 
          </div>
        </div>
 <!-- search -->
        <div class="search-bar">
          <div class="ui container">
            <form class="ui form" method="get" action="../jobs/results.php">
              <div class="ui stackable grid">
                <div class="sixteen wide column">
                  <div class="field">
                    <div class="ui action input">
                        <input class="six wide field" type="text" name="q" placeholder="Search Jobs">
                        <input type="number" name="salary" placeholder="Minimum Salary">
                        <div class="ui selection dropdown">
                        <input type="hidden" name="location" placeholder="Location">
                          <i class="dropdown icon"></i>
                          <div class="default text">City</div>
                          <div class="menu">
                              <div class='item' data-value='' selected>All</div>
                            <?php
                                /*$db = new Database();
                                $result = $db->get_city();
                                foreach($result as $row) {
                                echo "<div class='item' data-value='".$row[0]."'>".$row[1]."</div>";
                                    }*/
                                ?>
                          </div>
                        </div>
                        <div class="ui selection dropdown">
                        <input type="hidden" name="job_field" placeholder="Field of Study">
                          <i class="dropdown icon"></i>
                          <div class="default text">Field of Study</div>
                          <div class="menu">
                              <div class='item' data-value='' selected>All</div>
                            <?php
                                /*$db = new Database();
                                $result = $db->get_field_study();
                                foreach($result as $row) {
                                echo "<div class='item' data-value='".$row[0]."'>".$row[1]."</div>";
                                    }*/
                                ?>
                          </div>
                        </div>
                        <button class="ui icon blue button">
                        <i class="search icon"></i>
                        </button>
                        <button type="button" class="ui icon grey button gear" data-tooltip="Advanced Search" id = "advance">
                        <i class="settings icon"></i>
                        </button>
                        <button type="button" class="ui icon orange button gear" data-tooltip="Reset" id = "reset">
                        <i class="recycle icon"></i>
                        </button>
                    </div> 
                  </div>
                </div>
              </div>
            </form>
              
          </div>
        </div>
 <!-- content -->
        <div class="ui container">
            <!-- menu -->
            <div class="ui top attached tabular menu">
              <a class="active item" data-tab="1" href="#overview">Overview</a>
              <a class="item" data-tab="2" href="#profile">Profile</a>
              <a class="item" data-tab="3" href="#applications">Applications</a>
              <!--<a class="item" data-tab="4">Inbox</a>-->
            </div>
            <!-- menu contents -->
            
            <!-- menu - overview -->
            <div class="ui bottom attached active tab segment" data-tab="1">
              
              <div class="ui stackable grid">
                <!-- announcement section -->
                <div class="row">
                    <div class="seven wide column">
                    <div class="ui attached message">
                        <div class="header"><i class="icon announcement"></i>&nbsp;Announcement Board</div>
                    </div>
                    <div class="ui attached fluid segment">
                        <?php 
                           /* $result = $db->get_announcement();
                            if($result->rowCount() > 0):
                                foreach($result as $row):*/
                        ?>
                        <strong><?php //echo $row[0]; ?></strong>
                        <p><?php //echo $row[1]; ?><small><br>
                            <?php /*$date =  date_create($row[2]);
                                    echo date_format($date, 'F j\, Y');*/
                            ?>
                            </small></p>
                        <?php //endforeach; ?>
                        <?php //else: ?>
                        <strong>No new announcements.</strong>
                        <?php// endif; ?>
                    </div>
                    </div>
                </div>
                <!-- interviews this week section -->
                      
                      <table class="ui sortable celled blue table" id="interview_table"> <!--- 7/3/17 change start -->
                       <thead>
                        <tr>
                            <th onclick="sort_table('interview_table', 0)" data-status="1">Company</th>
                            <th onclick="sort_table('interview_table', 1)" data-status="1">Position</th>
                            <th onclick="sort_table('interview_table', 2)" data-status="1">Interview Schedule</th>
                            <th onclick="sort_table('interview_table', 3)" data-status="1">Place</th>
                        </tr>
                       </thead>
                        <tbody>
                           <?php 
                        /*$result = $db->get_applications_details_this_week($_SESSION["user_id"]);//Get contents of tbl_application
                           foreach($result[1] as $row){ 
                        ?>
                        <tr>
                          <td><?php echo $db->get_comp_info(1,$row[2]);?></td>
                          <td><?php echo $db->get_job_info($row[2],7);?></td>
                          <td><?php 
                               $date = date_create($row[8]);
                               echo "Date: ".date_format($date, 'F j\, Y')."<br>Time: ".date_format($date, "g:i a");?></td>
                          <td><?php echo $db->get_job_info($row[2],3);?></td>
                        </tr>
                        <?php } */ ?>
                            
                       </tbody>
                        
                    </table> 
                  </div>  
                </div>
        <!-- menu - profile -->
            <div class="ui bottom attached tab segment" data-tab="2">
                <div class="ui stackable container grid">
                <!-- column for user info and links -->
                <div class="four wide column">
                    <!-- user info section -->
                    <div class="ui segment">
                        <div id="display_pic_div">
                        <?php
                            $directory = "uploads/";
                            $images = glob($directory . "*.{jpg,png,jpeg}", GLOB_BRACE);
                            $chk = false;
                          /*  foreach($images as $image){
                                $temp = explode("/", $image);
                                $temp_2 = explode(".", $temp[1]);
                                if($temp_2[0] == $user->id){ 
                                    $chk = true;
                                    echo '<img id="display_pic" class="ui circular image" src="{{asset('.$image.')}}"/>';
                                    break;
                                }
                            } save this for laters */
                        ?>
                            @if(!$chk)
                                 <img id='display_pic' class='ui circular image' src="{{asset('candidates/images/default.jpg')}}"> 
                            @endif
                    
                        <button class="ui blue button" id="edit_pic"><?php echo ($chk ? "<i class='write square icon'></i>Edit" : "<i class='plus square icon'></i>Add"); ?></button>
                        @if($chk)
                            <button class="ui blue button" id="delete_pic"><i class="trash square icon"></i>Remove</button>
                        @endif
                            </div>
                        <form id="upload_prof_pic" action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="verify" value="1">
                            <input type="file" name="file_to_upload" id="up_pic" style="display: none;">
                        </form>
                      <p>
                        <h3>  {{ $user->first_name.' '.$user->last_name }}</h3>
                        Joined in <strong>{{$user->date_created}}</strong><br>
                        <span id="edit">
                            <a data-type="modal" data-for="edit-info"><strong>Edit Profile</strong>&nbsp;&nbsp;<i class="write square icon"></i></a>
                        </span>
						<br>
						<span id="change_pass">
							<a data-type="modal" data-for="change-pass"><strong>Change Password</strong>&nbsp;&nbsp;<i class="write square icon"></i></a>
						</span>
                      </p>
                      @if(Session::has('edit'))
                      <?php //if(isset($_SESSION["edit"])):
                         //$color_edit = ($_SESSION["edit"]["success"]) ? "positive" : "negative"; ?>
                      <div class="ui <?php //echo $color_edit; ?> message">
                        <i class="close icon"></i>
                        <div class="header"><?php //echo $_SESSION["edit"]["header"]; ?></div>
                        <p><?php //echo $_SESSION["edit"]["msg"]; ?></p>
                      </div>
                      <?php //unset($_SESSION["edit"]); ?>
                      Session::forget('edit');
                      <?php //endif; ?>
                      @endif
                      <div class="ui divided items">
                          <div class="item"><p class="info_cont"><i class="map pin icon"></i>
                              {{$candidate->location}}</p>
                          </div>
                          <div class="item"><p class="info_cont"><i class="mobile icon"></i>
                              {{'+63'. $candidate->mobile_no}}</p>
                          </div>
                          <div class="item"><p class="info_cont"><i class="call icon"></i>
                              {{ $candidate->tel_no }}</p>
                          </div>
                          <div class="item"><p class="info_cont"><i class="mail icon"></i>
                              {{ $user->email }}</p>
                          </div>
                          <div class="item"><p class="info_cont"><i class="id card icon"></i>
                              {{ $candidate->position }}</p>
                          </div>
                      </div>
                    </div>
        <!-- about me section -->
            <div class="ui segment" id="resume_4">
                <div class="ui grid">
                    @if(Session::has('abt'))
                    <?php //if(isset($_SESSION["abt"]) && $_SESSION["abt"]["success"]): ?>
                            <!-- message from the server -->
                        <div class="row">
                             <div class="sixteen wide column">
                                <div class="ui positive message">
                                    <i class="close icon"></i>
                                      <div class="header"><?php //echo $_SESSION["abt"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["abt"]["msg"]; ?></p>
                                    </div>
                                    Session::forget('abt');
                                </div>
                            </div>
                    @endif
                          <?php $label = '' ?>
                            @if($resume->intro != '')
                               <?php $label = 'Edit' ?>
                            @else
                               <?php $label = 'Set' ?>
                            @endif
                          <div class="row">
                            <div class="eight wide column">
                              <h2 class="ui small header">
                                <i class="user icon"></i>
                                <div class="content" style="width: 100%;">
                                    <h4>About me</h4>
                                </div>
                              </h2>
                            </div>
                            <div class="left floated right aligned eight wide column">
                            
                              <a data-type="modal" data-for="add-about-me"><i class="add square icon"></i><strong>{{$label.' info'}}</strong></a>
                            </div>
                          </div>
                          <div class="row">
                            <div class="column">
                              <div class="ui divided items">
                                <?php 
                                 /* if(strlen($user::get_info(11)) > 0){
                                      $chk_abt = true;*/
                                ?>
                                @if(strlen($resume->intro))
                                    <?php $chk_abt = true; ?>
                                  <div class="item"><p><i class="file text outline icon"></i>
                                    {{$resume->url}} </p>
                                    </div>
                                  <div class="item"><p style="font-style: italic;"><i class="quote left icon"></i>
                                    {{$resume->intro}}
                                      </p></div>
                                    @else
                                       <?php $chk_abt = false ?>
                                    <div class="pop_up">
                                        <span class="pop_up_text">This needs to be set first before you can generate a resume.</span>
                                    </div>
                                  @endif
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                           <!-- links section-->
                            <div class="ui segment">
                            <div class="ui grid">
                                <?php //if(isset($_SESSION["link"]) && $_SESSION["link"]["success"]): ?>
                                @if(Session::has('link'))
                                    <!-- message from the server -->
                                    <div class="row">
                                        <div class="sixteen wide column">
                                            <div class="ui positive message">
                                            <i class="close icon"></i>
                                            <div class="header"><?php //echo $_SESSION["link"]["header"]; ?></div>
                                            <p><?php //echo $_SESSION["link"]["msg"]; ?></p>
                                            </div>
                                            <?php //unset($_SESSION["link"]); ?>
                                            Session::forget('link');
                                        </div>
                                    </div>
                                <?php //endif; ?>
                                @endif
                                <div class="row">
                                    <div class="eight wide column">
                                    <h2 class="ui small header">
                                        <i class="linkify icon"></i>
                                        <div class="content">
                                        <h4>Links</h4>
                                        </div>
                                    </h2>
                                    </div>
                                    <div class="left floated right aligned eight wide column">
                                    <a data-type="modal" data-for="add-link"><i class="add square icon"></i><strong>Add Link</strong></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="column">
                                    <div class="ui divided items">
                                    @forelse($links as $link)
                                        <?php 
                                            
                                               $link->website = str_replace(" ", "", strtolower($link->website));
                                        ?>

                                        <div class="item"><p><i class="{{'circular '.$link->website.' icon'}}"></i>
                                        <a href="{{'http://www.'.$link->website.'.com/'.$link->link.' target=_blank'}}"><strong><?php //echo $row[1]; ?>{{$link->link}}</strong></a>&nbsp;<a data-tooltip="Edit"><i class="write square icon" data-link-id="{{$link->no}}"></i></a></p>
                                        </div>
                                        <?php //endforeach; ?>
                                        @empty
                                        <p>No links yet.</p>
                                    @endforelse
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- column for educational & work background -->
                        <div class="nine wide column">
                    <!-- educational bg segment -->
                    <div class="ui segment">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ten wide column">
                                    <h2 class="ui small header">
                                      <i class="student icon"></i>
                                      <div class="content">
                                        <h4>Educational Background</h4>
                                      </div>
                                    </h2>
                                    <?php
                                          /*  $result_temp = $db->list_school($_SESSION['email'], null);
                                            $chk_educ = true;
                                            if($result_temp->rowCount() == 0){
                                                echo "At least one is needed to generate a resume.";
                                                $chk_educ = false;
                                            }*/
                                            $chk_educ = true;
                                        ?>
                                        @if(count($candidate_educ) == 0)
                                            At least one is needed to generate a resume.
                                        @endif
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-school"><i class="add square icon"></i><strong>Add Education</strong></a>
                                </div>
                            </div>
                            <?php //if(isset($_SESSION["sch"])): ?>
                            @if(Session::has('sch'))
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php //echo ($_SESSION["sch"]["success"] ? "positive" : "negative"); ?> message">
                                      <i class="close icon"></i>
                                      <div class="header"><?php //echo $_SESSION["sch"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["sch"]["msg"]; ?></p>
                                    </div>
                                    <?php //unset($_SESSION["sch"]); ?>
                                    Session::forget('sch');
                                </div>
                            </div>
                            <?php //endif; ?>
                            @endif
                            <?php
                               /* $result = $db->list_school($_SESSION["email"], null);
                                foreach($result as $row):*/
                            ?>
                            @forelse($candidate_educ as $cand_ed)
                            <div class="row">
                                <div class="six wide column">
                                    <strong style="padding-left: 40px;">
                                        <?php
                                            switch($cand_ed->level):
                                                case "1": echo "Primary"; break;
                                                case "2": echo "Secondary"; break;
                                                case "3": echo "Tertiary"; break; 
                                                case "4": echo "Graduate School"; break;
                                                default:  echo "School"; break; 
                                            endswitch;
                                        ?>
                                    </strong>
                                </div>
                                <div class="ten wide column">
                                    <strong><?php //echo $row[1]; ?>{{$cand_ed->degree}}</strong>&nbsp;
                                    <a data-tooltip="Edit"><i class="write square icon" data-id="{{$cand_ed->id}}"></i></a><br>
                                    <?php //echo $row[2]; ?>{{$cand_ed->school}}<br>
                                    <?php
                                       /* $result_disp = $db->get_location();
                                        foreach($result_disp as $row_1){
                                            if($row_1[0] == $row[3]){
                                                echo  $row_1[1].", ".$row_1[2];
                                            }
                                        }*/
                                    ?>
                                    {{$cand_ed->location}}
                                    <br>
                                    <!--<i class="marker icon"></i>&nbsp;&nbsp;<?php //echo $row[3]; ?><br>-->
                                    <?php //endif; ?>
                                    <?php //echo $row[4]; ?>
                                    <?php /*$yrange = explode("-", $row[4]);
                                                echo $yrange[0];
                                                if($yrange[1] === date("Y")){
                                                    echo "-present";
                                                } else {
                                                    echo "-".$yrange[1];
                                                }*/
                                        ?>
                                    {{$cand_ed->year_entered}}

                                    <?php 
                                        if($cand_ed->year_ended == date("Y"))
                                        {
                                            echo "-present";
                                        }
                                        else{
                                            echo "-".$cand_ed->year_ended;
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php //endforeach; ?>
                        @empty
                     @endforelse
                        </div>
                    </div>
                    <!-- work bg segment-->
                    <div class="ui segment">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ten wide column">
                                    <h2 class="ui small header">
                                      <i class="suitcase icon"></i>
                                      <div class="content">
                                        <h4>Work Experience</h4>
                                      </div>
                                    </h2>
                                    <?php
                                            /*$result_temp = $db->get_work($_SESSION['email']);
                                            $chk_work = true;
                                            if($result_temp->rowCount() == 0){
                                                echo "At least one is needed to generate a resume.";
                                                $chk_work = false;
                                            }*/
                                            $chk_work = true;
                                        ?>
                                    @if(count($candidate_exp) == 0)
                                            At least one is needed to generate a resume.
                                        @endif
                                    <input type="hidden" id="count_work" value="{{count($candidate_exp)}}">
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-work"><i class="add square icon"></i><strong>Add Work Experience</strong></a>
                                </div>
                            </div>
                            <?php // if(isset($_SESSION["work_edit"])): ?>
                            @if(Session::has('work_edit'))
                            <?php //$color = ($_SESSION["work_edit"]["success"]) ? "positive" : "negative"; ?>
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php //echo $color; ?> message">
                                      <i class="close icon"></i>
                                      <div class="header"><?php //echo $_SESSION["work_edit"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["work_edit"]["msg"]; ?></p>
                                    </div>
                                    <?php //unset($_SESSION["work_edit"]); ?>
                            Session::forget('work_edit');
                                </div>
                            </div>
                            <?php //endif; ?>
                            @endif
                        </div>
                        <div class="ui grid">
                            <?php
                               /* $result = $db->get_work($_SESSION["email"]);
                                foreach($result as $row):*/
                            ?>
                            @forelse($candidate_exp as $exp)
                            <div class="row">
                                <div class="six wide column" style="padding-left: 50px;">
                                    <strong>
                                         <?php 
                                        $date = date_create($exp->year_entered);
                                            echo date_format($date, 'F Y')." to<br>";
                                        $date1 = date_create($exp->year_ended);
                                            echo date_format($date1, 'F Y');
                                         ?> 
                                    </strong>
                                </div>
                                <div class="ten wide column">
                                    <strong><?php //echo $row[0]; ?> {{$exp->position}}</strong>&nbsp;
                                    <a data-tooltip="Edit"><i class="write square icon" data-work-id="<?php //echo $row[5]; ?>"></i></a><br>
                                    <?php // echo $row[1]; ?>{{$exp->company}}<br>
                                    <?php
                                      /*  $result_work = $db->get_location();
                                        foreach($result_work as $row_1){
                                            if($row_1[0] == $row[2]){
                                                echo  $row_1[1].", ".$row_1[2];
                                            }
                                        }*/
                                    ?>
                                    {{$exp->location}}
                                    <?php //echo $row[2]; ?>
                                    <p style="text-align: justify; padding-right: 10px;">
                                        <?php //echo $row[3]; ?>
                                        {{$exp->description}}
                                    </p>
                                </div>
                            </div>
                            <?php // endforeach; ?>
                            @empty

                            @endforelse
                        </div>
                    </div>
                    
                    <!-- achievements bg segment-->
                    <div class="ui segment">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ten wide column">
                                    <h2 class="ui small header">
                                      <i class="trophy icon"></i>
                                      <div class="content">
                                        <h4>Achievements</h4>
                                      </div>
                                    </h2>
                                    <?php
                                           /* $result_temp = $db->get_candidate_achievement($_SESSION['email']);
                                            $chk_ach = true;
                                            if($result_temp[1]->rowCount() == 0){
                                                echo "At least one is needed to generate a resume.";
                                                $chk_ach = false;
                                            }*/
                                            $chk_ach = true;
                                        ?>
                                    @if(count($candidate_achieve) == 0)
                                            At least one is needed to generate a resume.
                                        @endif

                                    <input type="hidden" id="count_ach" value="{{count($candidate_achieve)}}">
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-achievement"><i class="add square icon"></i><strong>Add Achievement</strong></a>
                                </div>
                            </div>
                            <?php //if(isset($_SESSION["achieve"])): ?>
                            @if(Session::has('achieve'))
                            <?php //$color = ($_SESSION["achieve"]["success"]) ? "positive" : "negative"; ?>
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php // echo $color; ?> message">
                                      <i class="close icon"></i>
                                      <div class="header"><?php // echo $_SESSION["achieve"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["achieve"]["msg"]; ?></p>
                                    </div>
                                    <?php //unset($_SESSION["achieve"]); ?>
                                    Session::forget('achieve');
                                </div>
                            </div>
                            <?php //endif; ?>
                            @endif
                        </div>
                        <div class="ui grid">
                            @forelse($candidate_achieve as $cand_ach)
                            <div class="row">
                                <div class="six wide column" style="padding-left: 50px;">
                                    <strong>
                                        {{$cand_ach->year}}<!---year-->
                                    </strong>
                                </div>
                                <div class="ten wide column">
                                    <strong>{{$cand_ach->title}}</strong>&nbsp;&nbsp;<a data-tooltip="Edit"><i class="write square icon" data-ach-id="{{$cand_ach->id}}"></i></a> <!---title-->
                                    <p style="text-align: justify; padding-right: 10px;">
                                        {{$cand_ach->description}}
                                    </p>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <!-- memberships segment-->
                    <div class="ui segment">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ten wide column">
                                    <h2 class="ui small header">
                                      <i class="users icon"></i>
                                      <div class="content">
                                        <h4>Memberships</h4>
                                      </div>
                                    </h2>
                                    <?php
                                           /* $result_temp = $db->get_candidate_membership($_SESSION['email']);
                                            
                                            if($result_temp[1]->rowCount() == 0){
                                                echo "At least one is needed to generate a resume.";
                                                $chk_mem = false;
                                            }*/
                                            $chk_mem = true;
                                        ?>
                                        @if(count($candidate_member) == 0)
                                            At least one is needed to generate a resume.
                                        @endif
                                    
                                    <input type="hidden" id="count_mem" value="<?php //echo $result_temp[1]->rowCount(); ?>">
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-membership"><i class="add square icon"></i><strong>Add Membership</strong></a>
                                </div>
                            </div>
                            <!-- Romeo start -->
                            <?php //if(isset($_SESSION["mem"])): ?>
                            @if(Session::has('mem'))
                            <?php //$color = ($_SESSION["mem"]["success"]) ? "positive" : "negative"; ?>
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php //echo $color; ?> message">
                                      <i class="close icon"></i>
                                      <div class="header"><?php // echo $_SESSION["mem"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["mem"]["msg"]; ?></p>
                                    </div>
                                    <?php //unset($_SESSION["mem"]); ?>
                                    Session::forget('mem');
                                </div>
                            </div>
                            @endif
                            <!-- Romeo end -->
                        </div>
                        <div class="ui grid">
                            <?php 
                                           /* $result16 = $db->get_candidate_membership($_SESSION['email']);
                                            foreach($result16[1] as $row16) {*/
                                    ?>         
                            @forelse($candidate_member as $mem)                  
                                    
                            <div class="row">
                                <div class="six wide column" style="padding-left: 50px;">
                                    <strong>
                                        <?php echo $mem->date_entered."-";
                                            echo ($mem->date_ended == date("Y") ? "present" : $mem->date_ended); ?><!---year-->
                                    </strong>
                                </div>
                                <div class="ten wide column">
                                    <strong>{{$mem->assoc}}</strong>&nbsp;&nbsp;<a data-tooltip="Edit"><i class="write square icon" data-mem-id="{{$mem->id}}"></i></a><!---title of membership-->
                                    <p style="text-align: justify; padding-right: 10px;">
                                        {{$mem->description}}
                                    </p>
                                </div>
                                
                            </div>
                            <?php
                                      //      }
                                    ?>
                                    @empty
                            @endforelse
                        </div>
                    </div>
                    <!-- skill segment -->
                    <div class="ui segment">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ten wide column">
                                    <h2 class="ui small header">
                                      <i class="sticky note icon"></i>
                                      <div class="content">
                                        <h4>Skills</h4>
                                      </div>
                                    </h2>
                                    <?php
                                           // $result_temp = $db->get_skill($_SESSION['email']);
                                            $chk_skill = true;
                                          /*  if($result_temp->rowCount() == 0){
                                                echo "At least one is needed to generate a resume.";
                                                $chk_skill = false;
                                            }*/
                                        ?>
                                    @if(count($candidate_skills) == 0)
                                        At least one is needed to generate a resume.
                                        <?php $chk_skill = false; ?>
                                    @endif
                                    <input type="hidden" id="count_skills" value="{{count($candidate_skills)}}">
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-skill"><i class="add square icon"></i><strong>Add Skill</strong></a>
                                </div>
                            </div>
                            @if(Session::has('skl'))
                            <?php //if(isset($_SESSION["skl"])): ?>
                            <?php //$color = ($_SESSION["skl"]["success"]) ? "positive" : "negative"; ?>
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php //echo $color; ?> message">
                                      <i class="close icon"></i>
                                      <div class="header"><?php //echo $_SESSION["skl"]["header"]; ?></div>
                                      <p><?php //echo $_SESSION["skl"]["msg"]; ?></p>
                                    </div>
                                    <?php //unset($_SESSION["skl"]); ?>
                                    Session::forget('skl')
                                </div>
                            </div>
                            <?php //endif; ?>
                        @endif
                        </div>
                        <div class="ui grid">
                            <?php
                               /* $result = $db->get_skill($_SESSION["email"]);
                                foreach($result as $row): */
                            ?>
                            @forelse($candidate_skills as $skill)
                            <div class="row">
                                <div class="six wide column" style="padding-left: 50px;">
                                    <strong id="{{'disp_skill_'.$skill->id}}">
                                        <?php
                                           /* switch($row[0]):
                                                case "1": echo "Android"; break;
                                                case "2": echo "Angular.js"; break;
                                                case "3": echo "ASP.NET"; break; 
                                                case "4": echo "Bootstrap"; break;
                                                case "5": echo "C"; break;
                                                case "6": echo "C++"; break;
                                                case "7": echo "C#"; break;
                                                case "8": echo "Arithmetic"; break;
                                                case "9": echo "Classroom Management"; break;
                                                case "10": echo "MS Office"; break;
                                                case "11": echo "Problem Solving"; break;
                                                case "12": echo "Presentation Skills"; break;
                                                case "13": echo "Autocad"; break;
                                                case "14": echo "Automotive"; break;
                                                case "15": echo "Electrical Design"; break;
                                                case "16": echo "Programmable Logic Control"; break;
                                                case "17": echo "Unix"; break;
                                                default:  echo $row[0]; break; 
                                            endswitch;*/
                                        ?>
                                        {{$skill->skills}}&nbsp;<a data-tooltip="Edit"><i data-skill-id="{{$skill->id}}" class="write square icon"></i></a>
                                        <input type="hidden" id="{{'disp_percent_'.$skill->id}}" value="{{$skill->percent}}">
                                    </strong>
                                </div>
                            </div>
                            <?php //endforeach; ?>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- column for user's resumes -->

                      </div>
                    </div>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('semantic/dist/semantic.js')}}"></script>

<script>

    function check_hash() {
      //Checks for hash/es in the url.
      var url = window.location.hash.slice(1);
        if(url) 
        {
            $("a[data-tab]").removeClass("active");
            $("a[href='#"+url+"']").addClass("active");
            $("div[data-tab]").addClass("hide");
            $("div[data-tab='"+$("a[href='#"+url+"']").attr("data-tab")+"']").removeClass("hide");
                        
            var data_content = $("a[href='#"+url+"']").attr("data-tab");
            $("div[data-tab]").hide();
            $("div[data-tab='"+data_content+"']").show();
        }
    }          
          
    function change_tab(click){
        $("a[data-tab]").removeClass("active");

        if(!$(click).hasClass("active"))
        $(click).addClass("active");

                //Displays content depending on the selected tab
        var data_content = $(click).attr("data-tab");
        $("div[data-tab]").hide();
        $("div[data-tab='"+data_content+"']").show();
    }
    $(".ui.dropdown").dropdown();
    check_hash();
    $("a[data-tab]").on("click", function(){
            change_tab(this);
    });
     $("#profile").on("click", function(){
       window.location.href = "dashboard.php#profile";
        $("a[data-tab='2']").click();
    });

    /*$(document).ready(function(){
                $("[data-content]").popup({on: 'click'});
                $(".ui.dropdown").dropdown();
                $(".modal").modal({allowMultiple: true});
                $("[data-type='modal']").on("click", function(){$("div[data-for='"+$(this).attr("data-for")+"']").modal("show");});
                $("[data-submit]").on("click", function(){$("form[data-for='"+$(this).attr("data-submit")+"']").submit();});
                $('.message .close').on('click', function(){$(this).closest('.message').transition('fade');});
                $("i[data-id]").on("click", edit_school_form);
                $("i[data-work-id]").on("click", edit_work_form);
                $("#modal-del").on("click", function(){$("div[data-for='del-sch']").modal("show");});
                $("#del-sch").on("click", function(){$("form[name='del-sch']").submit();});
            });*/
</script>
    </body>