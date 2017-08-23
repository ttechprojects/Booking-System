<?php

	$con=mysqli_connect("localhost","root","","ekbooking");
	
	
			$meeting_name=$_REQUEST["m_name"];
			$emp_name=$_REQUEST["s_no"];
            $staff_no=intval($_REQUEST["s_id"]);
            $date=$_REQUEST["date"];
			$time_s=$_REQUEST["start"];
			$time_e=$_REQUEST["end"];
			$nog=intval($_REQUEST["guests"]);
			$cont=intval($_REQUEST["id"]);
			
			$ms=$date.' '.$time_s;
            $me=$date.' '.$time_e;
            //SQL query changes when primary key changes

                        $datetime = date_create($ms);
                                    $date = date_format($datetime,"Y-m-d");
                                    $s_time = date_format($datetime,"Y-m-d H:i:s");
                                    $datetime = date_create($me);
                                    $e_time = date_format($datetime,"Y-m-d H:i:s");

			$sql="UPDATE booking SET s_name='$emp_name', m_name='$meeting_name', date='$date', guests=$nog, s_time='$s_time', e_time='$e_time', contact='$cont' WHERE m_name='$meeting_name';";
    

 if($result=mysqli_query($con,$sql)) 
 { 
     echo "Booking successfully edited!"; 
        header('Location: ../index.php'); 
 }	
	mysqli_close($con);

?>
