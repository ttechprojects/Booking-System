<html>
    <head>
        <title>New Booking</title>
        <link rel="stylesheet" type="text/css" href="stylesheet/color.css">
       </head>
    <body>
        
        <form action="FS1" method="get" id="bookingform">
            
		<h1>Place a New Booking</h1>
        <h3>
            
            Meeting Name <input type="text" name="m_name"><br>
			Staff Name <input type="text" name="b_by">&nbsp; &nbsp;&nbsp;
            Staff Number <input type="text" name="s_no"><br>
            Phone Number<input type="number" name="c_no"> &nbsp;&nbsp;
			Email ID <input type="text" name="c_email"><br>
            No.of Attendees <input type="text" name="guests">&nbsp;&nbsp;
			Room Number <input type="text" name="r_no"><br>
			Start <input type="time" name="start"><b>
			End <input type="time" name="end"><br>
            
			Recurrence Time &nbsp;
			Daily<input type="radio" name="rec_time" value="Daily" checked>
            Weekly<input type="radio" name="rec_time" value="weekly">
            Monthly<input type="radio" name="rec_time" value="monthly"> 
			Other<input type="radio" name="rec_time" value="other"><br>
            
			
			
			<br>
            
            <br>
            <input type="submit" value="Submit" class="button">
             </form>  
    </p>
       
    </body>
</html>
