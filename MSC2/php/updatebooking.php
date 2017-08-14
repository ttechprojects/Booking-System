<?php

    $con=mysqli_connect("localhost","root","root","EKBooking");

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

        $meeting_name=$_POST["m_name"];
        $emp_name=$_POST["e_name"];
        $time_s=$_POST["time_start"];
        $time_e=$_POST["time_end"];
        $nog=intval($_POST["guests"]);
        $cont=intval($_POST["contact"]);
        $staff_id=intval($_POST["s_id"]);
        $email=$_POST["email"];
        $mdate=$_POST["m_date"];
        
        $r="";
        $avail="";
        $string="Room-".$r;
        $flag=0;


        $meet_s=$m_date.' '.$time_s;
        $meet_e=$m_date.' '.$time_e;
        
        $ms=date_create($meet_s);
        $ms1=date_format($ms,"Y-m-d H:i:s");
        $me=date_create($meet_e);
        $me1=date_format($me,"Y-m-d H:i:s");

        $room_no=array_fill(0,20,true);

        $sql1="SELECT r_id,avail FROM rooms;";
        $sql2="INSERT INTO booking VALUES('$emp_name','$staff_id','$meeting_name',$nog,'$ms1','$me1',$cont,'$email');";
        $sql3="UPDATE rooms SET s_id='$staff_id',avail=0 WHERE r_name='$string';";
        $sql4="SELECT r.s_id,b.meeting_start,b.meeting_end FROM booking b,rooms r WHERE r.s_id=b.s_id;";

        $from=$ms;
        $to=$me;
        
          if($res=mysqli_query($con,$sql4))
            {
                while($row2=mysqli_fetch_assoc($res))
                    {
                         $from_compare = $row['meeting_start'];
                         $to_compare = $row['meeting_end'];
                    
                        $another_meeting = (strcmp($from,$from_compare) && strcmp($from,$to_compare)) || 
                            (strcmp($from_compare,$from) && strcmp($from_compare,$to));

                        if($another_meeting)
                            {
                                echo "Timings are clashing!";
                                $flag=1;
                                break;
                            }
                        else
                            {
                                $flag=0;
                                continue;
                            }
                    }	
            }
            if($flag) 
                 {
                    goto c;
                 }
            else      
                 {
                   $res2=mysqli_query($con,$sql2);
                   echo "Booking updated Successfully!"; 
                 }
            

        if($result=mysqli_query($con,$sql1))
            {
                while($row1=mysqli_fetch_assoc($result))
                    {
                        if($row1['avail']==0)
                            {	
                                $room=$row1['r_id'];
                                $room_no[$room-1]=false;
                            }
                        else
                            {
                                continue;
                            }
                    }
            
                while($row3=mysqli_fetch_assoc($result))
                    {
                        $i=$row3['r_id']-1;
                                
                        if($room_no[$i]==true)
                            {
                                $r=$i+1;
                                $room_no[$i]=false;
                                $avail=0;
                                $result2=mysqli_query($con,$sql3);
                                echo "Room no. ".$r." alloted!";
                                break;
                            }
                        else
                            {
                                $i=$i+1;
                            }
                    }
                    
            }

c:
mysqli_close($con);
?>