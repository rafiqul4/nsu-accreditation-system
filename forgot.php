<html>
<head>
<link rel='shortcut icon' type='x-icon' href='Images/mini.png'>
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
    <body>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
            <center>
            <form method='POST'>
                <table>
                    <tr><th colspan="2"><div><h2 class='lev'>Forgot Password</h2></div><th></tr>
                    <tr><td colspan="2"> <?php if(@$_GET['no']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['no']?> </div> <?php } ?> 
                    <?php if(@$_GET['error']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['error']?> </div> <?php } ?>
                    <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['empty']?> </div> <?php } ?>
                    <?php if(@$_GET['time']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['time']?> </div> <?php } ?><td></tr>
                    <tr><td colspan="2"><div class='lev'>Please enter your email address</div></td></tr>   
                    <tr><td colspan="2"><br><td>
                    <tr><td colspan="2"><div><input class="dn w-100" type="email" name="email" maxlength="50" Placeholder='Email Address' pattern=".+@northsouth.edu" required></div><br></td></tr></div>
                    <tr><td><div><input class='aback shadow-lg lab' type="submit" value="search" name="ok"></div></td>
                    <td><button class='aback shadow-lg'><a class ='lab' href="index.php">Cancel</a></button></td></tr>
                    </form>
                </table>
            </center>
        </div>
        <?php
        require_once("connection.php");
        session_start();
        if(isset($_POST['ok'])){
            if(empty($_POST['email'])){
                header("location:forget.php?empty=Please enter your email");
            }
            else{
            $query="select * from faculty where email='".$_POST['email']."'";
            $result=mysqli_query($con,$query);
            $row=mysqli_num_rows($result);
            if($row>0){
                $email=$_POST['email'];
                $random_number = random_int(100000, 999999);
                date_default_timezone_set('Asia/Dhaka');
                $current_time=date("h:i:sa");
                $end_time = date("h:i:sa", strtotime("+10 minutes"));
                $query1="select * from pass where email='".$_POST['email']."'";
                $result1=mysqli_query($con,$query1);
                $row1=mysqli_num_rows($result1);
                if($row1==0){
                    $query2="INSERT INTO pass(email,code,start_time,end_time)
                    Values('$email',$random_number,'$current_time','$end_time') ";
                    $result2=mysqli_query($con,$query2);
                    if($result2){
                        $_SESSION['email']=$email;
                        $_SESSION['code']=$random_number;
                        $_SESSION['st']=$current_time;
                        $_SESSION['et']=$end_time;
                        header("location:./PHPMailer/mail.php");
                    }
                }
                else{
                    $query3="UPDATE pass SET code = $random_number, start_time = '$current_time', end_time='$end_time' WHERE email='$email'";
                    $result3=mysqli_query($con,$query3);
                    if($result3){
                        $_SESSION['email']=$email;
                        $_SESSION['code']=$random_number;
                        $_SESSION['st']=$current_time;
                        $_SESSION['et']=$end_time;
                        header("location:./PHPMailer/mail.php");
                    }
                }
            }
            else{
                header("location:forgot.php?no=Email does not exists");
            }
        }
        }
        ?>
    </body>
</html>