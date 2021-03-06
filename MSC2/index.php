<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='css/fullcalendar.min.css' rel='stylesheet' />
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <?php echo "<script src='js/moment.min.js'></script>";
echo "<script src='js/jquery.min.js'></script>";
echo "<script src='js/fullcalendar.min.js'></script>";
echo "<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: new Date(),
			editable: true,
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow 'more' link when too many events
			events: {
				url: 'php/get-events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
            loading: function(bool) {
				$('#loading').toggle(bool);
			},
			
			eventClick: function(event) {
            $('#view-meeting').toggle();
            var link = 'php/disbookmname.php?m_name='+event.title;
            $('#view-details').load(link);
            $('#add-meeting').toggle();
            return false;
		},
                eventColor:'rgba(200,0,0)'
        });
		
	});
</script>"; ?>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <?php echo    '<script src="js/ie-emulation-modes-warning.js"></script>';
echo	'<script type="text/javascript">
	 $(document).ready(function(){
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
                            <form class="m-form" action="php/addbooking.php" method="post">
                                <div class="text-form">Meeting Name<input class="text-field" type="text" name="m_name" required><br></div>
                                <div class="text-form">Booked By<input class="text-field" type="text" name="e_name" required><br></div>
                                <div class="text-form">Staff Number<input class="text-field" type="text" name="s_id" required><br></div>
                                <div class="text-form date-form">Date<input class="text-field" type="date" name="m_date" required><br></div>
                                <div class="text-form">Start Time<input class="text-field" type="time" name="time_start" required><br></div>
                                <div class="text-form">End Time<input class="text-field" type="time" name="time_end" required><br></div>
                                <div class="text-form">No.of Attendees<input class="text-field" type="text" name="guests"><br></div>
                                <div class="text-form">Room Number<input class="text-field" type="text" name="r_id"><br></div>
                                <!--Recurrence Time&nbsp;
				Daily<input type="radio" name="rec_time" value="Daily" checked>
				Weekly<input type="radio" name="rec_time" value="weekly">
				Monthly<input type="radio" name="rec_time" value="monthly"> 
				Other<input type="radio" name="rec_time" value="other"><br>-->
                                <div class="text-form">Contact Number<input class="text-field" type="text" name="contact" required><br></div>
                                
                                <div class="text-form">Email<input class="text-field" type="text" name="email" required>  <br></div>
                              
                                <div class="form-sub"><button class="form-submit" type="submit" />Submit</div>
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



    <div class="container-fluid" id="view-meeting" style="display: none;">



        <div class="row">
            <div class="col-sm-3 col-md-4 sidebar " style="background-color:lightgray;">
                <ul class="nav nav-sidebar">
                    <li class="active" style="margin-top:-21px; margin-bottom: -50px;"><a href="index.php" class="button4">Back</a></li>
                    <div style="background-color: #f6f6f6;border-left:none;border-top:none;border-right:inset;border-bottom:inset;border-color:rgba(200,0,0,0.8); 
		border-top-right-radius:15px;border-bottom-right-radius:15px; box-shadow:2px 2px 0px 0px lightgray inset;  padding-top:50px;margin-top:50px;">
                        <div id="edit-form" style="position:relative;">
                            <form class="e-form" action="FS1" method="get" style="min-height:400px">

                                <?php
 
$con=mysqli_connect("localhost","root","root","EKBooking");
  
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name=$_GET["m_name"];
 
$sql = "SELECT b.s_id,b.e_name,b.m_name,b.guests,b.meeting_start,b.meeting_end,b.contact,b.email,r.r_name FROM booking b INNER JOIN rooms r ON b.s_id=r.s_id AND b.m_name='$name';";

 
if ($result = mysqli_query($con, $sql))
{
    
	$resultArray = array();
	$tempArray = array();
 
	while($row = mysqli_fetch_assoc($result))
	{ 
	    $resultArray = $row;
        
        $datetime = date_create($row['meeting_start']);
        $date = date_format($datetime,"Y-m-d");
        $s_time = date_format($datetime,"H:i:s");
        $datetime = date_create($row['meeting_end']);
        $e_time = date_format($datetime,"H:i:s");
    
 ?>
                                    <!--CHANGE HERE CHIRAG!!!!!!!!!!-->

                                    <div class="text-form">Meeting Name<input class="text-field editable" type="text" name="m_name" value="<?php echo $row['m_name']; ?>" readonly required><br></div>
                                    <div class="text-form ">Booked By<input class="text-field editable" type="text" name="e_name" value="<?php echo $row['e_name']; ?>" readonly required><br></div>
                                    <div class="text-form">Staff Number<input class="text-field editable" type="text" name="s_id" value="<?php echo $row['s_id']; ?>" readonly required><br></div>
                                    <div class="text-form date-form">Date<input class="text-field editable" type="date" name="date" value="<?php echo $date; ?>" readonly required><br></div>
                                    <div class="text-form">Start Time<input class="text-field editable" type="time" name="start" value="<?php echo $s_time; ?>" readonly required><br></div>
                                    <div class="text-form">End Time<input class="text-field editable" type="time" name="end" value="<?php echo $e_time; ?>" readonly required><br></div>
                                    <div class="text-form">No.of Attendees<input class="text-field editable" type="text" name="guests" value="<?php echo $row['guests']; ?>" readonly><br></div>
                                    <div class="text-form">Room Number<input class="text-field editable" type="text" name="r_name" value="<?php echo $row['r_name']; ?>" readonly><br></div>
                                    <div class="text-form">Contact Number<input class="text-field editable" type="text" name="contact" value="<?php echo $row['contact']; ?>" readonly required><br></div>
                                    <div class="text-form">Email<input class="text-field editable" type="text" name="email" value="<?php echo $row['email']; ?>" readonly required><br></div>


                                    <!--ON CLICKING SUBMIT, AN UPDATE SQL QUERY MUST RUN-->
                                    <div class="form-sub"><button class="form-submit edit-submit" type="submit" style="display:none;" />Submit</div>

                                    <?php
    }
	header("Content-type: application/json");
    $fp = fopen('../json/bookingmeeting.json', 'w');
    fwrite($fp, json_encode($resultArray));
    fclose($fp);
} 
 


mysqli_close($con);
?>
                            </form>
                        </div>



                        <form action="delete.php">
                            <a href="#" class="button1" style="">Edit Meeting</a>
                            <a href="index.html" onclick="return confirm('Are you sure?')" class="button2">Delete Meeting</a>

                        </form>
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
