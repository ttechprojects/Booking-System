<?php

	$con=mysqli_connect("localhost","root","","booking");
	
	
			$meeting_name=$_POST["m_name"];
			$emp_name=$_POST["e_name"];
			$time_s=$_POST["time_start"];
			$time_e=$_POST["time_end"];
			$nog=intval($_POST["guests"]);
			$cont=intval($_POST["contact"]);
			$staff_no=intval($_POST["s_no"]);
			
			$sql="UPDATE booking SET e_name='$emp_name', m_name='$meeting_name', guests=$nog, time_start='$time_s', time_end='$time_e', contact='$cont' WHERE s_no='$staff_no';";
			
			if($meeting_name!='' && $emp_name!='' && $time_s!='' && $time_e!='' && $staff_no!='')
				{
					$result=mysqli_query($con,$sql);
				}
				
			if($result)
				{
					echo "Booking successfully edited!";
				}
	
	mysqli_close($con);

?>