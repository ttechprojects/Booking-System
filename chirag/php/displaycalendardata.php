<?php
 
$con=mysqli_connect("localhost","root","root","EKBooking");
mysqli_set_charset('utf8');
  
if(mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$sql = "SELECT * FROM booking;";

 
if($result = mysqli_query($con, $sql))
{
	while($row = mysqli_fetch_assoc($result))
	{
		$title = $row['m_name'];
        $start = $row['meeting_start'];
        $end = $row['meeting_end'];
        
        $modified_array[]=array('title'=>$title,'start'=>$start,'end'=>$end);
	}
    
    $result_array=$modified_array;
    $fp = fopen('../json/events.json', 'w');
    fwrite($fp, json_encode($result_array));
    fclose($fp);
    
    echo json_encode($result_array);
}
 
mysqli_close($con);
?>