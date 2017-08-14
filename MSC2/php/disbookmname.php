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
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
        
        $datetime = date_create($row['meeting_start']);
        $date = date_format($datetime,"Y-m-d");
        $s_time = date_format($datetime,"H:i:s");
        $datetime = date_create($row['meeting_end']);
        $e_time = date_format($datetime,"H:i:s");
        
         echo "Meeting ID : " .$row["m_name"]."<br><br>";
      
         echo "Booked By : " .$row["e_name"]."<br><br>";
		 echo "Staff Number : ". $row["s_id"]."<br><br>";
         echo "Start Time : " . $s_time."<br><br>";
         echo "End Time : " .$e_time."<br><br>";
         echo "Date : " .$date."<br><br>";
         echo "No.Of Attendees : " .$row["guests"]."<br><br>";
         echo "Room Number : " .$row["r_name"]."<br><br>";
         echo "Email : " .$row["email"]."<br><br>";
         echo "Contact : " .$row["contact"]."<br><br>";
        
     /*echo ' <p>
             <form action="deletebooking.php">
             <a href="php/lol.php?$row[\"m_name\"]" class="button1">Edit Meeting</a>
             <a href="index.html#" onclick="return confirm(\'Are you sure?\')" class="button2">Delete Meeting</a>
         </p>';*/
 } header("Content-type: application/json"); $fp = fopen('../json/bookingmeeting.json', 'w'); fwrite($fp, json_encode($resultArray)); fclose($fp); } mysqli_close($con); ?>
