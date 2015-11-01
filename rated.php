<?php
session_start();
if(isset($_SESSION['email']))
{
		require 'connection2.php';
		$email = $_SESSION['email'];
		$check=mysqli_query($con,"select * from `registration-table` where email='$email'");
		$row=mysqli_fetch_assoc($check);
}
else
{
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PICKERR</title>
     <link href="dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="dist/css/kmessage.css" rel="stylesheet">
     <script src="js/jquery.js"></script>
	<script src="js/textEffect.jquery.js"></script>
    <style>
	body{
    background-image: url("theme.jpg");
    background-color: #cccccc;
	overflow-x: hidden;
}
	</style>
  </head>

  <body>
   <div class="container" id="fullscreen" style="z-index:0">
	<!--- left Side container--->   
	   <div class="sab-kuch-in-left"style="z-index:0">
     <div>
      <h2>
	  <?php
		$check=mysqli_query($con,"select * from `registration-table` where email='$email'");
		$row=mysqli_fetch_assoc($check);
		echo 'welcome ';
		echo $row['name'];
	  ?>
	  </h2>   
      </div>
    </div>
	<!--- Center block---> 
		<div class="center-block"style="z-index:0">
				<h style="font-size:20px;"><b>YOUR RATED ARTISTS</b></h>
			   <div class="panel panel-default">
			   
		           <?php
				   require 'connection2.php';
				   $check=mysqli_query($con,"select count(email1) as counter from `artist-table`");
				   $counter=mysqli_fetch_assoc($check);
				   $c=$counter['counter'];
				   if($c==0)
				   {
				   echo'It seems that there is no artist in the database .
				   please provide me some artist to rate them.';
				   echo'&nbsp;&nbsp;&nbsp;&nbsp;
				   <a href="add_artist.php">
                    <button class="btn btn-primary" style="width:150px;" type="submit" name="post_status">ADD ARTIST
					</button>
                    </a>';
				   }
				   else
				   {
						require 'connection2.php';
						$check2=mysqli_query($con,"select * from `rated-table`");
						while($row2=mysqli_fetch_assoc($check2))
						{
							$e1=$row2['email1'];
							$e2=$row2['email2'];
							if($e1==$email)
							{
								$check3=mysqli_query($con,"select * from `artist-table` where email1='$e2'");
								$row3=mysqli_fetch_assoc($check3);
								$p=$row3['path'];
								$e=$e2;
								$n=$row3['name1'];
								echo
								'<div class="msgbar-name">
								<img width="150" height="150" src= "'.$p.'"/>
								<span>
								<span><b>'.$n.' </b>&nbsp;&nbsp;</span>
								<span><b>'.$e.'</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span><a href="rating.php?search='.$e.'"">RATE ME</a></span>
								</span>				
								</div>' ;
							}
							else if($e2==$email)
							{
							$check3=mysqli_query($con,"select * from `artist-table` where email1='$e1'");
								$row3=mysqli_fetch_assoc($check3);
								$p=$row3['path'];
								$e=$e1;
								$n=$row3['name1'];
								echo
								'<div class="msgbar-name">
								<img width="150" height="150" src= "'.$p.'"/>
								<span>
								<span><b>'.$n.' </b>&nbsp;&nbsp;</span>
								<span><b>'.$e.'</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span><a href="rating.php?search='.$e.'"">RATE ME</a></span>
								</span>				
								</div>' ;
							
							}
						}
				   }
				   ?>
			   </div>
                			   
               
		</div>
		<div class="right-block" style="padding:10px 850px;">
		<div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="padding:0px 15px;">
        MANAGE ACCOUNT <span class="glyphicon glyphicon-wrench"></span><span class="caret"></span></button>
		  <ul class="dropdown-menu" role="menu">
		  <li><a href="homepage.php">HOMEPAGE</a></li>
          <li><a href="rated.php">MY RATED ARTIST</a></li>
          <li><a href="mid_logout.php">LOGOUT</a></li>
        </ul>
        </div>	
		</div>
		</div>
		<!---- right side division --->
	  
	<!----Message BOX --->
      
	<!--- ---->
	
	<script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min1.js"></script>
  </body>
</html>
