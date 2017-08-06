<?php
	//Create connection
	$con=mysqli_connect("localhost","root","","booking");
	
	//Fetch variables from the URL
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//Check connection
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql = "SELECT username,password FROM users;";
    
	if ($result = mysqli_query($con, $sql))
		{
            echo mysqli_num_rows($result);
			while($row = mysqli_fetch_assoc($result))
				{ 
                    
	    			if($row['password'] == $password && $row['username']==$username)
	    				{
	    					session_start();
	    					$_SESSION['Login']=$row['username'];
	    					header("Location:http://localhost/Project/form.php");
	    				}
                    else
                    	{
                        session_start();
                        $_SESSION['Message']="Login Unsuccessful";
                        header("Location:http://localhost/Project/login.php");
                        
                    	}
	    		}
            mysqli_free_result($result);
		}
    else
    {
        echo "Username invalid. Please enter a valid username";
    }
	
	mysqli_close($con);
?>