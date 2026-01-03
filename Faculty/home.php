<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<body>
<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['user'])){
    $q2="select * from faculty where initial='".$_SESSION['user']."'";
    $r2=mysqli_query($con, $q2);
    while($row=mysqli_fetch_assoc($r2)){
        $_SESSION['name']=$row["name"];
        $_SESSION['fdep']=$row["department"];
    }
    ?>
    <table class='fix w-100 my-2 p-3'>
    <tr>
    <td>
    </td>
    <td>
    </td>
    <td>
    </td>
    <td>
    <div>
    <a class="lab" href='./Update/update_faculty.php'>Update Info</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <td>
    <div>
    <a class="lab" href='./Section/section_list.php'>CO Verification</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <td>
    <div class="fac">
    <label class="leb">Grade</label>
    <div class="fac-content">
    <a class="lab" href='./Grade/check.php'>Submit Grade</a>
    <a class="lab" href='./Grade/History/semester.php'>Grade History</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <?php
    $cmq="select * from department where c_initial='".$_SESSION['user']."'";
    $cmr=mysqli_query($con, $cmq);
    $rcm=mysqli_num_rows($cmr);
    $omq="select * from course where coordinator='".$_SESSION['user']."'";
    $omr=mysqli_query($con, $omq);
    $rom=mysqli_num_rows($omr);
    if($rcm>0){
    ?>
    <td>
    <div>
    <a class="lab" href="../Chairman/C_home.php">Switch to Chairman mode</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <?php 
    }
    if($rom>0){
    ?>
    <td>
    <div>
    <a class="lab" href="../Coordinator/Home.php">Switch to Coordinator Mode</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <?php
    }
    ?>
    <td>
    <div>
    <a class="lab" href="logout.php?logout"><i title="Log Out" class="fa fa-sign-out" style="font-size:24px; color:white;"></i></a>
    </div>
    </td>
    </tr>
    </table>
    <?php
    $sql="SELECT * FROM semester";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $cur_date = date("Y-m-d");
        $cur_year=date("Y");
        $qd="SELECT * FROM semester WHERE end>='$cur_date' and start<='$cur_date'";
        $res=mysqli_query($con,$qd);
        $row1=mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res)>0){
            $cur_season=$row1['season'];
            $cur_y=$row1['year'];
            $_SESSION['sem']=$cur_season." ".$cur_y;
            $_SESSION['sdate']=$row1['start'];
            $_SESSION['edate']=$row1['end'];
            echo "<h2 class='lev'>Welcome, ".$_SESSION['name']."<h2>";
            echo "<h2 class='lev'>"."Current Semester : ".$_SESSION['sem']."</h2>";
        }
		else{
			$_SESSION['sem']="New Semester hasn't enrolled yet ";
            echo "<h2 class='lev'>Welcome, ".$_SESSION['name']."<h2>";
            echo "<h2 class='lev'>".$_SESSION['sem']."</h2>";
		}
    }
    else{
		$_SESSION['sem']="New Semester hasn't enrolled yet ";
        echo "<h2 class='lev'>Welcome, ".$_SESSION['name']."<h2>";
        echo "<h2 class='lev'>".$_SESSION['sem']."</h2>";
        
	}  
}
?>
</body>
</html>