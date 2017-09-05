<!DOCTYPE html>
<html>
<head>
    
</head>

<body>
    <style>
        td{
            background-color: black;
            border: 1px solid black;
            border-radius: 5px;
            height:100px;
            width:250px; 
            color: white;
            text-align: center;
        }
        .occupied{
            background-color: red;
        }
        .upcoming{
            background-color: yellow;
        }
        .available{
            background-color: green;
        }
    
    </style>
    <script>
            function fun() {
            var r_id = document.getElementById('1').value;
            window.location.href = 'index.php?r_id='+r_id;
        };
    </script>
 
           
    <?php
            $connect= mysqli_connect('localhost','root','','ekbooking');
        
            $room=$_GET['r_id'];
            
            //$room= echo "<script> return $('.room').value; </script>";
            //$s_time=$_GET['s_time'];
            //$e_time=$_GET['e_time'];
            
            
            $sql= "select s_time, e_time, date from booking where r_id = '$room';";
            $query=mysqli_query($connect,$sql);
            while($row = mysqli_fetch_assoc($query))
                {
                $start = $row['s_time'];
                $end = $row['e_time'];
                $current = date("h:i:s");


                if($result = $query){

                    for ($i=1; $i<23 ;$i++){

                        if($start <= $current && $current <= $end){
                            $colorClass = "occupied";
                        }

                        else{
                        
                            $colorClass = "available";
                        }
                    }
                }
    }
        
?>
    
       <table>
    <tr>
        <td class="<?php echo $colorClass ?>">
            <button id="1" class="room" value="1" onclick="fun()">Room</button>
        </td>
        <td class="<?php echo $colorClass ?>">
            <button id="2" class="room" value="2" onclick="fun()">Room</button>
        </td>
        
        <td id="3" class="room" value="3">Room</td>
        <td id="4" class="room" value="4">Room</td>
        <td id="5" class="room" value="5">Room</td>
    </tr>
    <tr>
        <td id="1">Room</td>
        <td id="2">Room</td>
        <td id="3">Room</td>
        <td id="4">Room</td>
        <td id="5">Room</td>
    </tr>
    <tr>
        <td id="1">Room</td>
        <td id="2">Room</td>
        <td id="3">Room</td>
        <td id="4">Room</td>
        <td id="5">Room</td>
    </tr>
    <tr>
        <td id="1">Room</td>
        <td id="2">Room</td>
        <td id="3">Room</td>
        <td id="4">Room</td>
        <td id="5">Room</td>
    </tr>
    <tr>
        <td id="1">Room</td>
        <td id="2">Room</td>
        <td id="3">Room</td>
        <td id="4">Room</td>
        <td id="5">Room</td>
    </tr>

    </table>
    
    

</body>
</html>