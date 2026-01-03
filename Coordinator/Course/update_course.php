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
        <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['empty']?> </div> <?php }?>
        <?php if(@$_GET['same']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['same']?> </div> <?php }?>
        <form method='POST'>
            <table>
                <tr>
                <td><div><input class="dn" type='text' value="<?php echo $code ?>" name='code' maxlength='8' style="text-transform:uppercase"/></div></td>
                <td><button name='ucc' class='big'>Update Course Code</button></td>
                </tr><tr>
                <td><div><input class="dn" type='text' value="<?php echo $title?>" name='title'/></div></td>
                <td><button name='uct' class='big'>Update Course Title</button></td>
                </tr><tr>
                <td><div><input class="dn" type='number' value="<?php echo $credit ?>" name='credit' min='0' max='10'/></div></td>
                <td><button name='ucd' class='bbig'>Update Number of Course Credit</button></td>   
                </tr><tr>
                <td><div><input class="dn" type='number' value="<?php echo $srow ?>" name='no'/></div></td>
                <td><button name='uco' class='bbig'>Update Number of Course Ovjectives</button></td>
                </tr>
            </table>
        </form>
        </div>
        </br><div><button class='aback'><a href='course_man.php' class='lab'>Cancel</button></div>
        </center>
        <?php
            if(isset($_POST['ucc'])){               
                if(empty($_POST['code'])){
                    header("location:update_course.php?empty=You need to give a course code");
                }
                else{
                    $c1=$_POST['code'];
                    $checkc="select * from course where code='$c1'";
                    $rcheck=mysqli_query($con,$checkc);
                    $checkr=mysqli_num_rows($rcheck);
                    if($checkr==0){
                        $q1="UPDATE course SET code='$c1' where code='$code'";
                        $r1=mysqli_query($con,$q1);
                        $q2="UPDATE co_id SET code='$c1' where code='$code'";
                        $r2=mysqli_query($con,$q2);
                        if($r1){
                        header("location:course_man.php?u1=$code has changed to $c1");
                        }
                    }
                    else{
                        header("location:update_course.php?same=$c1 already exists");
                    }
                }         
            }
            else if(isset($_POST['uct'])){
                if(empty($_POST['title'])){
                    header("location:update_course.php?empty=You need to give a course title");
                }
                else{
                    $c1=$_POST['title'];                   
                    $q1="UPDATE course SET title='$c1' where code='$code'";
                    $r1=mysqli_query($con,$q1);
                    if($r1){
                        header("location:course_man.php?u1=Title of $code has changed to $c1");
                    }                    
                } 
            }
            else if(isset($_POST['ucd'])){
                if(empty($_POST['credit'])){
                    header("location:update_course.php?empty=You need to number of course course");
                }
                else{
                    $c1=$_POST['credit'];                   
                    $q1="UPDATE course SET credit=$c1 where code='$code'";
                    $r1=mysqli_query($con,$q1);
                    if($r1){
                        header("location:course_man.php?u1=Title of $code has changed to $c1");
                    }                    
                } 

            }
            else if(isset($_POST['uco'])){
                $c1=$_POST['no'];
                $dq="DELETE FROM co_id WHERE code='$code'";
                $dr=mysqli_query($con,$dq);
                for($i=1;$i<=$c1;$i++){
                    $q2="insert into co_id(code,title) VALUES('$code','CO$i')";
                    $r2=mysqli_query($con,$q2);
                }
                if($dr && $r2){
                    header("location:co_wt.php?u1=Number of $code objective has been update to $c1");
                }
            }
        ?>
    </body>
</html>
