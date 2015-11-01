<?php
session_start();
if(isset($_SESSION['email']))
{
		$e2=$_SESSION['email'];
		echo'<script>alert("hii");</script>';
        $em = $_GET['name'];
		$v1=$_GET['id1'];
		$v2=$_GET['id2'];
		$v3=$_GET['id3'];
		$v4=$_GET['id4'];
		
		$r1=$_GET['a1'];
		$r2=$_GET['a2'];
		$r3=$_GET['a3'];
		$r4=$_GET['a4'];
		
		echo'<script>alert("'.$r1.'");</script>';
		echo'<script>alert("'.$r2.'");</script>';
		echo'<script>alert("'.$r3.'");</script>';
		echo'<script>alert("'.$r4.'");</script>';
		
		require 'connection2.php';
		$check=mysqli_query($con,"select * from `artist-table` where email1='$em'");
		$row=mysqli_fetch_assoc($check);
		$var1=$row['stage_presence'];
		$c1=$row['count1'];
		$var2=$row['e_o_s'];
		$c2=$row['count2'];
		$var3=$row['audience_engagement'];
		$c3=$row['count3'];
		$var4=$row['performance'];
		$c4=$row['count4'];
		
		
		$check=mysqli_query($con,"select * from `rated-table` where email2='$em' and email1='$e2'");
		$row=mysqli_fetch_assoc($check);
		$p1=$row['par1'];
		$p2=$row['par2'];
		$p3=$row['par3'];
		$p4=$row['par4'];
		$f1=$row['vis1'];
		$f2=$row['vis2'];
		$f3=$row['vis3'];
		$f4=$row['vis4'];
		echo'<script>alert("'.$p1.'");</script>';
		echo'<script>alert("'.$p2.'");</script>';
		echo'<script>alert("'.$p3.'");</script>';
		echo'<script>alert("'.$p4.'");</script>';
		
		if($f1==NULL)
		{
			$c1=$c1+1;
			$f1=1;
		}
		$stmt = $dbh->prepare("UPDATE `rated-table` SET vis1=:nam WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':nam',$f1);
					$stmt->execute();
			$stmt = $dbh->prepare("UPDATE `rated-table` SET par1=:na WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':na',$r1);
					$stmt->execute();
		
		$stmt = $dbh->prepare("UPDATE `artist-table` SET count1=:nam WHERE email1='$em'");
		$stmt->bindParam(':nam',$c1);
		$stmt->execute();
		$stmt = $dbh->prepare("UPDATE `artist-table` SET stage_presence=:na WHERE email1='$em'");
		$stmt->bindParam(':na',$v1);
		$stmt->execute();
	
		if($f2==NULL)
		{
			$c2=$c2+1;
			$f2=1;
			
		}
		$stmt = $dbh->prepare("UPDATE `rated-table` SET vis2=:nam WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':nam',$f2);
					$stmt->execute();
			$stmt = $dbh->prepare("UPDATE `rated-table` SET par2=:na WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':na',$r2);
					$stmt->execute();
					
		$stmt = $dbh->prepare("UPDATE `artist-table` SET count2=:nam WHERE email1='$em'");
		$stmt->bindParam(':nam',$c2);
		$stmt->execute();
		$stmt = $dbh->prepare("UPDATE `artist-table` SET e_o_s=:na WHERE email1='$em'");
		$stmt->bindParam(':na',$v2);
		$stmt->execute();

		if($f3==NULL)
		{
			$c3=$c3+1;
			$f3=1;
		}
		$stmt = $dbh->prepare("UPDATE `rated-table` SET vis3=:nam WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':nam',$f3);
					$stmt->execute();
			$stmt = $dbh->prepare("UPDATE `rated-table` SET par3=:na WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':na',$r3);
					$stmt->execute();
		
		$stmt = $dbh->prepare("UPDATE `artist-table` SET count3=:nam WHERE email1='$em'");
		$stmt->bindParam(':nam',$c3);
		$stmt->execute();
		$stmt = $dbh->prepare("UPDATE `artist-table` SET audience_engagement=:na WHERE email1='$em'");
		$stmt->bindParam(':na',$v3);
		$stmt->execute();

		if($f4==NULL)
		{
			$c4=$c4+1;
			$f4=1;
		}
		$stmt = $dbh->prepare("UPDATE `rated-table` SET vis4=:nam WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':nam',$f4);
					$stmt->execute();
			$stmt = $dbh->prepare("UPDATE `rated-table` SET par4=:na WHERE email2='$em' and email1='$e2'");
					$stmt->bindParam(':na',$r4);
					$stmt->execute();
					
		$stmt = $dbh->prepare("UPDATE `artist-table` SET count4=:nam WHERE email1='$em'");
		$stmt->bindParam(':nam',$c4);
		$stmt->execute();
		$stmt = $dbh->prepare("UPDATE `artist-table` SET performance=:na WHERE email1='$em'");
		$stmt->bindParam(':na',$v4);
		$stmt->execute();
		
		echo $v1;
}
else
{
	header('Location: login.php');
}
?>
