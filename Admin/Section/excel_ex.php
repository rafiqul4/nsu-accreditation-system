
<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<?php
require_once("../../connection.php");
session_start();
if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "../../uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require '../../excelReader/excel_reader2.php';
    require '../../excelReader/SpreadsheetReader.php';
    $cor=$_SESSION['tcourse'];
    $reader = new SpreadsheetReader($targetDirectory);
    $count = 0;
    $skipValue = 1;
    foreach($reader as $key => $col){

        if($count < $skipValue) {
            $count++;
            continue;
        }

        $course = $col[0];
        $sec = $col[1];
        $sem = $col[2];
        $room= $col[3];
        $time = $col[4];
        $seat = $col[5];
        $cq="SELECT * from section where c_code='$course' and section= '$sec' and semester='$sem'";
        $cr=mysqli_query($con,$cq);
        $cw=mysqli_num_rows($cr);
        if($cw==0 && $cor==$course){
            mysqli_query($con, "INSERT INTO section(c_code,section,semester,room,time,seat) VALUES('$course','$sec','$sem','$room','$time','$seat')");
        }
        else{
            continue;
        }
    }

    echo
    "
    <script>
    alert('Sections Succesfully Added');
    document.location.href = 'sec_create.php';
    </script>
    ";
}
?>





