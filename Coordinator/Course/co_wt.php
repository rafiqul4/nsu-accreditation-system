<html>
<SCRIPT LANGUAGE="javaScript" type="text/javaScript">
window.history.forward()
</SCRIPT>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
        <center>           
            <h2 class='lev'>Setup CO Weightages</h2>
            <?php if(@$_GET['u1']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['u1']?> </div> <?php }?>
            <?php if(@$_GET['no']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['no']?> </div> <?php } ?>
            <div container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg>
            <form method='POST'>
                <table class='tab1'>
                    <tr class='tr1'>
                        <th class='th1'>CO-Tittle</th>
                        <th class='th1'>Weightage</th>
                    </tr>
                    <?php
                    require_once("../../connection.php");
                    session_start();
                    $code=$_SESSION['code'];
                    $q1="SELECT * from co_id where code='$code'";
                    $r1=mysqli_query($con,$q1);
                    $obj=mysqli_num_rows($r1);
                    $i=1;
                    while($row=mysqli_fetch_assoc($r1)){
                        ?>
                        <tr class='tr1'>
                            <td class='td1'><?php echo $row['title']; ?></td>
                            <td class='td1'><input class='dn' type='number' min='0' max='100' placeholder="Value in %" name="<?php echo 'CO'.$i; ?>" required></td>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    <td class='td1' colspan='2'><center><button class='set' name='sub'>Submit</button></center></td>
                </table>
            </form>
            </div>
            <button class='aback'><a class='lab' href='course_man.php?un=Course Weigtage has not been set yet. Without Course Weigtage you can not create section. You have to update Course Weigtage'>Cancel</a></button></center>
            <?php
            if(isset($_POST['sub'])){
                $sum=0;
                for($j=1;$j<=$obj;$j++){
                    $sum=$sum + $_POST["CO".$j];
                }
                $final=$sum;
                if($final==100){
                    for($j=1;$j<=$obj;$j++){
                        $q2="update co_id set wt=".$_POST['CO'.$j]." where code='$code' and title='CO$j'";
                        $r2=mysqli_query($con,$q2);
                        if($r2){
                            header("location:course_man.php?");
                        }
                    }
                }
                else{
                    header("location:co_wt.php?no=Total weight has to be exactly 100%");
                }
            }
            ?>
        </center>
    </body>
<html>            