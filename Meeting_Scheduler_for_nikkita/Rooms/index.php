<!DOCTYPE html>
<html>
<head>
    
</head>

<body>
    <style>
        /*
            All the necessary styling for the table of rooms done here!
            The only styling dont in-line html is to check if the room is busy with many meetings or not.
            All the rest of the styling is done here
        */
        a{
            /*display: block;
            height: 100px;
            width: 250px;*/
            color:white;
            text-decoration-line: none;
        }
        b{
            font-size: 20px;
        }
        td{
            background-color: black;
            border: 1px solid black;
            border-radius: 5px;
            height:100px;
            width:250px; 
            color: white;
            text-align:center;
            cursor: pointer;
        }
        .meeting_time{
            font-size: 11px;
        }
        .occupied_b{
            background-color: red;
        }
        .occupied_a{
            background-color: red;
        }
        .busy{
            background-color: #CC8D07;
        }
        .available{
            background-color: green;
        }
    
    </style>
      <script src="https://code.jquery.com/jquery-1.10.2.js">    // Add the jQuery file to reference jquery commands.
    </script>
    <script>
        $(document).ready(function(){ //Check if the document is loaded or not.
            $("td").click(function(){ //On-click a table cell
                
                var a = $(this).attr('class').split(' '); //get the class of the cell
                if(a[1]=="available"){ //if its available, toggle with occupied available.
                    $(this).toggleClass("available");
                    $(this).toggleClass("occupied_a");
                }
                else if(a[1]=="busy"){ //if its busy toggle with occupied-busy.
                    $(this).toggleClass("busy");
                    $(this).toggleClass("occupied_b");
                }
                else if(a[1]=="occupied_a"){ //if its occupied but availabe before it was occupied, toggle with available
                    $(this).toggleClass("occupied_a");
                    $(this).toggleClass("available");
                }
                else if(a[1]=="occupied_b"){ //if its occupied but busy befor, toggle with busy
                    $(this).toggleClass("occupied_b");
                    $(this).toggleClass("busy");
                }
               
                
            }); //end click function
        });//end document and script
    </script>
    
    <?php //start php code.
    
         $con=mysqli_connect("localhost","root","","ekbooking"); //Connect to the mySQL server.
    if (mysqli_connect_errno()) //Check if its connected or not.
        { 
            echo "Failed to connect to MySQL: " . mysqli_connect_error(); //If unable to connect, display error.
        }
    $get_room_id="select r_id from rooms;"; // SQL query to get room id from the database.
    $room_id=array(); // An array to store all the room numbers.
    $result=mysqli_query($con,$get_room_id); //Execute the query.
    if(mysqli_num_rows($result) > 0){ // check if the query returned any rows, if yes then proceed:
        //echo "Get room number successful!"; //For debugging purposes.
        while($row = mysqli_fetch_assoc($result)){ //if there are more than 1 rows, then an array to read data one by one from the result.
            $room_id[]=$row['r_id'];  // for storing the room ids in the $room_id array.
        }
        
        
    }
    
    // uncomment the following lines to check if the room numbers are being called correctly.
    
    /*foreach($room_id as $room_no){
        echo "\n room number : ".$room_no;
    }*/
    $today=date("Y/m/d");
    
    
    $meeting_detail = array(); // for storing all the details of meetings that are going to take place in a room
    
    foreach($room_id as $room_no){
        $get_meetings="select m_name,s_time,e_time,s_name from booking where date='$today' and r_id='$room_no';";
        $room_meeting_detail=array();
        $result=mysqli_query($con,$get_meetings);
        $meeting_detail_array=array();
        if(mysqli_num_rows($result) > 0){ // check if the query returned any rows, if yes then proceed:
            
          //  echo "Get Meetings successfully"; //For debugging purposes.
            while($row = mysqli_fetch_assoc($result)){ //if there are more than 1 rows, then an array to read data one by one from the                                                  //result.
                
                //Storing the required details in an array.
                $room_meeting_detail['m_name']=$row['m_name'];        
                $room_meeting_detail['s_name']=$row['s_name'];        
                $room_meeting_detail['s_time']=$row['s_time'];        
                $room_meeting_detail['e_time']=$row['e_time'];        
                $meeting_detail_array[]=$room_meeting_detail;
            }
        }
        //var_dump($meeting_detail_array);
        $meeting_detail[$room_no]=$meeting_detail_array; //creating a nested array to hold all the meeting deatils according to the room                                                       //numbers in an array.
        //var_dump($room_meeting_detail);
        // clearing and reinitialising the array.
        unset($room_meeting_detail);
        $room_meeting_detail=array();
    }
    //var_dump($meeting_detail); //dumping all the variables to check if the array is proper. For debugging.
    
    ?>
 
           

