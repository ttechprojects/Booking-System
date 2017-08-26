<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="color.css">
    </head>
    <body>
    <form method="post" action="auth.php" >
        <img id="logo" src="images/Emirates_logo.svg.png">
        <input type="text" name="username" placeholder="Username" class="input">
        <input type="password" name="password" placeholder="Password" class="input"><br><br><br>
        <a href="forgotpwd.php">Forgot Password?</a><br>
        <input type="submit" name="Submit" class="button">
        <div style="text-align:center; font-family:helvetica;"> 
        <?php 
            session_start();
            if(isset($_SESSION['Message']))
            {
                $string= $_SESSION['Message'];
                echo $string;
                unset($_SESSION['Message']);
            }
            ?>
        </div>
    </form>
    </body>

</html>