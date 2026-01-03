<?php 
require_once("../../connection.php");
?>
<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<body>
    <head>
        <h1 class='lev'><center>Create a new semester<center></h1>
    </head>
    <br>
    <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
    <center>
    <?php
            if(@$_GET['dEmpty']==true){
            ?><center> <div class="alert alert-primary" role="alert">
            <p> <?php echo $_GET['dEmpty']?> </p>
            </div></center><?php
            }?>
    <?php
            if(@$_GET['no']==true){
            ?><center> <div class="alert alert-primary" role="alert">
            <p> <?php echo $_GET['no']?> </p>
            </div></center><?php
            }?>
    <?php
            if(@$_GET['date']==true){
            ?><center> <div class="alert alert-primary" role="alert">
            <p> <?php echo $_GET['date']?> </p>
            </div></center><?php
            }?>
        <form action="" method="POST">
            <div><SELECT class='sele' name="season" required>
            <option class='opt' hidden disabled selected value>Select a Season</option>
            <OPTION class='opt' Value="Spring">Spring</OPTION>
            <OPTION class='opt' Value="Summer">Summer</OPTION>
            </SELECT><br><br></div>
            <?php
                $cdate=date("Y-m-d");
                $ci=date("Y");
                $sql="SELECT * FROM semester where year=$ci" ;
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)==0){
                    $min=$cdate;
                    $minDate=date('Y-m-d', strtotime($min. ' + 5 months'));
                    $newDate = date('Y-m-d', strtotime($min. ' + 7 months'));
                }
                else{
                    $q1="SELECT Max(end),season,year,start FROM semester";
                    $r1=mysqli_query($con,$q1);
                    $row1=mysqli_fetch_assoc($r1);
                    if(mysqli_num_rows($r1)>0){
                        if($row1['Max(end)']>=$cdate){
                            $min=date('Y-m-d ', strtotime($row1['Max(end)'] . ' +1 day'));
                            $minDate=date('Y-m-d', strtotime($min. ' + 5 months'));
                            $newDate = date('Y-m-d', strtotime($min. ' + 7 months'));
                        }
                        else{
                            $min=$cdate;
                            $minDate=date('Y-m-d', strtotime($min. ' + 5 months'));
                            $newDate = date('Y-m-d', strtotime($min. ' + 7 months'));
                        }
                    }
                }
            ?>
            <?php
            echo '<div class="lev">'.'<label for="">Semester Begins on : </label>'."<input class='bod' type='date' name='sd' min=$min required />".'</div>'.'<br>'; 
            echo '<div class="lev">'.'<label for="">Semester Ends on : </label>'."<input class='bod' type='date' name='ed' min=$minDate max=$newDate required />".'</div>'.'<br>'; 
            ?>   
            <div><input class='aback' type="submit" name="ok"></div>
        </form>
        </div>
        </center>
        <center><div><button class='aback'><a class='lab' href="sem.php">Cancel</a></button></div></center>
    <?php
    if(isset($_POST['ok'])){
        $season=$_POST['season'];
        $sdt=$_POST['sd'];
        $edt=$_POST['ed'];
        $y=date('Y', strtotime($sdt));
        $cq="SELECT * FROM semester where year=$y and season='$season'";
        $rc=mysqli_query($con,$cq);
        if($season=="Spring"){
            $sl=1;
        }
        else if($season=="Summer"){
            $sl=2;
        }
        if(empty($season) || empty($sdt) || empty($edt)){
            header("location:new_sem.php?dEmpty=please select all the fields");
        }
        else if(!empty($season) && !empty($sdt) && !empty($edt) && mysqli_num_rows($rc) > 0){
            header("location:new_sem.php?no=You selected semester already exists");
        }
        else if($sdt>$edt){
            header("location:new_sem.php?date=Start date has to be less than end date");
        }
        else if(!empty($season) && !empty($sdt) && !empty($edt) && mysqli_num_rows($rc) == 0 && $sdt<$edt){
            $mq="INSERT INTO semester(Serial,season,year,start,end) VALUES($sl,'$season',$y,'$sdt','$edt')";
            $rm=mysqli_query($con,$mq);
            if($rm){
                header("location:sem.php?yes=Semester enrolled");
            }
        }       
    }
    ?>
</body>
</html>