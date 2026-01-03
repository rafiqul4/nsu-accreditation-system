<html>
<link rel='shortcut icon' type='x-icon' href='Images/mini.png'>
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
    <body>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
            <center>
                <form method="POST">
                    <table>
                        <tr><th><div><h2 class='lev text-center'>New Password Setup</h2></div><th></tr>
                        <tr><td> <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['empty']?> </div> <?php } ?> 
                        <?php if(@$_GET['no']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['no']?></div> <?php } ?></td></tr>
                        <tr><td></br></td><tr>
                        <tr><td><div><input class="dn w-100" type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" Placeholder='create a new password'></div><br></td><tr>
                        <tr><td><div><input class="dn w-100" type="password" name="con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" Placeholder='Confirm your password'></div><br></td><tr>
                        <tr><td><div><input class='aback shadow-lg lab w-100' type="submit" value="Change" name="change"></div></td>
                        <tr></tr>
                    </table>
                </form> 
            </center>
        </div>
        <?php
        require_once("connection.php");
        session_start();
        if(isset($_POST['change'])){
            $pass1=$_POST['pass'];
            $pass2=$_POST['con'];
            $email=$_SESSION['email'];
            if((empty($pass1)) || (empty($pass2))){
                header("location:new_pass.php?empty=Please fill in the blanks.");
            }
            else if($pass1!=$pass2){
                header("location:new_pass.php?no=Confirm password doesn't match.");
            }
            else if($pass1==$pass2){
                $q1="UPDATE faculty SET PASSWORD = md5('$pass1') WHERE email='$email'";
                $r1=mysqli_query($con,$q1);
                $q2="DELETE from pass WHERE email='$email'";
                $r2=mysqli_query($con,$q2);
                if($r1 && $r2){
                    header("location:fin_pass.php");
                }
            }
        }
        ?>
    </body>
</html>