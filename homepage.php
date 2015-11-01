<?php
session_start();
if(isset($_SESSION['email']))
{
		require 'connection2.php';
		require 'addimage.php';
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
    background-color: grey;
	overflow-x: hidden;
}
 #yourBtn:hover
  {
	background-color: #ddd;
  }
.msgbar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 15px;
            }
            
            
            
            .msgbar-name a
            {
                display: block;
                height: 100%;
                text-decoration:block;
                color: inherit;
            }
            
            .msgbar-name:hover
            {
                background-color:#e1e2e5;
            }
            
			#yourBtn
{
   position: absolute;
       top: 450px;
	   left:980px;
   font-family: calibri;
   width: 178px;
   padding: 10px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border: 1px dashed #BBB; 
   text-align: center;
   background-color: #fff;
   opacity:0.6;
   cursor:pointer;
  }
  .fileUpload {
	position: relative;
	overflow: hidden;
	margin: 10px;
}
.fileUpload input.upload {
	position: absolute;
	top: 0;
	left: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
	</style>
	<script>
  function getFile1(){
   document.getElementById("upfile1").click();
 }
 function sub1(obj){
    var file2 = obj.value;
    var fileName = file2.split("\\");
	var x=fileName[fileName.legth-1];
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm1.submit();
    event.preventDefault();
  } 
	</script>
  </head>

  <body >
	<!--- left Side container--->   
	   <div class="sab-kuch-in-left"style="z-index:0">
     <div>
      <h2>
	  <b>
	  <?php
		$check=mysqli_query($con,"select * from `registration-table` where email='$email'");
		$row=mysqli_fetch_assoc($check);
		echo 'welcome ';
		echo $row['name'];
	  ?></b>
	  </h2>   
		<img src= "<?php  $email=$_SESSION['email'];echo "users\\".$email."\\profilepic.jpg"; ?>"
		class="img-rounded" alt="image not loaded" width="180" height="200"/>
		<div style="padding:30px ;">
		<button type="button" class="btn btn-default " value ="ADD ARTIST" style="width:120px;"><a href="add_artist.php">ADD ARTSIST</a></button>
		</div>
      </div>
	  
    </div>
	  <div >
	 <form action="#" method="POST" enctype="multipart/form-data" name="myForm1">
	 <div id="yourBtn" onclick="getFile1()">upload<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
	 <h><b >change your profile picture</b></h></div>
	 <div style="height: 0px;width: 0px; overflow:hidden;"><input id="upfile1" type="file" name ="file1" value="upload1" onchange="sub1(this)"/></div>
	 </form>
	  </div>
	  
	<!--- Center block---> 
		<div class="center-block"> 
				<h><b>ALL USERS</b></h>
			   <div class="panel panel-default" style="padding:20px 0px;">
			   
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
						$check2=mysqli_query($con,"select * from `artist-table`");
						while($row2=mysqli_fetch_assoc($check2))
						{
							$e=$row2['email1'];
							$n=$row2['name1'];
							$p=$row2['path'];
							$v1=$row2['stage_presence'];
							$v2=$row2['e_o_s'];
							$v3=$row2['audience_engagement'];
							$v4=$row2['performance'];
							$c1=$row2['count1'];
							$c2=$row2['count2'];
							$c3=$row2['count3'];
							$c4=$row2['count4'];
							echo
							'<div>
							<div class="msgbar-name">
							<img width="150" height="150" src= "'.$p.'"/>
							<span>
							<span><b>'.$n.' </b>&nbsp;&nbsp;</span>
							<span><b>'.$e.'</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span><a href="rating.php?search='.$e.'""><b style="color:blue;">RATE ME</b></a></span>
							</span>				
							</div>
							<div>
							<label><b style="padding:0px 125px;">Stage Presence</b></label>&nbsp;<h><b style="color:red;">AVG=</b></h><span id="r1">'.$v1.'
							</span>&nbsp;&nbsp;<h><b style="color:blue;">USER+</b></h><span id="p1">'.$c1.'</span>
							<label><b style="padding:0px 120px;">Energy On Stage</b></label>&nbsp;<h><b style="color:red;">AVG=</b></h><span id="r1">'.$v2.'
							</span>&nbsp;&nbsp;<h><b style="color:blue;">USER+</b></h><span id="p1">'.$c2.'</span>
							<label><b style="padding:0px 100px;">Audience Management</b></label>&nbsp;<h><b style="color:red;">AVG=</b></h><span id="r1">'.$v3.'
							</span>&nbsp;&nbsp;<h><b style="color:blue;">USER+</b></h><span id="p1">'.$c3.'</span>
							<label><b style="padding:0px 135px;">Performance</b></label>&nbsp;<h><b style="color:red;">AVG=</b></h><span id="r1">'.$v4.'
							</span>&nbsp;&nbsp;<h><b style="color:blue;">USER+</b></h><span id="p1">'.$c4.'</span>
							</div>
							</div>' ;
						}
				   }
				   ?>
			   </div>
                			   
               
		</div>
		<div class="right-block" style="padding:10px 700px;">
		
		<div class="btn-group">
		
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="padding:0px 15px;">
         MANAGE ACCOUNT <span class="glyphicon glyphicon-wrench"></span><span class="caret"></span></button>
		  <ul class="dropdown-menu" role="menu">
          <li><a href="rated.php">MY RATED ARTIST</a></li>
          <li><a href="mid_logout.php">LOGOUT</a></li>
        </ul>
        </div>	
		</div>
		<!---- right side division --->
	  
	<!----Message BOX --->
      
	<!--- ---->
	
	<script src="dist/js/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min1.js"></script>
  </body>
</html>
