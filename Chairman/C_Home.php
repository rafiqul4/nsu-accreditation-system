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
    $q2="select * from department where c_initial='".$_SESSION['user']."'";
    $r2=mysqli_query($con, $q2);
    while($row=mysqli_fetch_assoc($r2)){
        $_SESSION['name']=$row["name"];
        $_SESSION['dep']=$row["dep"];
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
    <div class="fac">
    <label class="leb">Grade</label>
    <div class="fac-content">
    <a class="lab" href='./Grade/section.php'>Grade Submission</a>
    <a class="lab" href='./Grade/History/semester.php'>Grade History</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
    <div class="fac">
    <label class="leb">Course Management</label>
    <div class="fac-content">
    <a class="lab" href='./Course/course_man.php'>Add Course</a>
    <a class="lab" href='./Course/update_excel.php'>Update Multiple Course Via Excel File</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <td>
    <a class="lab" href="./CO/semester.php">CO Check</a>
    </td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
    <td>
    <div>
    <a class="lab" href='./Section/section_man.php'>Section Management</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <td>
    <div>
    <a class="lab" href='./Deadline/deadline.php'>Set Deadline</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
    <td>
    <div>
    <a class="lab" href="../Faculty/home.php">Switch to Faculty mode</a>
    </div>
    </td>
    <td></td><td></td><td></td><td></td><td></td>
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
            echo "<h2 class='lev'>Welcome, Chairman of ".$_SESSION['dep']." Department, ".$_SESSION['name']."<h2>";
            echo "<h2 class='lev'>"."Current Semester : ".$_SESSION['sem']."</h2>";
        }
		else{
			$_SESSION['sem']="New Semester hasn't enrolled yet ";
            echo "<h2 class='lev'>Welcome, Chairman of ".$_SESSION['dep']." Department, ".$_SESSION['name']."<h2>";
            echo "<h2 class='lev'>".$_SESSION['sem']."</h2>";
		}
    }
    else{
		$_SESSION['sem']="New Semester hasn't enrolled yet ";
        echo "<h2 class='lev'>Welcome, Chairman of ".$_SESSION['dep']." Department, ".$_SESSION['name']."<h2>";
        echo "<h2 class='lev'>".$_SESSION['sem']."</h2>";
        
	}  
}
?>
</body>
</html>