<?php
require_once("../../connection.php");
session_start();
?>
<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<body>
    <head>
        <h1 class='lev'><center>Semester Management<center></h1>
    </head>
    </br>
    <?php
    if(@$_GET['yes']==true){
    ?><center> <div class="alert alert-primary w-50" role="alert">
    <p> <?php echo $_GET['yes']?> </p>
    </div></center><?php
    }?>
    <?php
        $sql="SELECT * FROM semester";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==0){
            echo "<h3 class='lev'>"."<center>"."Not a single semester has been created"."</center>"."</h3>";
        }
        else if($_SESSION['sem']=="New Semester has not been enrolled yet "){
        $cur_date = date("Y-m-d");
        $cur_year=date("Y");
        $qd="SELECT * FROM semester where end=(SELECT Max(end) FROM semester)";
        $res=mysqli_query($con,$qd);
        $row1=mysqli_fetch_assoc($res);
            if(mysqli_num_rows($res)>0){
                $pre_season=$row1['season'];
                $pre_year=$row1['year'];
                $pre_end=$row1['end'];
                echo "<center class='lev'>"."The previous semester was ".$pre_season." ".$pre_year.", which was ended on ".$pre_end.". Click on set a new semester to enroll a new semester"."</center>";
                echo '<br>'.'<br>'.'<center>'.'<button class="big">'.'<a class="lab" href="new_sem.php">'.'Set a new semester'.'</a>'.'</button>'.'</center>';
                echo '<br>'.'<br>'.'<center>'.'<button class="aback">'."<a class='lab' href='../admin_home.php'>".'Back'.'</a>'.'</button>'.'</center>';
            }
        }
        else{
            echo "<h3>".'<center class="lev">'.$_SESSION['sem']. " is enrolled. The semester started on ".$_SESSION['sdate']." and the semester will end on ".$_SESSION['edate']."</h3>".'</center>'.'<br>';
            echo '<br>'.'<br>'.'<center>'.'<button class="big">'.'<a class="lab" href="new_sem.php">'.'Set a new semester'.'</a>'.'</button>'.'</center>';
            echo '<br>'.'<br>'.'<center>'.'<button class="aback">'."<a class='lab' href='../admin_home.php'>".'Back'.'</a>'.'</button>'.'</center>';
        }
    ?>
</body>
</html>