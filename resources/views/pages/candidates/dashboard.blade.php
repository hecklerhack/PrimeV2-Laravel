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
                                @foreach($job_category as $job)
                                    <div class='item' data-value="{{$job->id}}">{{$job->category}}</div>
                                @endforeach
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
                                            $chk_educ = false;
                                        @endif
                                </div>
                                <div class="left floated right aligned six wide column">
                                    <a data-type="modal" data-for="add-school"><i class="add square icon"></i><strong>Add Education</strong></a>
                                </div>
                            </div>
                            @if(Session::has('sch'))
                            <!-- message from the server -->
                            <div class="row">
                                <div class="sixteen wide column">
                                    <div class="ui <?php session('success') ? "positive" : "negative" ?> message">
                                      <i class="close icon"></i>
                                      <div class="header">{{session('header')}}</div>
                                      <p>{{session('msg')}}</p>
                                    </div>
                                   <?php Session::forget('sch'); ?>
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
                                            $chk_work = false;
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
                                            $chk_ach = false;
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
                <div class="three wide column">
                    <?php /*if(isset($_SESSION["res"])):
                         $color_resked = ($_SESSION["res"]["success"]) ? "positive" : "negative"; */?>
                    @if(Session::has('res'))
                      <div class="ui <?php echo $color_resked; ?> message">
                        <i class="close icon"></i>
                        <div class="header"><?php //echo $_SESSION["res"]["header"]; ?></div>
                        <p id="resume_notif"><?php //echo $_SESSION["res"]["msg"]; ?></p>
                      </div>
                      <?php unset($_SESSION["res"]); ?>
                      Session::forget('res');
                      <?php //endif; ?>
                    @endif
                    <div class="ui raised segment">
                        <center>
                            <div class="block-wrap">
                              <div class="block">
                                <div class="left text icon">
                                    <?php if(strpos(strtoupper($resume->public_url), "CLASSIC") !== false)
                                    { 
                                        echo "<button class='default_button' data-tooltip='This is your default resume and it can be viewed publicly.' disabled><i class='bullseye icon'></i></button>"; 
                                     } 
                                     ?>
                                </div>
                                <div class="right text icon">
                                    <i class="write q icon" title="Edit Resume 1"></i>
                                </div>
                                <div class="textResume">
                                    <h4 id="resume_1" title="{{$resume->resume_1}}">{{$resume->resume_1}}</h4>
                                </div>
                              </div>
                            </div><br>
                        
                        @if($chk_educ && $chk_work && $chk_ach && $chk_mem && $chk_skill && $chk_abt)
                          <i class="toggle on icon" onclick="openWin1()" title="Edit Visibility of Resume 1"></i>
                          <a href="{{'Resumes/Classic%202/index.php?u='.$resume->url}}" target="_blank" style="color: black;"><i class="chevron circle right icon" title="Public View Resume 1"></i></a>
                         @endif
                        </center>
                    </div>
                    <div class="ui raised segment">
                        <center>
                            <div class="block-wrap">
                              <div class="block">
                                  <div class="left text icon">
                                    <?php if(strpos(strtoupper($resume->public_url), "CREATIVE") !== false){ ?>
                                      <button class="default_button" data-tooltip="This is your default resume and it can be viewed publicly." disabled><i class="bullseye icon"></i></button><?php } ?>
                                  </div>
                                <div class="right text icon">
                                    <i class="write icon" title="Edit Resume 2"></i>
                                </div>
                                <div class="textResume">
                                    <h4 id="resume_2" title="{{$resume->resume_2}}">{{$resume->resume_2}}</h4>
                                </div>
                              </div>
                            </div><br>
                            
                        <i class="camera icon" title="View photos"></i>
                        <i class="record icon" title="View videos"></i>
                          <?php if($chk_educ && $chk_work && $chk_ach && $chk_mem && $chk_skill && $chk_abt){ ?>
                          <i class="toggle on icon" onclick="openWin2()" title="Edit Visibility of Resume 2"></i>
                          <a href="{{'Resumes/Creative2/creative.php?u='.$resume->url}}" target="_blank" style="color: black;"><i class="chevron circle right icon" title="Public View Resume 2"></i></a>
                          <?php } ?>
                        </center>
                    </div>
                    <div class="ui raised segment">
                        <center>
                            <div class="block-wrap">
                              <div class="block">
                                <div class="left text icon">
                                    <?php if(strpos(strtoupper($resume->public_url), "EXECUTIVE") !== false){ ?>
                                      <button class="default_button" data-tooltip="This is your default resume and it can be viewed publicly." disabled><i class="bullseye icon"></i></button><?php } ?>
                                </div>
                                <div class="right text icon">
                                    <i class="write icon" title="Edit Resume 3"></i>
                                </div>
                                <div class="textResume">
                                    <h4 id="resume_3" title="{{$resume->reume_3}}">{{$resume->resume_3}}</h4>
                                </div>
                              </div>
                            </div><br>
                          <?php if($chk_educ && $chk_work && $chk_ach && $chk_mem && $chk_skill && $chk_abt){ ?>
                          <i class="toggle on icon" onclick="openWin3()" title="Edit Visibility of Resume 3"></i>
                          <a href="{{'Resumes/Executive/index.php?u='.$resume->url}}" target="_blank" style="color: black;"><i class="chevron circle right icon" title="Public View Resume 3"></i></a>
                          <?php } ?>
                        </center>
                    </div>
                </div>
                <!-- pop-up windows -->
                <!-- pop-up window for editing user info -->

                <!--nothing yet, will add later-->
                <!-- pop-up window for adding school -->
                <div class="ui modal" data-for="add-school">
                  <div class="header">Add Education</div>
                  <div class="content">
                    <form class="ui form educ" data-for="add-school" method="post" action="educ" id="add-school-form">
                      <input type="hidden" name="request" value="add-school">
                       {{ csrf_field() }}
                      
                      <div class="field">
                          <label>Education Level</label>
                          <div class="ui fluid search selection dropdown" id="sch-level-add">
                          <input type="hidden" name="level">
                          <i class="dropdown icon"></i>
                          <div class="default text">Education Level</i></div>
                          <div class="menu">
                            <div class="item" data-value="1">Primary</div>
                            <div class="item" data-value="2">Secondary</div>
                            <div class="item" data-value="3">Tertiary</div>
                            <div class="item" data-value="4">Graduate School</div>
                          </div>
                        </div>
                        </div>
                      
                      
                      <div class="field">
                        <label>School</label>
                        <input type="text" name="name" placeholder = "Your school" maxlength="70">
                      </div>
                      
                      <div class="field" id="school-field" style="display: none;">
                          <label>Field of Study</label>
                          <div class="ui fluid search selection dropdown">
                          <input type="hidden" name="field">
                          <i class="dropdown icon"></i>
                          <div class="default text">Field of Study</i></div>
                          <div class="menu">
                             @foreach($job_category as $job)
                                    <div class='item' data-value="{{$job->id}}">{{$job->category}}</div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                        
                      
                      <div class="field">
                          <label>Location</label>
                          <div class="ui fluid search selection dropdown">
                          <input type="hidden" name="location">
                          <i class="dropdown icon"></i>
                          <div class="default text">School Location</i></div>
                          <div class="menu">
                            <?php
                               /* $result_loc = $db->get_location();
                                foreach($result_loc as $row){ */?>
                            @foreach($location as $loc)
                                <div class="item" data-value="{{$loc->city.','.$loc->province}}">{{$loc->city.','.$loc->province}}</div>
                            <?php // } ?>
                            @endforeach
                          </div>
                        </div>
                        </div>
                      <div class="two fields">
                          <div class="field">
                            <label> From </label>
                            <div id="sch-to-add">
                              <input type="date" name="from">
                            </div>
                          </div> 
                          <div class="field">
                            <label> To </label>
                            <div id="sch-to-add">
                              <input type="date" name="to">
                            </div>
                          </div> 
                    </div>
                      
                      
                      <div class="field">
                        <label>Degree</label>
                        <input type="text" name="degree" placeholder="Degree taken" maxlength="70">
                      </div>  
                      <input type="hidden" name="user_id" value="{{$user->id}}">
                      <button class="ui green button" type="submit" style="float: right;">Add</button>
                      <button class="ui blue button" type="button" id="cancel_add_sch">Cancel</button>
                    </form>
                  </div>
                </div>
                
                 <!-- pop-up window for adding work background -->
                      </div>
                    </div>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('semantic/dist/semantic.js')}}"></script>

