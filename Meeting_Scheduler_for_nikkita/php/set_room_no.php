<?php 

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require_once "../vendor/autoload.php";

$con=mysqli_connect("localhost","root","","ekbooking");
//$con1=mysqli_connect("localhost","root","","ekbooking");
$meeting_name=$_GET['m_name'];
if(isset($_POST['submit'])){
        $room_selected_number=$_POST['room_number'];
//}
//if(isset($room_selected_number)){
                
            
            $sql_room_select="update booking set r_id='$room_selected_number' where m_name like '$meeting_name';";
            //$mail_query="select s_name, r_id, date, s_time, email from booking where m_name like '$meeting_name';";
            
            if(mysqli_query($con,$sql_room_select)){
                echo "Booking Successful";
                
               
                mysqli_close($con);
               header('Location:../mailtest.php?m_name='.$meeting_name); 
            }
            else{
                echo "Booking Unsucessful";
                $sql_fail="delete from booking where m_name like '$meeting_name'";
                mysqli_query($con,$sql_fail);
            }
            
                
            }


//mysqli_close($con1);
mysqli_close($con);
//$link = 'Location: ../php/mailtest.php?s_name='.$name.'&r_id='.$room.'&date='.$date.'&s_time='.$stime.'&email='.$email;

//header($link);
?>



