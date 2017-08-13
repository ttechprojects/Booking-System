<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emirates";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
} 
else 
{
$sql = "SELECT * FROM booking;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
	{
        echo "Meeting ID : " .$row["m_name"]."<br>";
        //echo "Booked By : " .$row["b_name"]."<br>";
		//echo "Staff Number : ". $row["s_id"]."<br>";
        //echo "Date : " . $row["date"]."<br>";
        echo "Start Time : " . $row["time_start"]."<br>";
        echo "End Time : " .$row["time_end"]."<br>";
        //echo "No.Of Attendees : " .$row["attendees"]."<br>";
        //echo "Room Number : " .$row["r_no"]."<br>";
    }
} else {
    echo "0 results";
}
}
$conn->close();
?>