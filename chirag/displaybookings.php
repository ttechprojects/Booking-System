<?php
 
$con=mysqli_connect("localhost","root","","booking");
  
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$sql = "SELECT * FROM booking UNION SELECT * FROM rooms;";

 
if ($result = mysqli_query($con, $sql))
{
	$resultArray = array();
	$tempArray = array();
 
	while($row = $result->fetch_object())
	{
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
	
	echo json_encode($resultArray);
}
 
mysqli_close($con);
?>