<?php
 
$con=mysqli_connect("localhost","root","root","EKBooking");
  
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name=$_GET["m_name"];
 
$sql = "DELETE FROM booking WHERE m_name='$name';";

 
if ($result = mysqli_query($con, $sql))
{
    echo "Booking deleted!"
}
 
mysqli_close($con);
?>