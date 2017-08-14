<?php
    
    $con=mysqli_connect("localhost","root","root","EKBooking");

    if (mysqli_connect_errno()) 
        { 
            echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
        }

    $meeting_name=$_POST['m_name'];
    $emp_name=$_POST['e_name'];
    $time_s=$_POST['time_start'];
    $time_e=$_POST['time_end'];
    $nog=intval($_POST['guests']); 
    $cont=intval($_POST['contact']); 
    $staff_id=intval($_POST['s_id']); 
    $email=$_POST['email']; 
    $mdate=$_POST['m_date'];
    $room=$_POST['r_id'];

    $ms=$mdate.' '.$time_s;
    $me=$mdate.' '.$time_e;

    $avail=0;

    $sql1="SELECT * FROM rooms;";
    $sql2="SELECT * FROM booking;";
    $sql3="INSERT INTO booking VALUES('$emp_name','$staff_id','$meeting_name',$nog,'$ms1','$me1',$cont,'$email');";
    $sql4="UPDATE rooms SET s_id='$staff_id',avail='$avail' WHERE r_id='$room';";
    

    $dt1=date_create($ms);
    $ms1=date_format($dt1,"Y-m-d H:i:s");

    $dt2=date_create($me);
    $me1=date_format($dt2,"Y-m-d H:i:s");


    $from=$ms1;
    $to=$me1;


    if($result1=mysqli_query($con,$sql1))
    {
        if($result2=mysqli_query($con,$sql2))
        {
            while($row1=mysqli_fetch_assoc($result2))
            {
                $from_compare = $row['meeting_start'];
                $to_compare = $row['meeting_end'];
                    
                $another_meeting = (strcmp($from,$from_compare) && strcmp($from,$to_compare)) || 
                            (strcmp($from_compare,$from) && strcmp($from_compare,$to));
                
                if($another_meeting==true)
                {
                    echo "Timings are clashing!";
                    break;
                }
                else
                {
                    if($row2=mysqli_fetch_assoc($result1))
                    {
                        while($row2['r_id']!=$room)
                        {
                            $result3=mysqli_query($con,$sql3);
                            $result4=mysqli_query($con,$sql4);
                            echo "Booking Updated Successfully!";
                            break;
                        }
                    }
                }
            }
        }
    }


mysqli_close($con);

?>
