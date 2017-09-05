<?php
mysqli_connect("localhost","root","root","EKBooking");
 
if(isset($_POST['update']))
{    
    
    $mname = $_POST['m_name'];
    $ename = $_POST['e_name'];
    $s_id = $_POST['s_id'];
    $ms = $_POST['meeting_start'];
    $me = $_POST['meeting_end'];
    $guests = $_POST['guests'];
    $email = $_POST['email'];
    $cont = $_POST['contact'];
    
    // checking empty fields
    if(empty($mname) || empty($ename) || empty($s_id)|| empty($ms)|| empty($me)|| empty($guests)|| empty($email)|| empty($cont)) {            
        if(empty($mname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($ename)) {
            echo "<font color='red'>Booked By field is empty.</font><br/>";
        }
        if(empty($s_id)) {
            echo "<font color='red'>Staff Number field is empty.</font><br/>";
        }
        if(empty($ms)) {
            echo "<font color='red'>Meeting start time field is empty.</font><br/>";
        }
        if(empty($me)) {
            echo "<font color='red'>Meeting end time field is empty.</font><br/>";
        }
        if(empty($guests)) {
            echo "<font color='red'>No. of Attendees field is empty.</font><br/>";
        }
        if(empty($cont)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE booking SET m_name='$mname',e_name='$ename',email='$email',meeting_start='$ms',meeting_end='$me',guests='$guests',cont='$cont' WHERE s_id=$s_id");
        
        header("Location: index.html");
    }
}
?>
<?php
$namec = $_GET['m_name'];
 
$result = mysqli_query($mysqli, "SELECT * FROM booking b,rooms r WHERE b.m_name='$namec'");
 
while($res = mysqli_fetch_array($result))
{
    $mname = $res['m_name'];
    $ename = $res['e_name'];
    $s_id = $res['s_id'];
    $ms = $res['meeting_start'];
    $me = $res['meeting_end'];
    $guests = $res['guests'];
    $email = $res['email'];
    $cont = $res['contact'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    
    <form name="form1" method="post" action="lol.php">
        <table border="0">
            <tr> 
                <td>Meeting Name</td>
                <td><input type="text" name="m_name" value="<?php echo $mname;?>"></td>
            </tr>
            <tr> 
                <td>Booked By</td>
                <td><input type="text" name="e_name" value="<?php echo $ename;?>"></td>
            </tr>
            <tr> 
                <td>Staff Number</td>
                <td><input type="text" name="s_id" value="<?php echo $s_id;?>"></td>
            </tr>
            <tr> 
                <td>Start Time</td>
                <td><input type="text" name="meeting_start" value="<?php echo $ms;?>"></td>
            </tr>
            <tr> 
                <td>End Time</td>
                <td><input type="text" name="meeting_end" value="<?php echo $me;?>"></td>
            </tr>
            <tr> 
                <td>No. of Attendees</td>
                <td><input type="text" name="guests" value="<?php echo $guests;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Contact</td>
                <td><input type="text" name="contact" value="<?php echo $cont;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="m_name" value=<?php echo $_GET['m_name'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>