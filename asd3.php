<?php
if(isset($_POST['email1']) &&isset($_POST['name1']))
{
	if(!empty($_POST['name1'])&& !empty($_POST['email1']))
	{ 
	if(isset($_FILES['file5']['name']))
	{
	if(!empty($_FILES['file5']['name']))
	{
	require 'connection2.php';
	$name = $_FILES['file5']['name'];
	$extension =strtolower(substr($name,strpos($name,'.')+1));
	$type = $_FILES['file5']['type'];
	$tmp_name = $_FILES['file5']['tmp_name'];
	if(($extension=="jpeg" || $extension=="png" || $extension=="jpg" ||$extension=="gif" ))
	{
		$n=$_POST['name1'];
		$e=$_POST['email1'];
		
		$name = $e.'.jpg';
		$location = "artist/".$name;
		if(move_uploaded_file($tmp_name,$location))
		{
			$f=1;
			$check2=mysqli_query($con,"select * from `artist-table`");
						while($row2=mysqli_fetch_assoc($check2))
						{
							if($e==$row2['email1'])
								$f=2;
						}
			if($f==2)
			{
			$stmt = $dbh->prepare("insert into `artist-table` (email1,name1,path) VALUES(:s,:u,:l)");	
			$stmt->bindParam(':s',$e);
			$stmt->bindParam(':u',$n);
			$stmt->bindParam(':l',$location);
			$stmt->execute();
			}
			else
			{
				echo'<script>alert("Artist Alreday Registered");</script>';
			}
		}
	}
	}
}	
else
{
echo'<script>alert(Give me your Photo);</script>';
}
}
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
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  
<style>
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
.msgbar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .msgbar-name span
            {
                padding-left: 5px;
            }
            
            .msgbar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            .msgbar-name:hover
            {
                background-color:#e1e2e5;
            }
            
            .msgbar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }

#yourBtn
{
   position: absolute;
       top: 264px;
	   left:13px;
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
  #yourcvrBtn
{
   position: absolute;
       top: 83px;
	   left:913px;
   font-family: calibri;
   width: 150px;
   padding: 10px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border: 1px dashed #BBB; 
   text-align: center;
   background-color: #fff;
   opacity:0.6;
   
   cursor:pointer;
  }
  #yourcvrBtn:hover
  {
	background-color: #ddd;
  }
  #yourBtn:hover
  {
	background-color: #ddd;
  }
</style>
<script type="text/javascript">
  function getFile(){
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file2 = obj.value;
    var fileName = file2.split("\\");
	var x=fileName[fileName.legth-1];
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm3.submit();
    event.preventDefault();
  }
  function getFile1(){
   document.getElementById("upfile1").click();
 }
 function sub1(obj){
    var file2 = obj.value;
    var fileName = file2.split("\\");
	var x=fileName[fileName.legth-1];
    document.getElementById("yourcvrBtn").innerHTML = fileName[fileName.length-1];
    document.myForm1.submit();
    event.preventDefault();
  } 
</script>

<style>

body{
    background-image: url("theme.jpg");
    background-color: #cccccc;
}
 .updtae_status-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .updtae_status span
            {
                padding-left: 5px;
            }
            .updtae_status-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            
            .updtae_status-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }

</style>

  
  
  </head>

  <body>
 
	  
	<!--- Center block---> 
		<div class="center-block" >  
					<div>
					<h><b>To add artist you have to give photo of the artist.</b></h>
					<h><b>To submit photo you have to click first "Add image" button and then click "POST" button</b></h>
					</div>		
			  <div class="panel panel-default">
					<form role="form" action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
        	  	    <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                    <b>ADD ARTISTS <i>
					<div style="padding:5px 0px;" >
				     <input type="text" class="form-control" name="name1" placeholder="Artist Name" />
					 <input type="text" class="form-control" name="email1" placeholder="Artist Email" />
					</div>
					<div class="fileUpload btn btn-primary">
					<span>ADD IMAGE</span><span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
					<input id="upfile" type="file" class="upload" name="file5" />
					</div>
					<button class="btn btn-primary" style="width:70px;" type="submit" name="post_status">POST
					</button>
      			    </div>
				    </form>
					</div>
		           
                			   
           <a href="homepage.php" align="center"><b>GO BACK</b></a>   
		</div>
  </body>
</html>
