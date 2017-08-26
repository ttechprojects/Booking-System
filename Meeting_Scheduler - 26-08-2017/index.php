<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='css/fullcalendar.min.css' rel='stylesheet' /> <!-- loading the css part of the calendar. -->
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' /><!-- css part when the calendar needs to be printed. -->
    <?php echo "<script src='js/moment.min.js'></script>";
echo "<script src='js/jquery.min.js'></script>"; //allows the use of jquery codes in the file.
echo "<script src='js/fullcalendar.min.js'></script>"; //load the interactive js for the fullcalendar.
echo "<script> // echo the jquery codes for it to work in a php file. 
               //client side script is not understood by server the side script.

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: new Date(),
			editable: false, // allows resizing and dragging of the events in the interactive calendar.
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow 'more' link when too many events
			events: {
				url: 'php/get-events.php', //get the events stored in the json file and displays on the interactive calendar.
				error: function() { 
					$('#script-warning').show(); //error if the server is not working.
				}
			},
            loading: function(bool) {
				$('#loading').toggle(bool); //loading of the interactive calendar.
			},
			
			eventClick: function(event,jsEvent,view) {
                if(event.title) {
                    //$('#view-meeting').toggle(); //show the display for 'edit a meeting' sidebar.
                    
                    var link = 'http://localhost/Meeting_Scheduler/index.php?m_name=' + event.title; //the link that is to be called again.
                    // delete the above link and use a local variable to pass the variable m_name. easier and quicker solution.
                    window.location.href = link; 
                    // for the edit part, store the link in a variable in jquery and call it in php so there is no need to load a page again!
                    $('#add-meeting').toggle(); //hide the display for the 'add a booking' side-bar

                    return false;
       }
		
		},
                eventColor:'rgba(200,0,0)' //change the color for the events on the calendar!
        });
		
	});

