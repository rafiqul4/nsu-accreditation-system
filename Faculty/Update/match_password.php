<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
        <?php
        require_once("../../connection.php");
        session_start();
        $initial=$_SESSION['user'];
        ?>
         <center>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <?php if(@$_GET['e']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['e']?> </div> <?php } ?>
        <h3 class=lev>Change Password</h3>
        <form method="POST"> 
        <input class="dn w-100" type="password" name="mtm"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" required ><br><br>
        <input class="dn w-100" type="password" name="szn"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" required><br><br>
        <button name="z" class= 'aback'>Submit</button>
        </form>
        </div>
        <div><button class='aback'><a href='update_faculty.php' class='lab'>Back</a></button></div>
        </center>
        <?php
        if(isset($_POST["z"])){
            $new_pass= $_POST["mtm"];
            $retype_pass=$_POST["szn"];
            if($new_pass==$retype_pass) {
                $typed_pass= "UPDATE faculty SET PASSWORD=md5('$new_pass')  where initial='$initial'";
                $z2=mysqli_query($con,$typed_pass);
                
                header("location:../../index.php?Invalid=Password Changed");
            }
            else{
                header("location:match_password.php?e= Confirm Password Doesn't Match");
            }
        }
        ?>
        </body>
        </html>