<div class="rooms_table">
<table>
    <tr>
        <td id="1" class="room available" value="1231"><a href="index.php"><b>Room</b></a><br>
            <div class="meeting_time">
        <?php 
            $i=0;
            $md=$meeting_detail[1231]; //get all the meeting details for the room
            foreach($md as $md1){   
                echo "(".substr($md1['s_time'],11,19)." - ".substr($md1['e_time'],11,19).")<br>";//for displaying all the meeting happening in the room.
                $i++;
                if($i>2){
                    echo "More"; //if meeting are more than 1 display more then stop.
                    break;
                }
            }
 ?></div>
            </td>
        <td id="2" class="room available" value="1232"><a href="index.php"><b>Room</b></a><br>
        <div class="meeting_time">
            <?php 
            $i=0;
            $md=$meeting_detail[1232];  //get all the meeting details for the room
            foreach($md as $md1){
                echo "(".substr($md1['s_time'],11,19)." - ".substr($md1['e_time'],11,19).")<br>";  //for displaying all the meeting happening in the room.
                $i++;
                if($i>2){
                    echo "More"; //if meeting are more than 1 display more then stop.
                    break;
                }
            }
 ?>
            </div>
        </td>
        <td id="3" class="room available" value="1233"><a href="index.php" ><b>Room</b></a><br>
        <div class="meeting_time">
            <?php 
            $i=0;
            $md=$meeting_detail[1233];  //get all the meeting details for the room
            foreach($md as $md1){
                echo "(".substr($md1['s_time'],11,19)." - ".substr($md1['e_time'],11,19).")<br>";  //for displaying all the meeting happening in the room.
                $i++;
                if($i>2){
                    echo "More"; //if meeting are more than 1 display more then stop.
                    break;
                }
            }
 ?>
            </div>
            </td>
        <td id="4" class="room available" value="1234"><a href="index.php" ><b>Room</b></a><br>
        <div class="meeting_time">
            <?php 
            $i=0;
            $md=$meeting_detail[1234];  //get all the meeting details for the room
            foreach($md as $md1){
                echo "(".substr($md1['s_time'],11,19)." - ".substr($md1['e_time'],11,19).")<br>";  //for displaying all the meeting happening in the room.
                $i++;
                if($i>=1){
                    echo "More";
                    echo "<script>
                        
                            $('#4').toggleClass('available');
                            $('#4').toggleClass('busy');
                       
                    </script>";//if meeting are more than 1 display more then stop.
                    break;
                }
            }
 ?>
            </div>
        </td>
        <td id="5" class="room available" value="1235"><a href="index.php" /><b>Room</b><br></td>
    </tr>
    <tr>
        <td id="6" class="room available" value="1236"><a href="index.php" /><b>Room</b><br></td>
        <td id="7" class="room available" value="1237"><a href="index.php" /><b>Room</b><br></td>
        <td id="8" class="room available" value="1238"><a href="index.php" /><b>Room</b><br></td>
        <td id="9" class="room available" value="1239"><a href="index.php" /><b>Room</b><br></td>
        <td id="10" class="room available" value="1240"><a href="index.php" /><b>Room</b><br></td>
    </tr>
    <tr>
        <td id="11" class="room available" value="1241"><a href="index.php" /><b>Room</b><br></td>
        <td id="12" class="room available" value="1242"><a href="index.php" /><b>Room</b><br></td>
        <td id="13" class="room available" value="1243"><a href="index.php" /><b>Room</b><br></td>
        <td id="14" class="room available" value="1244"><a href="index.php" /><b>Room</b><br></td>
        <td id="15" class="room available" value="1245"><a href="index.php" /><b>Room</b><br></td>
    </tr>
    <tr>
        <td id="16" class="room available" value="1246"><a href="index.php" /><b>Room</b><br></td>
        <td id="17" class="room available" value="1247"><a href="index.php" /><b>Room</b><br></td>
        <td id="18" class="room available" value="1248"><a href="index.php" /><b>Room</b><br></td>
        <td id="19" class="room available" value="1249"><a href="index.php" /><b>Room</b><br></td>
        <td id="20" class="room available" value="1250"><a href="index.php" /><b>Room</b><br></td>

    </tr>
    <tr>
        <td id="21" class="room available" value="1251"><a href="index.php" /><b>Room</b><br></td>
        <td id="22" class="room available" value="1252"><a href="index.php" /><b>Room</b><br></td>
        <td id="23" class="room available" value="1253"><a href="index.php" /><b>Room</b><br></td>
        <td id="24" class="room available" value="1254"><a href="index.php" /><b>Room</b><br></td>
        <td id="25" class="room available" value="1255"><a href="index.php" /><b>Room</b><br></td>
    </tr>

    </table>
    
    
</div>
</body>
</html>
































