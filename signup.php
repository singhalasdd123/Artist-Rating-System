<?php
function recurse_copy($src,$dst)
{
	$dir=opendir($src);
	@mkdir($dst);
	while(false!==($file=readdir($dir)))
	{
		if(($file!='.')&&($file!='..'))
		{
			if((is_dir($src.'/'.$file)))
			{
				recurse_copy($src.'/'.$file,$dst.'/'.$file);
			}
			else
			{
				copy($src.'/'.$file,$dst.'/'.$file);
			}
		}
	}
closedir($dir);
}
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) &&isset($_POST['password1']))
	{
	
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])&&!empty($_POST['password1']) )
	{
	echo '<script> alert("fk");</script>';
	require 'connection2.php';
	$email = $_POST['email'];
	$password = $_POST['password'];
 	$password1 = $_POST['password1'];
	$name =$_POST['name'];
	$check=mysqli_query($con,"select * from `registration-table`");
	$flag = 1;
	while($row=mysqli_fetch_assoc($check))
	{
		if($row['email']==$email)
		{
			echo '<script> alert("Email already registered");</script>';
			$flag=2;
			break;
		}
	}
	if($flag===1)
	{
	$p1=md5($password);
	$p2=md5($password1);
	if($p1===$p2)
	{
		echo '<script> alert("2");</script>';
		$stmt = $dbh->prepare("insert into `registration-table`(name,email) VALUES(:nam,:em)");
		$stmt->bindParam(':nam',$name);
		$stmt->bindParam(':em',$email);
		$stmt->execute();
	    $row=mysqli_fetch_assoc($check);
		$stmt = $dbh->prepare("insert into `login-table`(email,password) VALUES(:em,:pa)");
		$stmt->bindParam(':em',$email);
		$stmt->bindParam(':pa',$p1);
		$stmt->execute();
		mkdir("users/".$email,0755);
		recurse_copy("temp/","users/".$email."/");
		header('Location: login.php');
	}
	else
	{
		echo '<script> alert("Password Do not Match");</script>';
    }
	}
}
else
{
	echo '<script> alert("please fill all the details");</script>';
}

}
?>
<!DOCTYPE html>
<html >
<head>
    <style>
	#admin123
	{
	position:fixed;
	top:500px;
	left:1000px;
	}


</style>
 
    <title>Signup </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
	<style>
	body{
   
    background-color: Black;
}

	</style>
  </head>

<body style=" overflow-x: hidden;">
    <div  >
         <div class="col-md-12" style= " margin-left: 62%";>
                <h2><b style="color:red;">PICKERR</b></h2>
            </div>
			<div class="row text-right pad-top"style="position:fixed;left:50px;top:60px;width:700px;">
			<img width="700" height="550" src="img5.jpg"/>
			</div>
         <div >
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="  margin-left: 60%;">
                        <div class="panel panel-default">
                            <div class="panel-heading" //style="background-color:#4B5AF7;">
                        <strong>   Register Yourself </strong>  
                            </div>
                            <div class="panel-body"style="background-color:rgb(221, 226, 226)">
                                <form role="form" action="#" method="POST">
                                <br/>
                                        <div class="form-group input-group">
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                            <input type="text" class="form-control" name="name" placeholder="Your Name" />
                                        </div>
                                
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                                             <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
										</div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                            <input type="password" class="form-control" name="password1" placeholder="Retype Password" />
                                       </div>
										
                                     <input type="submit" name="submit" value="Register Me"/>
                                    <hr />
                                    Already Registered ?  <a href="login.php" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
		</div>
</body>
</html>
