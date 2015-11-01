<?php
session_start();

if(isset($_SESSION['email']))
{
	header('Location: homepage.php');
}
else
{
if (isset($_POST['email']) && isset($_POST['password']))
{
	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		require 'connection2.php';
		$email = $_POST['email'];
		$password = $_POST['password'];
		$p=md5($password);
		//$md5_password = md5($password);
		$flag=1;
		$check=mysqli_query($con,"select * from `login-table` where email='$email' and password= '$p'");
		while($row=mysqli_fetch_assoc($check))
		{
			if($row['password']==$p && $row['email']==$email)
			{
				$flag=2;
			}
		}
		if($flag==2)
		{	
			$row=mysqli_fetch_assoc($check);
			$_SESSION['email'] = $email;
			header("Location: homepage.php");
		}
	}
	else
	{
		echo '<script> alert("please fill all the details");</script>';
	}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
	#admin123
	{
	position:fixed;
	top:500px;
	left:1000px;
	}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <style>
body{
    background-image: url("img1.jpg");
    background-color: #cccccc;
}
</style>
 
    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="docs/assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body >

    <div class="container">

      <form class="form-signin" role="form" action="#" method="POST">
        		<h1>PICKERR <small></small></h1>
		<label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<br>
		<div>
         <a href="signup.php"style="color:black;padding:0px 50px" align ="center"><b style="color:red;">Not Member?Register Here</b></a>
		 </div>
		 <div>
         <a href="add_artist.php"style="color:black;padding:0px 100px" align ="center"><b style="color:red;">ADD ARTIST</b></a>
		 </div>
      </form>

    </div>
  </body>
</html>
