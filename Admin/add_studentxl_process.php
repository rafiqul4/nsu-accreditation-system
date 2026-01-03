<link rel="stylesheet" href="../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../Images/mini.png'>
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

        $id = $col[0];
        $fname = $col[1];
        $no = $col[2];
        $email = $col[3];
        $dep = $col[4];
        $cq="SELECT * from student where id='$id' or email='$email' or phone_number='$no'";
        $cr=mysqli_query($con,$cq);
        $cw=mysqli_num_rows($cr);
        if($cw==0){
            mysqli_query($con, "INSERT INTO student VALUES('$id','$fname','$no','$email','$dep')");
        }
        else{
            continue;
        } 
    }

    echo
    "
    <script>
    alert('Students Succesfully Added');
    document.location.href = 'add_student.php';
    </script>
    ";
}
?>