<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once "vendor/autoload.php";
$meeting_name=$_GET['m_name'];
$con=mysqli_connect("localhost","root","","ekbooking"); 
$sql="select s_name, r_id, date, s_time, email from booking where m_name like '$meeting_name';";
$result = mysqli_query($con, $sql);
   echo $meeting_name;

if(mysqli_num_rows($result) > 0){
                echo $meeting_name;
                    while($row = mysqli_fetch_assoc($result))
                         {
                            $tempArray = $row;
                       //     array_push($resultArray, $tempArray);

                
                        $name=$row['s_name'];
                        $room=$row['r_id'];
                        $date=$row['date'];
                        $stime=$row['s_time'];
                        $email=$row['email'];
                        echo "trshtdydjy";
                    }
                        
                    
                    $message="Greetings '$name', \r\n".
                        "You have successfully booked a meeting for the date '$date' at \r\n".
                        "'$stime'. your room number for the meeting is '$room' \r\n".
                        "Hope u have a great time! \r\n".
                        "Good bye idiots";
                    
                    echo $message, $email;
                
                    
                    
                    
                }
mysqli_close($con);


$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "donadivarun@gmail.com";                 
$mail->Password = "Donadi@12";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "donadivarun@gmail.com";
$mail->FromName = "Varun Donadi";

$mail->addAddress($email, "Varun");

$mail->isHTML(true);

$mail->Subject = "Automatic mail";
$mail->Body = $message;
$mail->AltBody = "what goes over here?";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}












/*

if($result = mysqli_query($con,$mail_query)){
                echo $meeting_name;
                    while($row = mysqli_fetch_assoc($result))
                         {
                            $tempArray = $row;
                       //     array_push($resultArray, $tempArray);

                
                        $name=$row['s_name'];
                        $room=$row['r_id'];
                        $date=$row['date'];
                        $stime=$row['s_time'];
                        $email=$row['email'];
                        echo "trshtdydjy";
                    }
                        
                    
                    $message="Greetings '$name', \r\n".
                        "You have successfully booked a meeting for the date '$date' at \r\n".
                        "'$stime'. your room number for the meeting is '$room' \r\n".
                        "Hope u have a great time! \r\n".
                        "Good bye idiots";
                    
                    echo $message, $email;
                
                    
                    
                    
                }
                
                
                */
?>