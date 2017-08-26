<?php
    
    $con=mysqli_connect("localhost","root","root","EKBooking"); //Connect to the mySQL server.

    if (mysqli_connect_errno()) 
        { 
            echo "Failed to connect to MySQL: " . mysqli_connect_error(); //If unable to connect, display error.
        }

    $meeting_name=$_POST['m_name']; //Meeting Name.
    $emp_name=$_POST['e_name'];     //Employee Name.
    $time_s=$_POST['time_start'];   //Meeting Start Time
    $time_e=$_POST['time_end'];     //Meeting End Time
    $nog=intval($_POST['guests']);  //Number of guests
    $cont=intval($_POST['contact']);//Contact 
    $staff_id=intval($_POST['s_id']);//Staff Id 
    $email=$_POST['email'];         //Email
    $mdate=$_POST['m_date'];        //Meeting Date
    $room=$_POST['r_id'];           //Room Number

    $ms=$mdate.' '.$time_s;         //For combining the date and time to make date time format as defined by SQL
    $me=$mdate.' '.$time_e;         //For combining the date and time to make date time format as defined by SQL 

    $avail=0;                       //For checking the availability of the room.

    $sql1="SELECT * FROM rooms;";   //Selects all the rows in the rooms table from the SQL Database
    $sql2="SELECT * FROM booking;"; //Selects all the rows in the booking table from the SQL Database
    $sql3="INSERT INTO booking VALUES('$emp_name','$staff_id','$meeting_name',$nog,'$ms1','$me1',$cont,'$email');";
                                    //For updating the booking table on booking a meeting
    $sql4="UPDATE rooms SET s_id='$staff_id',avail='$avail' WHERE r_id='$room';";
                                    //For updating the rooms table in the database
    

    $dt1=date_create($ms);          //To create datetime variable which will be used to compare for timeclashing
    $ms1=date_format($dt1,"Y-m-d H:i:s");

    $dt2=date_create($me);
    $me1=date_format($dt2,"Y-m-d H:i:s");


    $from=$ms1;                     //Start meeting time
    $to=$me1;                       //End meeting time


    if($result1=mysqli_query($con,$sql1))//connects to rooms table
    {
        if($result2=mysqli_query($con,$sql2))//connect to booking table
        {
            while($row1=mysqli_fetch_assoc($result2))//while getting results from the booking table
            {
                $from_compare = $row['meeting_start'];//meeting start time from the already booked meetings
                $to_compare = $row['meeting_end'];//meeting end time from already booked meetings
                
                $another_meeting=($to<=$from_compare || $from>=$to_compare);
                    
                //$another_meeting = (strcmp($from,$from_compare) && strcmp($from,$to_compare)) || 
                            //(strcmp($from_compare,$from) && strcmp($from_compare,$to));//logic is wrong, re-verify
                
                if($another_meeting==true)//if times are clashing, display
                {
                    echo "Timings are clashing!";
                    break;
                }
                else//else, proceed to book the meeting
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


mysqli_close($con);//close the connection.

?>
