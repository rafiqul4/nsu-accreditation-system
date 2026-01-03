<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<SCRIPT type="text/javascript">
window.history.forward();
</script>
    <body>
        <?php
        require_once("../../connection.php");
        session_start();
        $pass=$_SESSION['sub'];
        ?>
        <center>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <?php if(@$_GET['e']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['e']?> </div> <?php } ?>
        <h3 class=lev>Enter your current password</h3>
        <form method="POST"> 
        <input class="dn w-100" type="password" name="mtm" required><br><br>
        <button name="z" class= 'aback'>Submit</button>
        </form>
        </div>
        <div><button class='aback'><a href='update_faculty.php' class='lab'>Back</a></button></div>
        </center>
        <?php
        if(isset($_POST["z"])){
        $cpass=$_POST["mtm"];
        if($pass== md5($cpass)){
            header("location:match_password.php");

        }
        else{
            header("location:type_password.php?e=Wrong password");
        }
        }
        ?>    
        </body>
        </html>
