<html>
    <head>
        <title>New Booking</title>
        <link rel="stylesheet" type="text/css" href="color.css">
       </head>
    <body>
        
        <form action="updatebooking.php" method="post" id="bookingform">
            
		<h1>Place a New Booking</h1>
        <h3>
            
            Meeting Name <input type="text" name="m_name"><br>
			Staff Name <input type="text" name="e_name">&nbsp; &nbsp;&nbsp;
            Staff Number <input type="text" name="s_id"><br>
            Phone Number<input type="number" name="contact"> &nbsp;&nbsp;
			Email ID <input type="text" name="email"><br>
            No.of Attendees <input type="text" name="guests">&nbsp;&nbsp;
			Start <input type="time" name="time_start"><b>
			End <input type="time" name="time_end"><br>
			Date <input type="date" name="m_date"><br>
            			
			<br>
            
            <br>
            <input type="submit" value="Submit" class="button">
             </form>  
    </p>
       
    </body>
</html>