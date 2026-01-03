<?php
require_once("../connection.php");
session_start();
 if(isset($_POST['Login']))
 {
	
 	if(empty($_POST['name'])){
 		header("location:admin_login.php?Empty=please fill in the blanks");
 	}
 	else{
		date_default_timezone_set('Asia/Dhaka');
		$end_time=$_SESSION['admin_et'];
		$current_time=date("h:i:sa");
		if($current_time<=$end_time){
			$q1="select * from pass where email='".$_SESSION['admin_email']."' and code='".$_POST['name']."'";
            $r1=mysqli_query($con,$q1);
            $row1=mysqli_num_rows($r1);
			if($row1>0){
				$query="select * from admin where name='admin' and PASSWORD='admin'";
				$result=mysqli_query($con, $query);
				if(mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$_SESSION['user']=$row['name'];
					$_SESSION['pass']=$row['PASSWORD'];
					header("location:admin_home.php");
				}
				else{
					header("location:../index.php?Invalid=No admin found.Please check with NSU IT.");
				}
			}
			else{
				header("location:admin_login.php?invalid=The code you've given is incorrect");
			}
		}
		else{
			header("location:../index.php?Invalid=Your OTP code has expired, try again.");
		}
 		
 	}
 	
 }
 else{
 	header("location:../index.php");
 }
?>