<script>
        
            function verify_form(data){
                alert($("form[data-for='"+data+"']").valid());
                return false;
            }
        
            function view_msg(elt){
                document.getElementById("employer_msg").value = elt.value;
                $(".ui.modal.view_msg").modal("show");
            }
            
            function change_length(char_count, text_area, size){
                document.getElementById(char_count).innerHTML = (size-document.getElementById(text_area).value.length);
            }
            
            function change_skill_rate(myValue, output){
                document.getElementById(output).innerHTML = myValue + "%";
            }
        
            function sort_table(table_name, sort_op){
                var sort_order = parseInt($(this).attr("data-status"));

                if(sort_order) {
                    $(this).attr("data-status", "0");
                } else {
                    $(this).attr("data-status", "1");
                }
                
                var table, tr, td, i, j;
                table = document.getElementById(table_name);
                tr = table.getElementsByTagName("tr");
                
                var arr = new Array(tr.length);
                var arr_td = new Array(tr.length-1);
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[sort_op];
                      if(td){
                          arr[i-1] = td.innerHTML;
                          arr_td[i-1] = tr[i];
                      }
                }
                
                for (i = 1; i < tr.length; i++) {
                    table.deleteRow(i);
                    i = 0;
                }
                
                
                for (i = 0; i < arr.length; i++) {
                    for (j = 0; j < (arr.length - i - 1); j++) {
                        if(arr[j] == undefined || arr[j+1] == undefined){
                            break;
                        }
                        
                        if(sort_order){
                            if(arr[j].localeCompare(arr[j+1]) == 1) {
                                var tmp = arr[j];
                                arr[j] = arr[j+1];
                                arr[j+1] = tmp;

                                var tmp_2 = arr_td[j];
                                arr_td[j] = arr_td[j+1];
                                arr_td[j+1] = tmp_2;
                            }
                        } else {
                            if(arr[j].localeCompare(arr[j+1]) == -1) {
                                var tmp = arr[j];
                                arr[j] = arr[j+1];
                                arr[j+1] = tmp;

                                var tmp_2 = arr_td[j];
                                arr_td[j] = arr_td[j+1];
                                arr_td[j+1] = tmp_2;
                            }
                        }
                    }        
                }
                
                for (i = 1; i < arr_td.length+1; i++) {
                    var row = table.insertRow(i);
                    var temp = arr_td[i-1].getElementsByTagName("td");
                    for(var j = 0; j < temp.length; j++){
                        var cell = row.insertCell(j);
                        cell.innerHTML = temp[j].innerHTML;
                        if(j == 3 && table_name == "app_table"){
                            /*if(cell.innerHTML === "Shortlisted" || cell.innerHTML === "Reviewed") {
                                cell.style.backgroundColor = "#bfe5fc";
                            } else */if(cell.innerHTML.indexOf("Invited") > -1) {
                                //cell.style.backgroundColor = "#c9f2c9";
                                cell.style.backgroundColor = "#00ea2b";
                            }/* else {
                                cell.style.backgroundColor = "#ef9b9b";
                            }*/
                            //cell.style.backgroundColor = "#E8F5E9";
                        }
                    }
                }
            }
            
            function edit_school_form(){
                //Sets school name upon deletion
                $("#sch-name").html($(this).parent().parent().find("strong").html());
                $("form[name='del-sch'] > input[name='name']").val($(this).parent().parent().find("strong").html());
                //Sets id of the selected school
                $("form[name='del-sch'] > input[name='id']").val($(this).attr("data-id"));
                //Sets form values/
                
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-school", "id" : $(this).attr("data-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            if(data.hasOwnProperty(key)){
                                if(key === "school") $("input[data-name='name']").val(data[key]);
                                else if(key === "location"){
                                    $("input[data-name='sch-loc']").val(data[key]);
                                    $("#sch-loc").dropdown('set selected', data[key]);
                                } 
                                else if(key === "degree") $("input[data-name='degree']").val(data[key]);
                                else if(key === "level")
                                {
                                    $("input[data-name='sch-level']").val(data[key]);
                                    $("#sch-level").dropdown('set selected', data[key]);
                                
                                    
                                    if(data[key] >= 3){
                                        document.getElementById("school-field-edit").style.display = "inline";
                                        $('.ui.form.educ').form('destroy');
                                        $(".ui.form.educ").form({
                                           inline: true,
                                            fields: {
                                                level: {
                                                identifier: 'level',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                name: {
                                                identifier: 'name',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                field: {
                                                identifier: 'field',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                loc: {
                                                identifier: 'location',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                
                                                from: {
                                                identifier: 'from',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  },
                                                  {
                                                      type : "checkYear[sch-from]",
                                                      prompt : 'Year entered must be less than year ended.'
                                                  }  
                                                ]},
                                                to: {
                                                identifier: 'to',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  },
                                                  {
                                                      type : "checkYear[sch-to]",
                                                      prompt : 'Year ended must be greater than year entered.'
                                                  }
                                                ]},
                                                degree: {
                                                identifier: 'degree',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]}
                                            } 
                                        });
                                        
                                    } else {
                                        document.getElementById("school-field-edit").style.display = "none";
                                        $('.ui.form.educ').form('destroy');
                                        $(".ui.form.educ").form({
                                           inline: true,
                                            fields: {
                                                level: {
                                                identifier: 'level',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                name: {
                                                identifier: 'name',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                field: {
                                                identifier: 'field',
                                                rules: [
                                                  {
                                                    type   : 'notRequired[0]',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                                loc: {
                                                identifier: 'location',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]},
                                               
                                                from: {
                                                identifier: 'from',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  },
                                                  {
                                                      type : "checkYear[sch-from]",
                                                      prompt : 'Year entered must be less than year ended.'
                                                  }  
                                                ]},
                                                to: {
                                                identifier: 'to',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  },
                                                  {
                                                      type : "checkYear[sch-to]",
                                                      prompt : 'Year ended must be greater than year entered.'
                                                  }
                                                ]},
                                                degree: {
                                                identifier: 'degree',
                                                rules: [
                                                  {
                                                    type   : 'empty',
                                                    prompt : 'Field required.'
                                                  }    
                                                ]}
                                            } 
                                        });
                                        
                                    }
                                }
                                else if(key === "no") $("input[data-name='no']").val(data[key]);
                                else if(key === "year") {
                                    $("input[data-name='sch-from']").val(data[key].split(" to ")[0]);
                                 //   $("input[data-name='sch-from']").val(data[key]);
                                    $("#sch-from").dropdown('set selected', data[key].split("-")[0]);
                                    
                                    $("input[data-name='sch-to']").val(data[key].split(" to ")[1]);
                                    $("#sch-to").dropdown('set selected', data[key].split("-")[1]);
                                } 
                                else if(key === "field_of_study"){
                                    $("input[data-name='sch-field']").val(data[key]);
                                    $("#sch-field").dropdown('set selected', data[key]);
                                }
                            }
                        }
                    }
                });
                //Show form
                $("div[data-for='edit-school']").modal({
                    onShow : function(){
                        $("#modal-check").val('1');
                    },
                    onHide : function(){
                        $("#modal-check").val('0');
                    }
                    }).modal("show");
                
                document.getElementById("edit-sch-id").value =  $(this).attr("data-id");
            }
            
            function edit_work_form(){
                //Specifies the unique work # upon editing
                $("div[data-for='edit-work'] > div.content > form > input[data-name='no']").val($(this).attr("data-work-id"));
                //Gets work info
                $("#work-name").html($(this).parent().parent().find("strong").html());
                $("form[name='del-work'] > input[name='name_work']").val($(this).parent().parent().find("strong").html());
                //Sets id of the selected school
                $("form[name='del-work'] > input[name='id_work']").val($(this).attr("data-work-id"));
                
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-work", "id" : $(this).attr("data-work-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            if(data.hasOwnProperty(key)){
                                if(key === "company") $("input[data-name='c-name']").val(data[key]);
                                else if(key === "position") {
                                    $("input[data-name='c-pos']").val(data[key]);
                                }
                                else if(key === "from") {
                                    $("input[data-name='c-from']").val(data[key]);
                                }
                                else if(key === "to") {
                                    $("input[data-name='c-to']").val(data[key]);
                                }
                                else if(key === "location"){
                                    $("input[data-name='work-loc']").val(data[key]);
                                    $("#work-loc").dropdown('set selected', data[key]);
                                }
                                else if(key === "year_ended"){ 
                                    $("input[data-name='work-to']").val(data[key]);
                                    $("#work-to").dropdown('set selected', data[key]);
                                }
                                else if(key === "year_entered"){
                                    $("input[data-name='work-from']").val(data[key]);
                                    $("#work-from").dropdown('set selected', data[key]);
                                } else if(key === "industry"){
                                    $("input[data-name='work-ind']").val(data[key]);
                                    $("#work-ind").dropdown('set selected', data[key]);
                                } else if(key === "position"){
                                    $("input[data-name='work-pos']").val(data[key]);
                                    $("#work-pos").dropdown('set selected', data[key]);
                                } else if(key === "field_of_study"){
                                    $("input[data-name='work-field']").val(data[key]);
                                    $("#work-field").dropdown('set selected', data[key]);
                                } 
                                else if(key === "description") $("textarea[data-name='c-des']").val(data[key]);
                                else if(key === "position") $("input[data-name='c-pos']").val(data[key]);
                            }
                        }
                    }
                });
                //Shows edit form
                $("div[data-for='edit-work']").modal({
                    onShow : function(){
                        $("#modal-check").val('1');
                    },
                    onHide : function(){
                        $("#modal-check").val('0');
                    }
                    }).modal("show");
                
                document.getElementById("edit-work-id").value = $(this).attr("data-work-id");
            }
            
            function edit_skill_form(){
                
                var id = $(this).attr("data-skill-id");
                $("div[data-for='edit-skill'] > div.content > form > input[data-name='no']").val($(this).attr("data-skill-id"));
                $("#skill-name").html(document.getElementById("disp_skill_"+id).innerText.substr(0, document.getElementById("disp_skill_"+id).innerText.length-1));
                
                /*
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-skill", "id" : $(this).attr("data-skill-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            alert(key + " : " + data[key]);
                            if(data.hasOwnProperty(key)){
                                //if(key === "skill") $("input[data-name='s-name']").val(data[key]);
                            }
                        }
                    }
                });*/
                //Shows edit form
                $("input[data-name='s-name']").val(document.getElementById("disp_skill_"+id).innerText.substr(0, document.getElementById("disp_skill_"+id).innerText.length-1));
                $("form[name='del-skill'] > input[name='name_skill']").val(document.getElementById("disp_skill_"+id).innerText);
                //Sets id of the selected school
                $("form[name='del-skill'] > input[name='id_skill']").val(id);
                
                document.getElementById("currentValue_edit").innerHTML = document.getElementById("disp_percent_"+id).value+"%";
                document.getElementById("skill_rate_edit").value = document.getElementById("disp_percent_"+id).value;
                
                $("div[data-for='edit-skill']").modal("show"); 
                
                /*var id = $(this).attr("data-skill-id");
                $("#skill-name").html(document.getElementById("disp_skill_"+id).innerText);
                $("form[name='del-skill'] > input[name='name_skill']").val(document.getElementById("disp_skill_"+id).innerText);
                //Sets id of the selected school
                $("form[name='del-skill'] > input[name='id_skill']").val(id);
                
                $(".ui.modal.skill_edit").modal("show");
                /*
                document.getElementById("currentValue").innerHTML = "0%";
                    document.getElementById("skill_rate").value = 0;
                    document.getElementById("sel_skill").innerText = skill.toUpperCase();
                */
                /*document.getElementById("currentValue_edit").innerHTML = document.getElementById("disp_percent_"+id).value+"%";
                document.getElementById("skill_rate_edit").value = document.getElementById("disp_percent_"+id).value;
                document.getElementById("sel_skill_edit").innerText = document.getElementById("disp_skill_"+id).innerText;
                
                $("#confirm_skill_edit").on("click", function(){
                    var percent = document.getElementById("skill_rate_edit").value;
                    document.getElementById("skill_percent_edit").value = percent;
                    document.getElementById("skill_id").value = id;
                    document.getElementById("update-skill").submit();
                });*/
                
            }
            
            // Romeo start
            function edit_mem_form(){
                $("div[data-for='edit-membership'] > div.content > form > input[data-name='no']").val($(this).attr("data-mem-id"));
                
                $("#mem-name").html($(this).parent().parent().find("strong").html());
                $("form[name='del-mem'] > input[name='name']").val($(this).parent().parent().find("strong").html());
                //Sets id of the selected school
                $("form[name='del-mem'] > input[name='id']").val($(this).attr("data-mem-id"));
                
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-membership", "id" : $(this).attr("data-mem-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            if(data.hasOwnProperty(key)){
                                //alert(key + " : " + data[key]);
                                //if(key === "skill") $("input[data-name='s-name']").val(data[key]);
                                if(key === "assoc") $("input[data-name='mem_assoc']").val(data[key]);
                                else if(key === "description") $("textarea[data-name='mem_des']").val(data[key]);
                                else if(key === "date_entered"){
                                    $("input[data-name='mem-from']").val(data[key]);
                                    $("#mem-from").dropdown('set selected', data[key]);
                                }
                                else if(key === "date_ended"){
                                    $("input[data-name='mem-to']").val(data[key]);
                                    $("#mem-to").dropdown('set selected', data[key]);
                                }
                            }
                        }
                    }
                });
                //Shows edit form
                $("div[data-for='edit-membership']").modal({
                    onShow : function(){
                        $("#modal-check").val('1');
                    },
                    onHide : function(){
                        $("#modal-check").val('0');
                    }
                    }).modal("show");   
            }
            
            
            function edit_ach_form(){
                $("div[data-for='edit-achievement'] > div.content > form > input[data-name='no']").val($(this).attr("data-ach-id"));
                
                $("#ach-name").html($(this).parent().parent().find("strong").html());
                $("form[name='del-ach'] > input[name='name']").val($(this).parent().parent().find("strong").html());
                //Sets id of the selected school
                $("form[name='del-ach'] > input[name='id']").val($(this).attr("data-ach-id"));
                
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-achievement", "id" : $(this).attr("data-ach-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            if(data.hasOwnProperty(key)){
                                //if(key === "skill") $("input[data-name='s-name']").val(data[key]);
                                if(key === "year"){
                                    $("input[data-name='ach-year']").val(data[key]);
                                    $("#ach-year").dropdown('set selected', data[key]);
                                }
                                else if(key === "description") $("textarea[data-name='ach_des']").val(data[key]);
                                else if(key === "title")$("input[data-name='ach_title']").val(data[key]);
                            }
                        }
                    }
                });
                //Shows edit form
                $("div[data-for='edit-achievement']").modal("show");   
            }
            
            function edit_link_form(){
                $("div[data-for='edit-link'] > div.content > form > input[data-name='no']").val($(this).attr("data-link-id"));
                
                $("#link-url").html($(this).parent().parent().find("strong").html());
                //alert($(this).html());
                //$("form[name='del-link'] > input[name='name']").val($(this).parent().parent().find("strong").html());
                //Sets id of the selected school
                $("form[name='del-link'] > input[name='id']").val($(this).attr("data-link-id"));
                
                $.ajax({
                    type: "post",
                    url: "db.php",
                    data: {"request" : "get-link", "id" : $(this).attr("data-link-id")},
                    dataType: "json"
                }).done(function(data){
                    if(data){
                        for(var key in data){
                            if(data.hasOwnProperty(key)){
                                //if(key === "skill") $("input[data-name='s-name']").val(data[key]);
                                if(key === "website"){
                                     $("input[data-name='link_web']").val(data[key]);
                                     $("#link_web").dropdown('set selected', data[key]);
                                }
                                else if(key === "link") $("input[data-name='link_url']").val(data[key]);
                            }
                        }
                    }
                });
                //Shows edit form
                $("div[data-for='edit-link']").modal("show");   
            }
            
            function myFunction() {
                
                // Declare variables
                var input, filter, ul, li, a, i;
                input = document.getElementById('myInput');
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName('li');

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < li.length; i++) {
                     a = li[i].getElementsByTagName("a")[0];
                     if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                         li[i].style.display = "";
                     }
                     
                     else {
                         li[i].style.display = "none";
                     }
                }
            }
            
            function openWin1() {
                window.open("Resumes/Classic%202/index.php");
            }
            
            function openWin2() {
                window.open("Resumes/Creative2/creative.php");
            }
            
            function openWin3() {
                window.open("Resumes/Executive/index.php");
            }
            
             function check_hash() {
                //Checks for hash/es in the url.
                var url = window.location.hash.slice(1);
                if(url) {
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
            
            function display_creative_pic(image){
                document.getElementById("display_pic_creative").src = image;
                $("div[data-for='view_pic']").modal("hide");
                $("div[data-for='view_pic']").modal("show");
            }
            
            function display_creative_video(video){
                document.getElementById("display_video_creative").src = video;
                $("div[data-for='view_vid']").modal("hide");
                $("div[data-for='view_vid']").modal("show");
            }
            
            function delete_display_creative(content){
                document.getElementById("delete_msg").innerText = "Do you want to delete this "+content+"?";
                $(".ui.modal.delete").modal("show");
                $("#confirm_delete").on("click", function(){
                    var src = document.getElementById("display_"+content+"_creative").getAttribute("src");
                    $.ajax({
                        type: "post",    
                        url: "db.php",
                        data: {request: "delete-"+content+"-creative", src: src}
                    }).done(function(data) {
                        window.location.reload();
                        window.location.href = "dashboard.php#profile";
                    });
                });
            }
            
            $(document).ready(function(){
                
                //7/25/17 change    /
             $('button#apply').on("click", function(){
             $('.ui.modal.apply').modal('show')
            });
                //7/25/17 change end
                
                $("#reset").on("click", function(){
                     window.location.href = "index.php";
                });
                
                $("#resetModal").on("click", function(){
                    window.location.href = "index.php?reset=1";
                });
                
                $(".ui.dropdown").dropdown();
                check_hash();
                $("a[data-tab]").on("click", function(){
                    change_tab(this);
                });
                
                
                $("#sch-level-add").dropdown({
                    onChange : function(val){
                        if(val >= 3){
                            document.getElementById("school-field").style.display = "inline";
                            $('.ui.form.educ').form('destroy');
                            $(".ui.form.educ").form({
                                fields: {
                                    level: {
                                    identifier: 'level',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    name: {
                                    identifier: 'name',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    field: {
                                    identifier: 'field',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    loc: {
                                    identifier: 'location',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    
                                    from: {
                                    identifier: 'from',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-from]",
                                          prompt : 'Year entered must be less than year ended.'
                                      }  
                                    ]},
                                    to: {
                                    identifier: 'to',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-to]",
                                          prompt : 'Year ended must be greater than year entered.'
                                      }
                                    ]},
                                    degree: {
                                    identifier: 'degree',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]}
                                } 
                            });
            
                        } else {
                            document.getElementById("school-field").style.display = "none";
                            $('.ui.form.educ').form('destroy');
                            $(".ui.form.educ").form({
                                fields: {
                                    level: {
                                    identifier: 'level',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    name: {
                                    identifier: 'name',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    field: {
                                    identifier: 'field',
                                    rules: [
                                      {
                                        type   : 'notRequired[0]',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    loc: {
                                    identifier: 'location',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    
                                    from: {
                                    identifier: 'from',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-from]",
                                          prompt : 'Year entered must be less than year ended.'
                                      }  
                                    ]},
                                    to: {
                                    identifier: 'to',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-to]",
                                          prompt : 'Year ended must be greater than year entered.'
                                      }
                                    ]},
                                    degree: {
                                    identifier: 'degree',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]}
                                } 
                            });
                        }
                    }
                });
                
                $("#sch-level").dropdown({
                    onChange : function(val){
                        if(val >= 3){
                            document.getElementById("school-field-edit").style.display = "inline";
                            $('.ui.form.educ').form('destroy');
                            $(".ui.form.educ").form({
                                fields: {
                                    level: {
                                    identifier: 'school[level]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    name: {
                                    identifier: 'school[name]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    field: {
                                    identifier: 'school[field]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    loc: {
                                    identifier: 'school[location]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                   
                                    from: {
                                    identifier: 'school[from]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-from]",
                                          prompt : 'Year entered must be less than year ended.'
                                      }  
                                    ]},
                                    to: {
                                    identifier: 'school[to]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-to]",
                                          prompt : 'Year ended must be greater than year entered.'
                                      }
                                    ]},
                                    degree: {
                                    identifier: 'school[degree]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]}
                                } 
                            });
                            
                        } else {
                            document.getElementById("school-field-edit").style.display = "none";
                            $('.ui.form.educ').form('destroy');
                            $(".ui.form.educ").form({
                                fields: {
                                    level: {
                                    identifier: 'school[level]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    name: {
                                    identifier: 'school[name]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    field: {
                                    identifier: 'school[field]',
                                    rules: [
                                      {
                                        type   : 'notRequired[0]',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    loc: {
                                    identifier: 'school[location]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]},
                                    
                                    from: {
                                    identifier: 'school[from]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-from]",
                                          prompt : 'Year entered must be less than year ended.'
                                      }  
                                    ]},
                                    to: {
                                    identifier: 'school[to]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      },
                                      {
                                          type : "checkYear[sch-to]",
                                          prompt : 'Year ended must be greater than year entered.'
                                      }
                                    ]},
                                    degree: {
                                    identifier: 'school[degree]',
                                    rules: [
                                      {
                                        type   : 'empty',
                                        prompt : 'Field required.'
                                      }    
                                    ]}
                                } 
                            });
            
                        }
                    }
                });
                
                //$(".menu-nav .item").on("click", function(){window.location.href=$(this).attr("data-link");});
                $("#logout").on("click", function(){window.location.href=$(this).attr("data-link");});
                $(".modal").modal({allowMultiple: true});
                $("[data-type='modal']").on("click", function(){
                    if($(this).attr("data-for") === "edit-info"){
                        $("input[data-name='user-loc']").val($("#user-loc-holder").val());
                        $("#user-loc").dropdown('set selected', $("#user-loc-holder").val());
                        $("input[data-name='user-educ']").val($("#user-educ-holder").val());
                        $("#user-educ").dropdown('set selected', $("#user-educ-holder").val());
                        $("input[data-name='user-pos']").val($("#user-pos-holder").val());
                        $("#user-pos").dropdown('set selected', $("#user-pos-holder").val());
                    }
                    $("div[data-for='"+$(this).attr("data-for")+"']").modal({
                        onShow : function(){
                            $("#modal-check").val('2');
                        },
                        onHide : function(){
                            $("#modal-check").val('0');
                        }
                        }).modal("show");
                });
                //$("[data-submit]").on("click", function(){$("form[data-for='"+$(this).attr("data-submit")+"']").submit();});
                $("[data-submit]").on("click", function(){ $("input[id='"+$(this).attr("data-submit")+"']").click(); });
                $('.message .close').on('click', function(){$(this).closest('.message').transition('fade');});
                $("i[data-id]").on("click", edit_school_form);
                $("i[data-work-id]").on("click", edit_work_form);
                $("i[data-skill-id]").on("click", edit_skill_form);
                $("i[data-mem-id]").on("click", edit_mem_form);
                $("i[data-ach-id]").on("click", edit_ach_form);
                $("i[data-link-id]").on("click", edit_link_form);
                
                $("#advance").on("click", function(){
                    $('.ui.modal.advance').modal('show')
                    //window.location.href=$(this).attr("data-link");
                
                });
                $("#cancel_edit_sch").on("click", function(){ $("div[data-for='edit-school']").modal("hide"); });
                $("#cancel_edit_work").on("click", function(){ $("div[data-for='edit-work']").modal("hide"); });
                $("#cancel_edit_skill").on("click", function(){ $("div[data-for='edit-skill']").modal("hide"); });
                $("#cancel_edit_mem").on("click", function(){ $("div[data-for='edit-membership']").modal("hide"); });
                $("#cancel_edit_ach").on("click", function(){ $("div[data-for='edit-achievement']").modal("hide"); });
                $("#cancel_edit_info").on("click", function(){ $("div[data-for='edit-info']").modal("hide"); });
                $("#cancel_edit_pass").on("click", function(){ $("div[data-for='change-pass']").modal("hide"); });

                
                $("#cancel_add_sch").on("click", function(){ $("div[data-for='add-school']").modal("hide"); });
                $("#cancel_add_work").on("click", function(){ $("div[data-for='add-work']").modal("hide"); });
                $("#cancel_add_skill").on("click", function(){ $("div[data-for='add-skill']").modal("hide"); });
                $("#cancel_add_diff_skill").on("click", function(){ $("div[data-for='add-diff-skill']").modal("hide"); });
                $("#cancel_add_mem").on("click", function(){ $("div[data-for='add-membership']").modal("hide"); });
                $("#cancel_add_ach").on("click", function(){ $("div[data-for='add-achievement']").modal("hide"); });
                
                $("#add-diff-skill").on("click", function(){
                    $("div[data-for='add-skill']").modal("hide");
                    $("#new_skill").val("");
                    $("#new_rate").val("0");
                    $("#currentValue_add").text("0%");
                    $("div[data-for='add-diff-skill']").modal("show");
                });
                
                $("#modal-del").on("click", function(){ $("div[data-for='del-sch']").modal("show"); });
                $("#modal-del-work").on("click", function(){ $("div[data-for='del-work']").modal("show"); });
                $("#modal-del-skill").on("click", function(){
                    $(".ui.modal.skill_edit").modal("hide");
                    $("div[data-for='del-skill']").modal("show");
                });
                $("#delete-mem").on("click", function(){$("div[data-for='del-mem']").modal("show");});
                $("#delete-ach").on("click", function(){$("div[data-for='del-ach']").modal("show");});
                $("#delete-link").on("click", function(){$("div[data-for='del-link']").modal("show");});
                
                $("#del-sch").on("click", function(){$("form[name='del-sch']").submit();});
                $("#del-work").on("click", function(){$("form[name='del-work']").submit();});
                $("#del-skill").on("click", function(){$("form[name='del-skill']").submit();});
                $("#del-mem").on("click", function(){$("form[name='del-mem']").submit();});
                $("#del-ach").on("click", function(){$("form[name='del-ach']").submit();});
                $("#del-link").on("click", function(){$("form[name='del-link']").submit();});
                $("#check-about-me").on("click", function(){ $("#submit-about-me").click(); });
                
                $("#edit_pic").on("click", function(){$("#up_pic").click();});
                $("#up_pic").on("change", function(){
                    $("#upload_prof_pic").submit();
                })
                $("#delete_pic").on("click", function(){
                    $(".ui.modal.delete").modal("show");
                    
                    $("#confirm_delete").on("click", function(){
                        var src = document.getElementById("display_pic").getAttribute("src");
                        $.ajax({
                            type: "post",    
                            url: "db.php",
                            data: {request: "delete-pic", src: src}
                        }).done(function(data) {
                            window.location.href = "index.php#profile";
                            window.location.reload();
                        });
                    });
                });
                $(".op").on("click", function(){
                    /*var skill = $(this).text();
                    $("div[data-for='add-skill']").modal("hide");
                    document.getElementById("currentValue").innerHTML = "0%";
                    document.getElementById("skill_rate").value = 0;
                    document.getElementById("sel_skill").innerText = skill.toUpperCase();
                    $(".ui.modal.skill").modal("show");
                    
                    $("#confirm_skill").on("click", function(){
                        document.getElementById("myInput").value = skill;
                        var rate = document.getElementById("currentValue").innerHTML;
                        rate = rate.substr(0, rate.length-1);
                        document.getElementById("skill_percent").value = rate;
                        document.getElementById("add-skill").submit();
                    });*/
                    $("div[data-for='add-skill']").modal("hide");
                    $("#new_skill").val($(this).text());
                    $("#new_rate").val("0");
                    $("#currentValue_add").text("0%");
                    $("div[data-for='add-diff-skill']").modal("show");
                });
                
                $("#confirm_interview").on("click", function(){
                    var id = $(this).val();
                    $(".ui.modal.confirm_interview").modal("show");
                    $("#confirm_inv_interview").on("click", function(){
                        document.getElementById("resked_id").value = id;
                        document.getElementById("resked_status").value = "6";
                        document.getElementById("resked_form").submit();
                    });
                });
                
                $("#decline_interview").on("click", function(){
                    var id = $(this).val();
                    $(".ui.modal.decline_interview").modal("show");
                
                    $("#withdraw_app").on("click", function(){
                        $(".ui.modal.decline_interview").modal("hide");
                        $(".ui.modal.decline_interview_confirm").modal("show");
                        
                        $("#confirm_withdraw").on("click", function(){
                            document.getElementById("resked_id").value = id;
                            document.getElementById("resked_status").value = "8";
                            document.getElementById("resked_form").submit();
                        });
                    });
                    
                    $("#resked_interview").on("click", function(){
                        var today = new Date();
                        var dd = today.getDate()+1;
                        var mm = today.getMonth()+1; //January is 0!
                        var yyyy = today.getFullYear();
                         if(dd<10){
                                dd='0'+dd
                            } 
                            if(mm<10){
                                mm='0'+mm
                            }
                        var hh = today.getHours();

                        today = yyyy+'-'+mm+'-'+dd+'T08:00:00';
                        document.getElementById("resked_datetime").setAttribute("min", today);
                        
                        $(".ui.modal.decline_interview").modal("hide");
                        $(".ui.modal.resked_interview").modal("show");
                        
                        $("#confirm_resked").on("click", function(){
                            document.getElementById("resked_id").value = id;
                        });
                    });
                    
                });
                
                $("#profile").on("click", function(){
                    window.location.href = "index.php#profile";
                    $("a[data-tab='2']").click();
                });
                
                $("#display_pic").on("mouseover", function(){
                    document.getElementById("edit_pic").style.opacity = "1";
                    document.getElementById("delete_pic").style.opacity = "1";
                    document.getElementById("display_pic").style.opacity = "0.5";
                });
                
                $("#display_pic").on("mouseout", function(){
                    document.getElementById("edit_pic").style.opacity = "0";
                    document.getElementById("delete_pic").style.opacity = "0";
                    document.getElementById("display_pic").style.opacity = "1";
                });
                
                $("#delete_pic").on("mouseover", function(){
                    document.getElementById("display_pic").style.opacity = "0.5";
                    document.getElementById("edit_pic").style.opacity = "1";
                    document.getElementById("delete_pic").style.opacity = "1";
                });
                
                $("#delete_pic").on("mouseout", function(){
                    document.getElementById("display_pic").style.opacity = "1";
                    document.getElementById("edit_pic").style.opacity = "0";
                    document.getElementById("delete_pic").style.opacity = "0";
                });
                
                $("#edit_pic").on("mouseover", function(){
                    document.getElementById("display_pic").style.opacity = "0.5";
                    document.getElementById("edit_pic").style.opacity = "1";
                    document.getElementById("delete_pic").style.opacity = "1";
                });
                
                $("#edit_pic").on("mouseout", function(){
                    document.getElementById("display_pic").style.opacity = "1";
                    document.getElementById("edit_pic").style.opacity = "0";
                    document.getElementById("delete_pic").style.opacity = "0";
                });
                
                $(".write.q.icon").on("click", function(){
                    //$("resume-edit").modal("show");
                    $("div[data-for='edit-resume']").modal("show");
                    $("input[data-name='resume_num']").val(this.title.substring(12));
                    $("input[data-name='resume_name']").val(document.getElementById("resume_"+this.title.substring(12)).innerText);
                    if(this.title.substring(12) === "1" && document.getElementById("public_url").value.toUpperCase().indexOf("CLASSIC") > -1){
                        document.getElementById("default").checked = true;
                    } else if(this.title.substring(12) === "2" && document.getElementById("public_url").value.toUpperCase().indexOf("CREATIVE") > -1){
                        document.getElementById("default").checked = true;
                    } else if(this.title.substring(12) === "3" && document.getElementById("public_url").value.toUpperCase().indexOf("EXECUTIVE") > -1){
                        document.getElementById("default").checked = true;;
                    } else {
                        document.getElementById("default").checked = false;
                    }
                    //document.getElementById("resume_num").value = this.title.substring(12);
                    //document.getElementById("resume_name").value = document.getElementById("resume_"+this.title.substring(12)).innerText;
                });
                
                $(".camera.icon").on("click", function(){
                    $("div[data-for='view_pic']").modal("show");
                    $("#confirm_creative").on("click", function(){
                        $("div[data-for='view_pic']").modal("hide");
                        $("div[data-for='upload_pic']").modal("show");
                        
                        $("#upload_creative").on("click", function(){
                           $("#confirm_upload_creative").click(); 
                        });
                    });
                });
                
                $(".record.icon").on("click", function(){
                    $("div[data-for='view_vid']").modal("show");
                    $("#confirm_creative_vid").on("click", function(){
                        $("div[data-for='view_vid']").modal("hide");
                        $("div[data-for='add_vid']").modal("show");
                        
                        $("#upload_creative_vid").on("click", function(){
                           $("#confirm_upload_creative_vid").click(); 
                        });
                    });
                });
                
                //$("#select-web").dropdown('set selected', 'facebook');
                
            });
            
            $.fn.form.settings.rules.notRequired = function (inputValue, validationValue) {
                return true;
            }
            
            $.fn.form.settings.rules.checkYear = function (inputValue, validationValue) {
                var modal = "";
                
                if($("#modal-check").val() == '2'){
                    modal += "-add";
                }
            
                if(validationValue.substring(validationValue.indexOf("-")+1) == "to"){
                    return $("#"+validationValue+modal).dropdown('get value') >= $("#"+validationValue.substring(0, validationValue.indexOf("-")+1)+"from"+modal).dropdown('get value');
                } else {
                    return $("#"+validationValue+modal).dropdown('get value') <= $("#"+validationValue.substring(0, validationValue.indexOf("-")+1)+"to"+modal).dropdown('get value');
                }
            }
            
            $(".ui.form.educ").form({
                fields: {
                    level: {
                    identifier: 'level',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    name: {
                    identifier: 'name',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    field: {
                    identifier: 'field',
                    rules: [
                      {
                        type   : 'notRequired[0]',
                        prompt : 'Field required.'
                      }    
                    ]},
                    loc: {
                    identifier: 'location',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    
                    from: {
                    identifier: 'from',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[sch-from]",
                          prompt : 'Year entered must be less than year ended.'
                      }  
                    ]},
                    to: {
                    identifier: 'to',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[sch-to]",
                          prompt : 'Year ended must be greater than year entered.'
                      }
                    ]},
                    degree: {
                    identifier: 'degree',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $(".ui.form.work").form({
                fields: {
                    name: {
                    identifier: 'work[name]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    pos: {
                    identifier: 'work[pos]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    ind: {
                    identifier: 'work[industry]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    field: {
                    identifier: 'work[field]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    loc: {
                    identifier: 'work[location]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                   
                    from: {
                    identifier: 'work[from]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[work-from]",
                          prompt : 'Year entered must be less than year ended.'
                      } 
                    ]},
                    to: {
                    identifier: 'work[to]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[work-to]",
                          prompt : 'Year ended must be greater than year entered.'
                      }
                    ]},
                    des: {
                    identifier: 'work[des]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            
            $(".ui.form.ach").form({
                fields: {
                    title: {
                    identifier: 'achievement[title]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    year: {
                    identifier: 'achievement[year]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    des: {
                    identifier: 'achievement[des]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $(".ui.form.mem").form({
                fields: {
                    assoc: {
                    identifier: 'membership[assoc]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    from: {
                    identifier: 'membership[from]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[mem-from]",
                          prompt : 'Year entered must be less than year ended.'
                      }
                    ]},
                    to: {
                    identifier: 'membership[to]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                          type : "checkYear[mem-to]",
                          prompt : 'Year ended must be greater than year entered.'
                      }
                    ]},
                    des: {
                    identifier: 'membership[des]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $(".ui.form.link").form({
                fields: {
                    url: {
                    identifier: 'link[url]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    web: {
                    identifier: 'link[web]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $(".ui.form.abt").form({
                fields: {
                    url: {
                    identifier: 'abt[url]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    intro: {
                    identifier: 'abt[intro]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $.fn.form.settings.rules.checkLength = function (inputValue, validationValue) {
                return inputValue.length == validationValue;
            }
            
            $(".ui.form.user").form({
                fields: {
                    fname: {
                    identifier: 'user[f_name]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]},
                    lname: {
                    identifier: 'user[l_name]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    loc: {
                    identifier: 'user[location]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]},
                    mob: {
                    identifier: 'user[mob]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                        type : 'checkLength[10]',
                        prompt : 'Enter a valid mobile number.'
                      },
                      {
                        type   : 'regExp[/^[0-9]{10}$/]',
                        prompt : 'Enter a valid mobile number.'
                      } 
                    ]},
                    tel: {
                    identifier: 'user[tel]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                        type : 'checkLength[7]',
                        prompt : 'Enter a valid telephone number.'
                      },
                      {
                        type   : 'regExp[/^[0-9]{7}$/]',
                        prompt : 'Enter a valid telephone number.'
                      } 
                    ]},
                    email: {
                    identifier: 'user[email]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                        type   : 'regExp[/^[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}$/]',
                        prompt : 'Please enter a valid email.'
                      }    
                    ]},
                    pos: {
                    identifier: 'user[latest_pos]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }    
                    ]}
                } 
            });
            
            $(".ui.form.resume").form({
                fields: {
                    name: {
                    identifier: 'resume[name]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]}
                }
            });
            
            $(".ui.form.pic").form({
                fields: {
                    file: {
                    identifier: 'file_to_upload',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]},
                    des: {
                    identifier: 'description',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]}
                }
            });
            
            $(".ui.form.vid").form({
                fields: {
                    file: {
                    identifier: 'filename',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]},
                    des: {
                    identifier: 'description',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]}
                }
            });
            
            $(".ui.form.pw").form({
                fields: {
                    old: {
                    identifier: 'user[old_pass]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]},
                    new_p: {
                    identifier: 'user[new_pass]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      }
                    ]},
                    confirm: {
                    identifier: 'user[confirm_pass]',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Field required.'
                      },
                      {
                        type   : 'match[user[new_pass]]',
                        prompt : 'Field required.'
                      }
                    ]}
                }
            });
            
        </script>
    </body>