<?php
	
	$con=mysqli_connect("localhost","root","","booking");
	
	$username= $_POST["user"];
	$new_pass= $_POST["npass"];
	$con_pass= $_POST["cpass"];
	
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="UPDATE admin SET password = '$new_pass' WHERE username = '$username'";
	
	
	if($new_pass == $con_pass)
		{
			if($result=mysqli_query($con,$sql))
				{
					echo "Password Updated!";
				}
		}
		 		
	mysqli_close($con);
	
?>