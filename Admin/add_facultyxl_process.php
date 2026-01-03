<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<?php
require_once("../connection.php");
if (isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "../uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require '../excelReader/excel_reader2.php';
    require '../excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);
    $count = 0;
    $skipValue = 1;
    foreach($reader as $key => $col){

        if($count < $skipValue) {
            $count++;
            continue;
        }

        $initial = $col[0];
        $fname = $col[1];
        $pass= MD5($col[2]);
        $no = $col[3];
        $email = $col[4];
        $d=$col[5];
        $day = date('Y-m-d', strtotime($d));
        $dep = $col[6];
        $cq="SELECT * from faculty where initial='$initial' or email= '$email' or phone_number='$no'";
        $cr=mysqli_query($con,$cq);
        $cw=mysqli_num_rows($cr);
        if($cw==0){
            mysqli_query($con, "INSERT INTO faculty VALUES('$initial','$fname','$pass','$no','$email','$day','$dep')");
        }
        else{
            continue;
        }
    }

    echo
    "
    <script>
    alert('Faculties Succesfully Added');
    document.location.href = 'add_faculty.php';
    </script>
    ";
}
?>





