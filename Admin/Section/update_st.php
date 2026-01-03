<html>
<head>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<SCRIPT type="text/javascript">
window.history.forward();
</script>
<body>
<?php 
require_once("../../connection.php");
session_start();
$sem=$_SESSION['sem'];
$code=$_SESSION['scode'];
$sec=$_SESSION['sec'];
$seat=$_SESSION['seat'];
?>
<center>
<h3 class='lev'>Update Students list of <?php echo $code." Section ".$sec." ".$sem." " ?>via excel sheet</h3>
<div>
    <table class='tab1 w-75'>
    <tr class='tr1'>
    <th class='th1'>Serial</th>
    <th class='th1'>Student ID</th>
    <th class='th1'>Student Name</th>
    <th class='th1'>Email</th>
    <th class='th1'><th>
    </tr>
    <?php
    $query="SELECT * from student_id where code='$code' and section=$sec and semester='$sem' ORDER BY sl ASC";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr class='tr1'>";
        echo "<td class='td1'>".$row['sl']."</td>";
        echo "<td class='td1'>".$row['st_id']."</td>";
        echo "<td class='td1'>".$row['st_name']."</td>";
        echo "<td class='td1'>".$row['email']."</td>";
        echo "<td class='td1'><a class='del' href='delete_st.php?di=$row[st_id]'><i title='DELETE' class='fa fa-close'></i></a></td>";
        echo "</tr>";
    }
    ?>
    <tr class='tr1'><td class='td1' colspan='5'><center><form method='POST'><button class='set' name='fix'>Fix Serial</button><?php echo '&nbsp'.'&nbsp' ; ?><button class='set' name='clear'> Clear Section</button></form></center><td></tr>
    </table>
</div>
<br>
<div><button class='big'><a class='lab' href='../../excel_writer.php' target="_blank"><h5>Download</h5></a></button></div>
<div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
<h6><a class='' href="../../Images/Student_section.png" target="_blank"><u>Excel Format</u></a></h6>
<form method='POST' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
    <div><button name="import" class="bbig" onclick="return sure()">Upload</button></div>
</form>
</div>
<button class='aback'><a class='lab' href='enroll_st.php'>Cancel</a></button>
</center>
<?php
if(isset($_POST["fix"])){
    $i=1;
    $query1="SELECT * from student_id where code='$code' and section=$sec and semester='$sem' ORDER BY st_id ASC";
    $result1=mysqli_query($con,$query1);
    while($roww=mysqli_fetch_assoc($result1)){
        $uq="UPDATE student_id set sl=$i where st_id=$roww[st_id] and code='$code' and section=$sec and semester='$sem'";
        $ur=mysqli_query($con,$uq);
        $i++;
    }
}
else if(isset($_POST["clear"])){
    $adl="DELETE from student_id where code='$code' and section=$sec and semester='$sem'";
    $rq=mysqli_query($con,$adl);
    if($rq){
        echo "<script>window.location.href='enroll_st.php?del=$code $sec $sem has been cleared'</script>";
    }
}
else if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "../../uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require '../../excelReader/excel_reader2.php';
    require '../../excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);
    $count = 0;
    $skipValue = 1;
    $dq="DELETE from student_id where code='$code' and section=$sec and semester='$sem'";
    $rq=mysqli_query($con,$dq);
    foreach($reader as $key => $col){
        $q3="SELECT * from student_id where code='$code' and section=$sec and semester='$sem'";
        $r3=mysqli_query($con,$q3);
        if(mysqli_num_rows($r3)<$seat){

        if($count < $skipValue) {
            $count++;
            continue;
        }

        $no = $col[0];
        $id = $col[1];
        $name = $col[2];
        $email = $col[3];
        $q1="SELECT * from student_id where code='$code' and semester='$sem' and st_id=$id";
        $r1=mysqli_query($con,$q1);
        $row1=mysqli_num_rows($r1);
        $q2="SELECT * from student where id=$id and email = '$email'";
        $r2=mysqli_query($con,$q2);
        $row2=mysqli_num_rows($r2);
        if($row1==0 && $row2>0){
            
            mysqli_query($con, "INSERT INTO student_id VALUES('$code','$sec','$sem',$no,$id,'$name','$email')");
            
        }
        else{
            continue;
        }
    }
    else{
        break;
    }
    }

    echo
    "
    <script>
    alert('Students Succesfully Added');
    document.location.href = 'enroll_st.php';
    </script>
    ";
}
?>
</body>
<script>
    function sure(){
        return confirm("If you upload an new excel, the previous records will be deleted. Make sure upload the previous file as updated or you can download a new excel with same data by clicking download.\n\n Are sure you want to delete current record?")
    }
</script>
</html>