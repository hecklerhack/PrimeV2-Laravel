@section('content')
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
@endsection