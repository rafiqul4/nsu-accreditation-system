<?php require_once("../connection.php");?>
<html>
<head>
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
<script type="text/javascript" src="../Timeout/one_level.js"></script>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['admin'])){
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
		}
		else{
			$_SESSION['sem']="New Semester has not been enrolled yet ";
		}
	}
	else{
		$_SESSION['sem']="New Semester has not been enrolled yet ";
	}
    if(isset($_SESSION['special'])){
        $_SESSION['name']='OBE Admin';
        $_SESSION['fdep']="N/A";
        
    }
    else{
        $q2="select * from faculty where initial='".$_SESSION['admin']."'";
        $r2=mysqli_query($con, $q2);
        while($row=mysqli_fetch_assoc($r2)){
            $_SESSION['name']=$row["name"];
            $_SESSION['fdep']=$row["department"];
        }
    
    }
    $initial = $_SESSION['admin'];
?>
<div class="container-fluid">
            
            <!-- Top Bar -->
            <div class="row bg-primary text-white custom_height align-items-center">
                <div class="col-2">
                    <h1 class="obe-animation"><a class='lab' href='admin_home'>OBE</a></h1>
                </div>
                <div class="col-7 text-center">
                    <h4>Admin Mode</h4>
                </div>

                <div class="col-3 popup-top-bar">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" class="btn4 bg-primary btn-primary popup-button float-end" data-toggle="modal" data-target="#teacherProfileModal">
                        <img src="../Images/profile.jpg" alt="Popup Image" class="popup-image rounded-circle" style="width: 60px; height: 60px;">
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
                                <img src="../Images/profile.jpg" alt="Teacher's Photo" class="popup-image rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <h3 class="text-center"><?php echo $_SESSION['name'] ?></h3>
                            <h3 class="text-center">Initial :<?php echo " ".$_SESSION['admin'] ?></h3>
                            <?php
                            if(isset($_SESSION['special'])){
                                ?>
                                <h3 class="text-center"><a href='./Update/type_password' class="text-primary lab"><u>Update Profile</u></a></h3><br>
                                <?php
                            }
                            ?>
                            <center><a class="btn btn-danger btn-block text-center w-100" href="admin_logout?logout">Logout</a></center>
                        </div>
                    </div>
                </div>
            </div> 

        </div>
<table class='fix w-100 my-2 p-3'>
<tr>
<td>&nbsp&nbsp</td>
<td>
<div>
<a class="lab" href=./Chairman/chair_Manage>Department Management</a>
</div>    
</td>
<?php
if(isset($_SESSION['special'])){
    ?>
    <td>&nbsp&nbsp</td>
    <td>
    <div>
    <a class="lab" href=./Admin/list>Admin Management</a>
    </div>    
    </td>
    <?php
}
?>

</tr>
</table>
<?php
    echo "<h2 class='lev'>".'Welcome, '.$_SESSION['admin']."</h2>";
    echo "<h2 class='lev'>"."Current Semester : ".$_SESSION['sem']."</h2>";

}
else{
    header("location:ncvisgsgdsogndsksgsnbsnbisnigssdngsincknbkcsnsdgsgjcbxjcbcxbgrjfdjgjfsj/index");
}
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>