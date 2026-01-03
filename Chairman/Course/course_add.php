<html>
<SCRIPT LANGUAGE="javaScript" type="text/javaScript">
window.history.forward()
</SCRIPT>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <body>
        <center>
        <div class='lev'><h2>Course Setup</h2></div>
        <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
        <form method='POST'>
        <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['empty']?> </div> <?php } ?>
        <?php if(@$_GET['same']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['same']?> </div> <?php } ?>
            <div><input class="dn w-100" type='text' placeholder='Course Code' name='code' maxlength='8' style="text-transform:uppercase"/></div>
            <br>
            <div><input class="dn w-100" type='text' placeholder='Course Title' name='title'/></div>
            <br>
            <div><input class="dn w-100" type='number' placeholder='Course Credit' name='credit' min='0' max='10'/></div>
            <br>
            <div><button class='aback' name='next'>Next</button></div>
        </form>
        <form method='POST' action='excel.php' name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <label class= 'lev'>OR</label>
            <h6><a class='' href="../../Images/Course_add.png" target="_blank"><u>Excel Format</u></a></h6>
            <div><label class='uplab' for='file'><i class="fa fa-upload" aria-hidden="true"></i><input id='file' type="file" name='excel' accept=".xls,.xlsx" class="upload" required> Choose an excel file</label></div><br>
            <div><button name="import" class="bbig">Upload</button></div>
        </form>
        </div>
        <div><button class='aback'><a href='course_man.php' class='lab'>Cancel</button></div>
        </center>
        <?php
        require_once("../../connection.php");
        session_start();
        if(isset($_POST['next'])){
            $dep=$_SESSION['dep'];
            $_SESSION['code']=$_POST['code'];
            $code=$_SESSION['code'];
            $title=$_POST['title'];
            $credit=$_POST['credit'];
            $cq="select * from course where code='$code'";
            $rq=mysqli_query($con,$cq);
            $cr=mysqli_num_rows($rq);
            if(empty($_POST['code']) || empty($_POST['title']) || empty($_POST['credit'])){
                header("location:course_add.php?empty=please fill in the blanks");
            }
            else if($cr>0){
                header("location:course_add.php?same=Course already exists");
            }
            else if($cr==0){
                $q1="INSERT INTO course(code,title,department,credit) values('$code','$title','$dep',$credit)";
                $r1=mysqli_query($con,$q1);
                if($r1){
                    header("location:course_man.php?done=$code has been added");
                }
            }
        }
        ?>
    </body>
<html>

