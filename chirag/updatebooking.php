<?php

	$con=mysqli_connect("localhost","root","","booking");
	
	if(isset($_SESSION['Login'])
	{
		$meeting_name=$_POST["m_name"];
		$emp_name=$_POST["e_name"];
		$time_s=$_POST["time_start"];
		$time_e=$_POST["time_end"];
		$nog=intval($_POST["guests"]);
		$cont=intval($_POST["contact"]);
		$staff_no=intval($_POST["s_no"]);
		$r="";
		$avail="";
	
		$room_no=array_fill(0,20,false);
	
		$sql1="SELECT r.r_no FROM rooms r,booking b WHERE r.s_id = '$staff_no';";
		$sql2="INSERT INTO booking VALUES('$emp_name','$staff_id','$meeting_name',$nog,'$time_s','$time_e');";
		$sql3="INSERT INTO rooms VALUES($r,'$staff_no',$avail);";
		$sql4="SELECT r.r_no,b.time_s,b.time_e FROM booking b,room r WHERE r.s_id=b.s_id;";
			
		if($result=mysqli_query($con,$sql1))
			{
				while($row=mysqli_fetch_assoc($result))
					{
						while($row["r.r_no"]!=NULL)
							{	
								$room=intval($row["r.r_no"]);
								$room_no[$room]=true;
							}
						
								$i=0;
								if($room_no[$i]==false)
									{
										$r=$room_no[$i];
										$room_no[$i]=true;
										$result2=mysqli_query($con,$sql3);
										break;
									}
								else
									{
										$i=$i+1;
									}
					}
			}
			
		if($res=mysqli_query($con,$sql4))
			{
				while($row=mysqli_fetch_assoc($res))
					{
						if($time_s==$row['b.time_s'] && $time_e==$row['b.time_e'])
							{
								echo "Timings are clashing!";
								header("Location:http://localhost/Project/form.php");
							}
						else
							{
								$res2=mysqli_query($con,$sql2);
								echo "Booking updated Successfully!";
							}
					}	
			}
	}
	else
		{
			header("Location:http://localhost/Project/login.php");
		}
	
	mysqli_close($con);
	
?>