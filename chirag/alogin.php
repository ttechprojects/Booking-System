<?php
	//Create connection
	$con=mysqli_connect("localhost","?","?","admin");
	
	//Fetch variables from the URL
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//Check connection
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "SELECT password FROM admin WHERE username = '$username'";

	if ($result = mysqli_query($con, $sql))
		{
			while($row = $result->fetch_object())
				{
	    			if($row == $password)
	    				{
	    					echo "Login Successful!";
	    				}
	    		}
		}
	
	mysqli_close($con);
?>