</script>"; ?>
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- basic css offered by bootstrap used in many places. -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet"><!-- styling part for the forms available on the side bar of the home page. -->
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet"><!-- styling of the hompage. -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <?php echo    '<script src="js/ie-emulation-modes-warning.js"></script>';
echo	'<script type="text/javascript">
	 $(document).ready(function(){ // checks if the html page is ready.
         $(".form-submit-booking").click(function(){
            alert("Booking Successful!");
            //(this).load("php/updatebooking.php");
            
         });
         $(".button3").click(function(){
            
         });
         $(".button1").click(function(){
            //$("#edit-delete").toggle();
            //$("#view-meeting").toggle();
              $(".editable").prop("readonly",false);
             $(".edit-submit").toggle();
        });
            
        $("#meeting").click(function(){
            $("#meeting-form").slideToggle();
			$("#cm-form").slideUp();
			$("#ticker-form").slideUp();
        });
        $("#cm").click(function(){
            $("#cm-form").slideToggle();
			$("#meeting-form").slideUp();
			$("#ticker-form").slideUp();
        });
        $("#ticker").click(function(){
            $("#ticker-form").slideToggle();
			$("#meeting-form").slideUp();
			$("#cm-form").slideUp();
        });
		$(".select-all").click(function(){
			if($(".select-all").prop("checked")==true){
				$(".check-box").prop("checked", true);
			}
			else{
				$(".check-box").prop("checked", false);
			}
		});
        
    
    });
	</script>'; ?>
    <style>
        body {
            margin-top: 0;
            padding-left: 0;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
            font-size: 14px;
        }
        
        #script-warning {
            display: none;
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            color: red;
        }
        
        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        
        #calendar {
            float: right;
            max-width: 60%;
            margin: 0px 50px 10px 0px;
            padding: 0 10px;
        }
        
        .button1 {
            background-color: rgba(200, 0, 0, 0.8);
            border: none;
            border-radius: 7px;
            color: #f6f6f6;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px 15px 2px;
            cursor: pointer;
            margin-left: 115px;
        }
        
        .button2 {
            background-color: rgba(200, 0, 0, 0.8);
            border: none;
            border-radius: 7px;
            color: #f6f6f6;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="position:fixed;">
        <!--Navigation bar at the top-->
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Emirates Booking System</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
                <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="add-meeting">
        <div class="row">
            <div class="col-sm-3 col-md-4 sidebar">
                <ul class="nav nav-sidebar">
                    <li id="meeting" class="active"><a href="#">Add a Meeting <!--<span class="sr-only">(current)</span>--></a></li>
                    <li>
                        <div id="meeting-form" style="display:none; position:relative;">
                            <form class="m-form" method="post" action="php/updatebooking.php">
                                <div class="text-form">Meeting Name<input class="text-field" type="text" name="m_name" required><br></div>
                                <div class="text-form">Booked By<input class="text-field" type="text" name="s_name" required><br></div>
                                <div class="text-form">Staff Number<input class="text-field" type="text" name="s_id" required><br></div>
                                <div class="text-form date-form">Date<input class="text-field" type="date" name="date" required><br></div>
                                <div class="text-form">Start Time<input class="text-field" type="time" name="s_time" required><br></div>
                                <div class="text-form">End Time<input class="text-field" type="time" name="e_time" required><br></div>
                                <div class="text-form">No.of Attendees<input class="text-field" type="text" name="guests" required><br></div>
                                <div class="text-form">Room Number
                                       
                                    <?php
                                    
                                        $conn = mysqli_connect('localhost', 'root', '', 'ekbooking') 
                                                or die ('Cannot connect to db');
                                    
                                        $result = $conn->query("select r_no from booking");                                            
                                            echo "<select name='id' class='text-field' type='text' name='r_no'>";

                                                while ($row = $result->fetch_assoc()) {
                                                    unset($no);
                                                    $no = $row['r_no']; 
                                                    echo '<option value="">'.$no.'</option>';
                 
                                                }

                                            echo "</select>";
                                        ?>
                                    <br></div>
                                <!--Recurrence Time&nbsp;
				Daily<input type="radio" name="rec_time" value="Daily" checked>
				Weekly<input type="radio" name="rec_time" value="weekly">
				Monthly<input type="radio" name="rec_time" value="monthly"> 
				Other<input type="radio" name="rec_time" value="other"><br>-->
                                <div class="text-form">Contact Number<input class="text-field" type="number" name="contact" required><br></div>
                                <div class="text-form">E-Mail<input class="text-field" type="email" name="email" required></div>
                                <br>
                                <div class="form-sub"><button class="form-submit form-submit-booking" type="submit" />Submit</div>
                            </form>
                        </div>


                    </li>
                    <li class="active" id="cm"><a href="#">Content Management</a></li>
                    <li>
                        <div id="cm-form" style="display:none; position:relative; height: 400px;">
                            <form class="cm-form" action="FS1" method="get">
                                <div class="text-form">Upload Image/Video<input class="file-path text-field" type="file" name="file_path" accept="media_type" required><br></div>
                                <div class="text-form">Screen Number<br>
                                    <div class="c-box"><input class="check-box" type="checkbox" name="Ad-Board-1" value="1">Screen - 1 &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input class="check-box" type="checkbox" name="Ad-Board-2" value="2">Screen - 2</div>
                                    <div class="c-box"><input class="check-box" type="checkbox" name="Ad-Board-3" value="3">Screen - 3 &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input class="check-box" type="checkbox" name="Ad-Board-4" value="4">Screen - 4</div>

                                    <div class="c-box"><input class="check-box" type="checkbox" name="Ad-Board-5" value="5">Screen - 5 &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input class="check-box" type="checkbox" name="Ad-Board-6" value="6">Screen - 6</div>

                                    <div class="c-box"><input class="check-box" type="checkbox" name="Ad-Board-7" value="7">Screen - 7 &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input class="check-box" type="checkbox" name="Ad-Board-8" value="8">Screen - 8</div>
                                    <div class="s-all"><input class="select-all" type="checkbox" name="Ad-all">Select All</div>
                                </div>
                                <div class="text-form date-form">Date<input class="text-field" type="date" name="ad_date" required><br></div>
                                <div class="text-form">Start Time<input class="text-field" type="time" name="start_time_ad" required><br></div>
                                <div class="text-form">Duration
                                    <select required name="duration" class="text-field">
                                    <br>
							
								
										<option value="5">5 mins</option>
										<option value="10">10 mins</option>
										<option value="30">30 mins</option>
										<option value="60">1 hr</option>
										<option value="120">2 hr</option>
										<option value="300">5 hr</option>
										<option value="1440">Entire Day</option>
										
								</select></div>
                                <br>
                                <div class="form-sub"><button class="form-submit" type="submit" />Submit</div>


                            </form>
                        </div>
                    </li>
                    <li class="active" id="ticker"><a href="#">Message Alerts</a></li>
                    <div id="ticker-form" style="display:none; position:relative;">
                        <form class="ticker-form" action="FS1" method="get">
                            <div class="text-form"><b>Message</b><textarea input class="text-area" rows="3" cols="30" name="ticker" required></textarea><br><br><br><br>
                                <div class="text-form" style="margin-left: -10px;"><b>Duration</b>
                                    <select required name="duration" class="text-field"><br>
							
										<option value="5">5 mins</option>
										<option value="10">10 mins</option>
										<option value="30">30 mins</option>
										<option value="60">1 hr</option>
										<option value="120">2 hr</option>
										<option value="300">5 hr</option>
										<option value="1440">Entire Day</option>
										
								</select>
                                </div>
                                <br>
                                <div class="form-sub"><button class="form-submit" type="submit" />Submit</div>
                            </div>
                        </form>
                    </div>
                    <!--<li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>-->
                </ul>

            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">




            </div>
        </div>
    </div>



    <div class="container-fluid" id="view-meeting" style="display:none;">



        <div class="row">
            <div class="col-sm-3 col-md-4 sidebar " style="background-color:lightgray;">
                <ul class="nav nav-sidebar">
                    <li class="active" style="margin-top:-21px; margin-bottom: -50px;"><a href="index.php" class="button4">Back</a></li>
                    <div style="background-color: #f6f6f6;border-left:none;border-top:none;border-right:inset;border-bottom:inset;border-color:rgba(200,0,0,0.8); 
		border-top-right-radius:15px;border-bottom-right-radius:15px; box-shadow:2px 2px 0px 0px lightgray inset;  padding-top:50px;margin-top:50px;">
                        <div id="edit-form" style="position:relative;">
                           <form class="e-form" method="request" action= "php/editbooking.php?m_name=<?php echo $row['m_name']; ?>" style="min-height:400px">

                                <?php
                                    
                                    //include 'php/disbookmname.php?';
                                
                                
                                $con=mysqli_connect("localhost","root","","ekbooking");

                                if (mysqli_connect_errno())
                                {
                                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
                                
                                $name=$_GET["m_name"];
                                
                                if(isset($name)){
                                     echo "<script type='text/javascript'>
                                               $(document).ready(function(){
                                                    $('#view-meeting').toggle();
                                                    $('#add-meeting').toggle();
                                               
                                               });
                                     
                                     </script>" ;
                                }
                
                                
                                $sql = "SELECT s_id, s_name, m_name, guests, s_time, e_time, contact, email FROM booking where m_name like '$name';";

                                if ($result = mysqli_query($con, $sql))
                                {
                                    echo $name;
                                    $resultArray = array();
                                    $tempArray = array();

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $tempArray = $row;
                                        array_push($resultArray, $tempArray);

                                        $datetime = date_create($row['s_time']);
                                        $date = date_format($datetime,"Y-m-d");
                                        $s_time = date_format($datetime,"H:i:s");
                                        $datetime = date_create($row['e_time']);
                                        $e_time = date_format($datetime,"H:i:s");
                                        ?>

                                    <div class="text-form">Meeting Name<input class="text-field editable" type="text" name="m_name" value="<?php echo '' .$row['m_name']; ?>" readonly required><br></div>
                                    <div class="text-form ">Staff Name<input class="text-field editable" type="text" name="s_no" value="<?php echo ''.$row['s_name'];?>" readonly required><br></div>
                                    <div class="text-form">Staff Number<input class="text-field editable" type="text" name="s_id" value="<?php  echo ''. $row['s_id']; ?>" readonly required><br></div>
                                    <div class="text-form date-form">Date<input class="text-field editable" type="date" name="date" value="<?php echo '' . $date;?>" readonly required><br></div>
                                    <div class="text-form">Start Time<input class="text-field editable" type="time" name="start" value="<?php echo '' .$s_time; ?>" readonly required><br></div>
                                    <div class="text-form">End Time<input class="text-field editable" type="time" name="end" value="<?php echo '' .$e_time; ?>" readonly required><br></div>
                                    <div class="text-form">No.of Attendees<input class="text-field editable" type="text" name="guests" value="<?php echo '' .$row['guests']; ?>" readonly><br></div>
                                    <!---<div class="text-form">Room Name<input class="text-field editable" type="text" name="r_no" readonly><br></div>--->
                                    <div class="text-form">Contact Number<input class="text-field editable" type="text" name="id" value="<?php      echo '' .$row['email']; ?>" readonly required></div>
                                    <div class="text-form">Email<input class="text-field editable" type="text" name="id" value="<?php  echo '' .$row['contact']; ?>" readonly required></div>
                                    <br>
                                
                                    <!--ON CLICKING SUBMIT, AN UPDATE SQL QUERY MUST RUN-->
                                    <div class="form-sub"><button class="form-submit edit-submit" type="submit" style="display:none;" />Submit</div>
                                    
                                    <!--<script type="text/javascript">
                                        $(document).ready(function(){
                                            
                                            $('.edit-submit').click(function(){
                                                alert("php/editbooking.php?m_name="+<?php echo $row['m_name']; ?>);
                                                window.location.href="php/editbooking.php?m_name="+<?php echo $row['m_name']; ?>;   
                                            });
                                        });
                               </script>-->
                               
                            </form>
                        </div>



                        <form method="get">
                            <a href="#" class="button1" style="">Edit Meeting</a>
                            <a href="php/deletebooking.php?m_name=<?php echo $row['m_name']; ?>" onclick="return confirm('Are you sure?')" class="button2">Delete Meeting</a>

                        </form>
                                <?php 
                                }//for the while loop
                                $fp = fopen('json/bookingmeeting.json', 'w');
                                fwrite($fp, json_encode($resultArray));
                                fclose($fp);
                            } // for the if condition

                            mysqli_close($con); 

                         ?> 
                    </div>



                </ul>
            </div>
        </div>
    </div>
    <!--  <div class="container-fluid" id="edit-delete" style="display: none;">
      <div class="row">
        <div class="col-sm-3 col-md-4 sidebar">
          <ul class="nav nav-sidebar">
	
            <li  id="edit" class="active">	  <a href="#" class="button3">Back</a><a href="#">Edit Meeting 
               <!--<span class="sr-only">(current)</span></a>
				<div id="edit-form" style="position:relative;">
			         <form class="e-form" action="FS1" method="get">
				        <div class="text-form">Meeting Name<input class="text-field" type="text" name="m_name" required><br></div>
                        <div class="text-form">Booked By<input class="text-field" type="text" name="b_by" required><br></div>
                        <div class="text-form">Staff Number<input class="text-field" type="text" name="s_id" required><br></div>
                        <div class="text-form date-form">Date<input class="text-field" type="date" name="date" required><br></div>
                        <div class="text-form">Start Time<input class="text-field" type="time" name="start" required><br></div>
                        <div class="text-form">End Time<input class="text-field" type="time" name="end" required><br></div>
                        <div class="text-form">No.of Attendees<input class="text-field" type="text" name="guests"><br></div>
                        <div class="text-form">Room Number<input class="text-field" type="text" name="r_no"><br></div>
                        <div class="text-form">Contact Number<input class="text-field" type="text" name="id" required></div>
                        <br>
                        <div class="form-sub"><button class="form-submit" type="submit" />Submit</div>
                    </form>	
				</div>
			</li>
          
        </ul>
          
        </div>
    </div>
</div>-->
    <div id='script-warning'>
        <code>php/get-events.php</code> must be running.
    </div>

    <div id='loading'>loading...</div>

    <div id='calendar'></div>

</body>

</html>
