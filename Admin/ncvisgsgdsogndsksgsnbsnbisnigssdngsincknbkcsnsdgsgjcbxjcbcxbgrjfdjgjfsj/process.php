<?php
require_once("../../connection.php");
session_start();
 if(isset($_POST['Login'])){
	$secret="6LckvSopAAAAAGIja4Tg5t1A8vX40ATWFzkooFTO";
	$token=$_POST['g-token'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$token."&remoteip=".$ip;
	$request=file_get_contents($url);
	$response=json_decode($request);

	if($response->success=== true && $response->score >= 0.5){
		date_default_timezone_set('Asia/Dhaka');
		$_POST['initial']= mysqli_real_escape_string($con,$_POST['initial']);
		$_POST['password']= mysqli_real_escape_string($con,$_POST['password']);
		if(empty($_POST['initial'])||empty($_POST['password'])){
			$_SESSION['uerror']='please fill in the blanks';
			header("location:index");
		}
		else{
			$aq="select * from admin_acess where name='".$_POST['initial']."'";
			$ar=mysqli_query($con,$aq);
            $sql="select * from admin where name='".$_POST['initial']."' and name!='admin'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($ar)>0){
				$pass=$_POST['password'];
				$row = mysqli_fetch_assoc($ar);
				$enc_pass = $row['PASSWORD'];
				if(password_verify($pass, $enc_pass)){
					$_SESSION['special']='true';
					$_SESSION['u']=$_POST['initial'];
					$_SESSION['p']=$_POST['password'];
					$email = $row['email'];
					$random_number = random_int(100000, 999999);
					$current_time=date("h:i:sa");
					$end_time = date("h:i:sa", strtotime("+10 minutes"));
					$query1="select * from pass where email='$email'";
					$result1=mysqli_query($con,$query1);
					$row1=mysqli_num_rows($result1);
					if($row1==0){
						$query2="INSERT INTO pass(email,code,start_time,end_time)
						Values('$email',$random_number,'$current_time','$end_time') ";
						$result2=mysqli_query($con,$query2);
						if($result2){
							$_SESSION['admin_email']=$email;
							$_SESSION['admin_code']=$random_number;
							$_SESSION['admin_st']=$current_time;
							$_SESSION['admin_et']=$end_time;
							header("location:../../PHPMailer/admin_mail");
						}
					}
					else{
						$query3="UPDATE pass SET code = $random_number, start_time = '$current_time', end_time='$end_time' WHERE email='$email'";
						$result3=mysqli_query($con,$query3);
						if($result3){
							$_SESSION['admin_email']=$email;
							$_SESSION['admin_code']=$random_number;
							$_SESSION['admin_st']=$current_time;
							$_SESSION['admin_et']=$end_time;
							header("location:../../PHPMailer/admin_mail");
						}
					}
				}
				else{
					$_SESSION['uerror']='Invalid Information, try again';
					header("location:index.php");
				}
			}
            else if(mysqli_num_rows($result)>0){
				$pass=$_POST['password'];
				$query="SELECT * FROM faculty where initial='".$_POST['initial']."'";
				$res=mysqli_query($con,$query);
                $row_fac=mysqli_fetch_assoc($res);
				$enc_pass = $row_fac['PASSWORD'];
				$initial = $row_fac['initial'];
				if(password_verify($pass, $enc_pass)){
					$_SESSION['u']=$initial;
					$_SESSION['p']=$_POST['password'];
					$email = $row_fac['email'];
					$random_number = random_int(100000, 999999);
					$current_time=date("h:i:sa");
					$end_time = date("h:i:sa", strtotime("+10 minutes"));
					$query1="select * from pass where email='$email'";
					$result1=mysqli_query($con,$query1);
					$row1=mysqli_num_rows($result1);
					if($row1==0){
						$query2="INSERT INTO pass(email,code,start_time,end_time)
						Values('$email',$random_number,'$current_time','$end_time') ";
						$result2=mysqli_query($con,$query2);
						if($result2){
							$_SESSION['admin_email']=$email;
							$_SESSION['admin_code']=$random_number;
							$_SESSION['admin_st']=$current_time;
							$_SESSION['admin_et']=$end_time;
							header("location:../../PHPMailer/admin_mail");
						}
					}
					else{
						$query3="UPDATE pass SET code = $random_number, start_time = '$current_time', end_time='$end_time' WHERE email='$email'";
						$result3=mysqli_query($con,$query3);
						if($result3){
							$_SESSION['admin_email']=$email;
							$_SESSION['admin_code']=$random_number;
							$_SESSION['admin_st']=$current_time;
							$_SESSION['admin_et']=$end_time;
							header("location:../../PHPMailer/admin_mail");
						}
					}
				}
                else{
					$_SESSION['uerror']='Invalid Information, try again';
					header("location:index.php");
				}
            }
            else{
                $_SESSION['uerror']='Invalid Information, try again';
                header("location:index.php");
            }
        }
    }
    else{
		$_SESSION['uerror']='Captcha Validation Failed';
		header("location:index");
	}
}
else{
   $_SESSION['uerror']='You are not allowed to that';
    header("location:index");;
}
?>