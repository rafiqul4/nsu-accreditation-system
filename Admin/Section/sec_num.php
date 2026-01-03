<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<body>
<?php 
require_once("../../connection.php");
session_start();
$_SESSION['tcourse']=$_GET['code'];
$course=$_GET['code'];
$sem=$_SESSION['sem'];
$check="SELECT c_code,section,semester,room,time,seat,fac_id FROM section where c_code='$course' and semester='$sem' GROUP BY c_code,section,semester";
$cres=mysqli_query($con,$check);
$crow=mysqli_num_rows($cres);
if($crow>0){
    echo "<center><h3 class='lev'>Section List of ".$course."</h3>
    <table class='tab1'><tr class='tr1'><th class='th1'>Course</th><th class='th1'>Section NO</th><th class='th1'>Semester</th> 
    <th class='th1'>Class Room</th><th class='th1'>Class Time</th><th class='th1'>Seat Numbers</th><th class='th1'>Faculty</th></tr>";
    while($cro=mysqli_fetch_assoc($cres)){
        if($cro['fac_id']==NULL){
            $fac="TBA";
        }
        else{
            $fac=$cro['fac_id'];
        }
        echo "<tr><td class='td1'>".$cro['c_code']."</td>";
        echo "<td class='td1'>".$cro['section']."</td>";
        echo "<td class='td1'>".$cro['semester']."</td>";
        echo "<td class='td1'>".$cro['room']."</td>";
        echo "<td class='td1'>".$cro['time']."</td>";
        echo "<td class='td1'>".$cro['seat']."</td>";
        echo "<td class='td1'>".$fac."</td></tr>";
    }
    echo "</table></center>";
}
else{
    echo "<center><h3 class='lev'>No sections available for ".$course."</h3></center>";
}
?>
    <center><div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <h3 class='lev'>Add Sections</h3>
        <form method='POST' action='excel_ex.php?' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
            <div><button name="import" class="bbig">Upload</button></div>
        </form>
    </div></center>
    <center><button class='aback'><a class='lab' href='new_sec.php'>Back</a></button></center>
<?php 

?>
</body>
</html>