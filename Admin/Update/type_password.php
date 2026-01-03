<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<script type="text/javascript" src="../../Timeout/two_level.js"></script>
<body>
<?php
session_start();
require_once("../../connection.php");
if(isset($_SESSION['special'])){
    unset($_SESSION['match']);
    $pass=$_SESSION['admin_pass'];
    ?>
        <div class="container-fluid">
            
            <!-- Top Bar -->
            <div class="row bg-primary text-white custom_height align-items-center">
                <div class="col-2 ">
                    <h1 class="obe-animation"><a class='lab' href='../admin_home'>OBE</a></h1>
                </div>
                <div class="col-7 text-center">
                    <h4>Admin Mode</h4>
                </div>

                <div class="col-3 popup-top-bar">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" class="btn4 bg-primary btn-primary popup-button float-end" data-toggle="modal" data-target="#teacherProfileModal">
                        <img src="../../Images/profile.jpg" alt="Popup Image" class="popup-image rounded-circle" style="width: 60px; height: 60px;">
                    </button>
                </div>
            </div>
        


            <!-- Teacher Profile Modal -->
            <div class="modal fade" id="teacherProfileModal" tabindex="-1" role="dialog" aria-labelledby="teacherProfileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog w-100 position-absolute top-0 end-0" role="document">
                    <div class="modal-content w-75" style="height: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="teacherProfileModalLabel">Profile</h5>
                        </div>
                        <div class="modal-body">
                            <div style="width: 100px; height: auto; margin: 0 auto;">
                                <img src="../../Images/profile.jpg" alt="Teacher's Photo" class="popup-image rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <h3 class="text-center"><?php echo $_SESSION['name'] ?></h3>
                            <h3 class="text-center">Initial :<?php echo " ".$_SESSION['admin'] ?></h3>
                            <h3 class="text-center"><a href='../Update/type_password' class="text-primary lab"><u>Update Profile</u></a></h3><br>
                            <center><a class="btn btn-danger btn-block text-center w-100" href="../admin_logout?logout">Logout</a></center>
                        </div>
                    </div>
                </div>
            </div> 

        </div>
        <br>
        <center>
        <h3 class='lev'>Update Password</h3>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <?php if(isset($_SESSION['error'])){ ?> <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['error'];?> </div> <?php unset($_SESSION['error']); } ?>
        <h4 class=lev>Enter your current password</h4>
        <form method="POST"> 
        <input class="form-control w-100" type="password" name="mtm" required><br>
        <button name="z" class= 'btn btn-primary'>Next</button>
        </form>
        </div>
        </center>
    <?php
    if(isset($_POST["z"])){
        $cpass=$_POST["mtm"];
        if($cpass==$pass){
            $_SESSION['match']='true';
            header("location:match_password");
        }
        else{
            $_SESSION['error']='Wrong password';
            header("location:type_password");
        }
    }
}
else{
    header('location: ../ncvisgsgdsogndsksgsnbsnbisnigssdngsincknbkcsnsdgsgjcbxjcbcxbgrjfdjgjfsj/index');
}
?> 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
