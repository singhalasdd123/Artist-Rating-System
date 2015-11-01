<?php
	$user="root";
	$pass="";
	$host="localhost";
	$con = mysqli_connect($host,$user,$pass,"pick");
	if(!$con)
	{
		die('Could not connect:'.mysql_error());
	}
	mysqli_select_db($con,"pick");
	$dsn='mysql:dbname=pick;host=127.0.0.1';
	$dbh = new PDO($dsn,$user,$pass);
?>
