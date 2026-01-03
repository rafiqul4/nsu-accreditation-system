<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
        <?php
        require_once("../../connection.php");
        session_start();
            $code=$_SESSION['code'];
            $title=$_SESSION['title'];
            $credit=$_SESSION['credit'];
            $select="SELECT * FROM co_id where code='$code'";
            $sresult=mysqli_query($con,$select);
            $srow=mysqli_num_rows($sresult);
        ?>
            <center>
        <div class='lev'><h2>Course Update</h2></div>
        <div class="container bg-white text-light p-2 w-25 rounded-4 shadow-lg">
        <?php if(@$_GET['u1']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['u1']?> </div> <?php } ?>
        <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['empty']?> </div> <?php }?>
        <?php if(@$_GET['same']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['same']?> </div> <?php }?>
        <form method='POST'>
            <table>
                <tr>
                <td><div><input class="dn" type='text' value="<?php echo $code ?>" name='code' maxlength='8' required/></div></td>
                </tr><tr>
                <td><div><input class="dn" type='text' value="<?php echo $title?>" name='title' required/></div></td>
                </tr><tr>
                <td><div><input class="dn" type='number' value="<?php echo $credit ?>" name='credit' min='0' max='10' required/></div></td>
                </tr><tr><td><br></td></tr>
                <tr>
                <td><center><button name='update' class='aback'>Update</button></center></td>   
                </tr>
            </table>
        </form>
        </div>
        </br><div><button class='aback'><a href='course_man.php' class='lab'>Cancel</button></div>
        </center>
        <?php
            if(isset($_POST['update'])){
                $c1=$_POST['code'];
                $c2=$_POST['title']; 
                $c3=$_POST['credit']; 
                $checkc="select * from course where code='$c1'";
                $rcheck=mysqli_query($con,$checkc);
                $checkr=mysqli_num_rows($rcheck);
                $q2="UPDATE course SET title='$c2',credit='$c3' where code='$code'";
                $r2=mysqli_query($con,$q2);
                if($checkr==0){                  
                    $q1="UPDATE course SET code='$c1' where code='$code'";
                    $r1=mysqli_query($con,$q1);
                    if($r1){
                        header("location:course_man.php?u1=Course Updated");
                    }     
                }
                else{
                    header("location:course_man.php?same=$c1 already exists");
                }
            }
        ?>
    </body>
</html>
