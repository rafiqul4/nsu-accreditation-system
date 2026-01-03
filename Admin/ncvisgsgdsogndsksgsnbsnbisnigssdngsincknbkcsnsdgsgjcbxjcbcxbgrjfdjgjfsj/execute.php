<?php
require_once("../../connection.php");
session_start();
 if(isset($_POST['Login']))
 {
	
 	if(empty($_POST['name'])){
		$_SESSION['uerror']="please fill in the blanks";
 		header("location:admin_login.php");
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
				$query="select * from admin where name='$_SESSION[u]'";
				$result=mysqli_query($con, $query);
				if(mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$_SESSION['admin']=$row['name'];
					$_SESSION['admin_pass']=$_SESSION['p'];
					header("location:../admin_home");
				}
				else{
					$_SESSION['uerror']="No admin found.Please contact with NSU IT.";
					header("location:index");
				}
			}
			else{
				$_SESSION['uerror']="The code you've given is incorrect";
				header("location:code");
			}
		}
		else{
			$_SESSION['uerror']="Your OTP code has expired, try again.";
			header("location:index");
		}
 		
 	}
 	
 }
 else{
 	header("location:index");
 }
?>