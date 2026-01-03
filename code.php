<html>
<link rel='shortcut icon' type='x-icon' href='Images/mini.png'>
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
    <Body>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
            <center>
                <form method="POST">
                    <table>
                        <tr><th><div><h2 class='lev text-center'>OTP Verification</h2></div><th></tr>
                        <tr><td> <?php if(@$_GET['no']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['no']?> </div> <?php } ?> </td></tr>
                        <tr><td ><div class='lev'>We've sent a password reset OTP in your email</div></td></tr>
                        <tr><td></br></td></tr>
                        <tr><td><div><input class="dn w-100" type="number" name="var" min="100000" max="999999" Placeholder='Enter Code'></div><br></td><tr>
                        <tr><td><div><input class='aback shadow-lg lab w-100' type="submit" value="Submit" name="ok"></div></td>
                        <tr></tr>
                    </table>
                </form> 
            </center>
        </div>
        <?php
        require_once("connection.php");
            session_start();
            if(isset($_POST['ok'])){
                date_default_timezone_set('Asia/Dhaka');
                $end_time=$_SESSION['et'];
                $current_time=date("h:i:sa");
                echo $current_time." ".$end_time;
                if($current_time<=$end_time){
                    $q1="select * from pass where email='".$_SESSION['email']."' and code='".$_POST['var']."'";
                    $r1=mysqli_query($con,$q1);
                    $row1=mysqli_num_rows($r1);
                    if($row1>0){
                        header("location:new_pass.php");
                    }
                    else{
                        header("location:code.php?no=The code you've given is incorrect.");
                    }
                }
                else{
                    header("location:forgot.php?time=Your OTP code has expired, try again.");
                }
            }
        ?>
    </body>
</html>