<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
        <?php
        require_once("../../connection.php");
        session_start();
            $initial=$_SESSION['user'];
            
            $find="SELECT * FROM `faculty` WHERE initial='$initial'";
            $connection=mysqli_query($con,$find);
            $row=mysqli_fetch_assoc($connection);
            $check=$row['PASSWORD'];
            $_SESSION["sub"]=$check;
            $name=$row['name'];
            $phone_number=$row['phone_number'];
            $birthday=$row['birthday'];
            $select="SELECT * FROM faculty where name='$name'";
            $sresult=mysqli_query($con,$select);
            $srow=mysqli_num_rows($sresult);
        ?>
            <center>
        <div class='lev'><h2> Update Faculty</h2></div>
        <div class="container bg-white text-light p-2 w-25 rounded-4 shadow-lg">
        <?php if(@$_GET['u1']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['u1']?> </div> <?php } ?>
        <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['empty']?> </div> <?php }?>
        <?php if(@$_GET['same']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['same']?> </div> <?php }?>
        <form method='POST'>
            <table>
                <tr>
                <td><br></td>
                </tr>
                <tr>
                <td><div><input class="dn" type='text' value="<?php echo $name ?>" name='name' maxlength='50' required/></div></td>
                </tr><tr>
                <td><div><input class="dn" type='number' min="01300000000" max="01999999999" value="<?php echo '0'.$phone_number?>" name='phone_number' required/></div></td>
                </tr><tr>
                <td><div><input class="dn" type='date' value="<?php echo $birthday ?>" name='birthday' min='0' max='10' required/></div></td>
                </tr>
                <td><center><button name='update' class='big'><a href='type_password.php' class='lab'>Update password</a></button></center></td> 
                <tr><td><br></td></tr>
                <tr>
                <td><center><button name='update' class='aback'>Update</button></center></td>   
                </tr>
            </table>
        </form>
        </div>
        </br><div><button class='aback'><a href='../home.php' class='lab'>Back</a></button></div>
        </center>
        <?php
            if(isset($_POST['update'])){
                $name1=$_POST['name'];
                $pgone_number=$_POST['phone_number']; 
                $birthday1=$_POST['birthday']; 
               
                $q2="UPDATE faculty SET name='$name1',phone_number='$pgone_number', birthday='$birthday1' where initial='$initial'";
                $r2=mysqli_query($con,$q2);
                        
                    if($r2){
                        header("location:update_faculty.php?u1=Information Updated");
                    }     
                
               
            }
        ?>
    </body>
</html>
