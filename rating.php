<?php
session_start();
if(isset($_SESSION['email']))
{
		require 'connection2.php';
		$email1 = $_SESSION['email'];
		$email2=$_GET['search'];
		$f=1;
		$check=mysqli_query($con,"select * from `rated-table` where email1='$email1'");
		while($row=mysqli_fetch_assoc($check))
		{
			$e=$row['email2'];
			if($e==$email2)
			{
			 $f=2;
			}
		}
		if($f==1)
		{
		$stmt = $dbh->prepare("insert into `rated-table`(email1,email2) VALUES(:e1,:e2)");
		$stmt->bindParam(':e1',$email1);
		$stmt->bindParam(':e2',$email2);
		$stmt->execute();
		}
}
else
{
	header('Location: login.php');
}
?>
<html>
<head>
<style>
body{
    background-image: url("theme.jpg");
    background-color: #cccccc;
	overflow-x: hidden;
}
</style>
<link href="slider_control.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
<script>
$(function()
{
	var r1 = $('#r1');
	$('#slider1').change(function()
	{
		r1.html(this.value);
		var id = this.value;
		var v=1;
		var name = this.name;
		$.ajax({
			type: "GET",
			url: "./calc_avg.php",
			data: 'name='+id+'&artist='+name+'&value='+v,
			cache: false,
			success: function(data){
					$('#p1').html(data);
			}
		});
	});	
	$('#slider1').change();
});


$(function()
{
	var r2 = $('#r2');
	$('#slider2').change(function()
	{
		r2.html(this.value);
		var v=2;
		var id = this.value;
		var name = this.name;
		$.ajax({
			type: "GET",
			url: "./calc_avg.php",
			data: 'name='+id+'&artist='+name+'&value='+v,
			cache: false,
			success: function(data){
					$('#p2').html(data);
			}
		});
	});	
	$('#slider2').change();
});


$(function()
{
	var r3 = $('#r3');
	$('#slider3').change(function()
	{
		r3.html(this.value);
		var v=3;
		var id = this.value;
		var name = this.name;
		$.ajax({
			type: "GET",
			url: "./calc_avg.php",
			data: 'name='+id+'&artist='+name+'&value='+v,
			cache: false,
			success: function(data){
					$('#p3').html(data);
			}
		});
	});	
	$('#slider3').change();
});

$(function()
{
	var r4 = $('#r4');
	$('#slider4').change(function()
	{
		r4.html(this.value);
		var v=4;
		var id = this.value;
		var name = this.name;
		$.ajax({
			type: "GET",
			url: "./calc_avg.php",
			data: 'name='+id+'&artist='+name+'&value='+v,
			cache: false,
			success: function(data){
					$('#p4').html(data);
			}
		});
	});	
	$('#slider4').change();
});

function myFunction() 
{
    
	var str1=document.getElementById("p1").innerHTML;
	var str2=document.getElementById("p2").innerHTML;
	var str3=document.getElementById("p3").innerHTML;
	var str4=document.getElementById("p4").innerHTML;
	var v1=document.getElementById("r1").innerHTML;
	var v2=document.getElementById("r2").innerHTML;
	var v3=document.getElementById("r3").innerHTML;
	var v4=document.getElementById("r4").innerHTML;
	
	var name=document.getElementById("btn").name;
	
	var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
			document.getElementById("p1").innerHTML=xmlhttp.responseText;
			document.getElementById("12").style.display="block";
        }
    }

    xmlhttp.open("GET","update.php?id1="+str1+"&id2="+str2+"&id3="+str3+"&id4="+str4+"&name="+name+"&a1="+v1+"&a2="+v2+"&a3="+v3+"&a4="+v4,true);
    xmlhttp.send();
}
</script>
 
</head>
<body>
<div class="sab-kuch-in-left"style="z-index:0">
     <div >
		<img src= "<?php  $s=$_GET['search'];
		$s=$_GET['search'];
		require 'connection2.php';
		$check=mysqli_query($con,"select * from `artist-table` where email1='$s'");
		$row=mysqli_fetch_assoc($check);
		$p=$row['path'];
		echo $p; ?>"
		class="img-rounded" alt="image not loaded" width="180" height="200"/>
      </div>
    </div>
	<h2 align="center">	  <?php
		$s=$_GET['search'];
		require 'connection2.php';
		$check=mysqli_query($con,"select * from `artist-table` where email1='$s'");
		$row=mysqli_fetch_assoc($check);
		echo $row['name1'];
	  ?>
	  </h2>

<div class="center-block"style="padding:0px 20px;">  	                           
<div class="panel panel-default">
<form>   
<label><b>Stage Presence</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="slider1" type="range" name="<?php $e=$_GET['search']; echo $e;?>" min="0" max="10" step="0.1" value="0">&nbsp;&nbsp;<h><b>value=</b></h><span id="r1">
</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h><b>AVG=</b></h><span id="p1"></span>
<br>
<br>
<label><b>Energy On Stage</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="slider2" type="range" name="<?php $e=$_GET['search']; echo $e;?>" min="0" max="10" step="0.1" value="0">&nbsp;&nbsp;<h><b>value=</b></h><span id="r2"></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h><b>AVG=</b></h><span id="p2"></span>
<br>
<br>
<label><b>Audience Management</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="slider3" type="range" name="<?php $e=$_GET['search']; echo $e;?>" min="0" max="10" step="0.1" value="0">&nbsp;&nbsp;<h><b>value=</b></h><span id="r3"></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h><b>AVG=</b></h><span id="p3"></span>
<br>
<br>
<label><b>Performance</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input id="slider4" type="range" name="<?php $e=$_GET['search']; echo $e;?>" min="0" max="10" step="0.1" value="0">&nbsp;&nbsp;<h><b>value=</b></h><span id="r4"></span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h><b>AVG=</b></h><span id="p4"></span>
<br>
<br>
</form>

</div>
<div id="12" style="display:none;">
<H><b style="color:red;">SUCESSFULLY RATED</b></h>
<br><br>
</div>
<a href="homepage.php"><h><b>GO BACK</b></h></a>
</div>
<div style ="padding:0px 350px;">
 <button type="button" id="btn" name="<?php $e=$_GET['search']; echo $e;?>" onclick="myFunction()">DONE</button>
</div>
</body>
</html>
