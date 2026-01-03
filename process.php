<?php
require_once("connection.php");
session_start();
 if(isset($_POST['Login']))
 {
 	if(empty($_POST['initial'])||empty($_POST['password'])){
 		header("location:index.php?Empty=please fill in the blanks");
 	}
 	else{
		$aq="select * from admin_acess where name='".$_POST['initial']."' and PASSWORD='".$_POST['password']."' ";
		$ar=mysqli_query($con,$aq);
		if(mysqli_fetch_assoc($ar)){
			$_SESSION['u']=$_POST['initial'];
			$_SESSION['p']=$pass;
			header("location:./Admin/admin_login.php");
		}
		else{
		$pass=md5($_POST['password']);
 		$query="select * from faculty where initial='".$_POST['initial']."' and PASSWORD='$pass'";
 		$result=mysqli_query($con, $query);
 		if(mysqli_fetch_assoc($result)){
			$q2="select * from department where c_initial='".$_POST['initial']."'";
			$r2=mysqli_query($con, $q2);
			$q3="select * from course where coordinator='".$_POST['initial']."'";
			$r3=mysqli_query($con, $q3);
			if(mysqli_fetch_assoc($r2)){
				$_SESSION['user']=$_POST['initial'];
				$_SESSION['pass']=$pass;
				header("location:./chairman/C_Home.php");
			}
			else if(mysqli_fetch_assoc($r3)){
				$_SESSION['user']=$_POST['initial'];
				$_SESSION['pass']=$pass;
				header("location:./coordinator/Home.php");
			}
			else{
				$_SESSION['user']=$_POST['initial'];
				$_SESSION['pass']=$pass;
				header("location:./Faculty/home.php");
			}
 		}
 		else{
 			header("location:index.php?Invalid=Invalid information,try again");
 		}
 		}
	}
 	
 }
 else{
 	echo 'not working';
 }
?>