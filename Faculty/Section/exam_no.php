<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<body>
    <div class="container my-5 w-25 bg-white text-light p-2 rounded-4 shadow-lg">
    <center>
    <form action='' method='post'>
    <table class='lev'>
        <tr>
            <div><th colspan='2'><center><h2 class='lev'>CO Verifacation</h2></center></th><div>
        </tr>
        <tr><td colspan='2'><center> <?php if(@$_GET['empty']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['empty']?> </div> <?php } ?> 
        <?php if(@$_GET['no']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['no']?> </div> <?php } ?>
        <?php if(@$_GET['prob']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo $_GET['prob']?> </div> <?php } ?></center></td> 
        </tr>
        <tr>
            <td></br></td>
        </tr>
        <tr>
            <td>Enter the number of Class Tests : </td>
            <td><input type='number' min='0' max='10' name='test' value='0' Placeholder="Enter the number of Class Tests" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Quizes : </td>
            <td><input type='number' min='0' max='36' name='quiz' value='0' Placeholder="Enter the number of Quizes" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Mids : </td>
            <td><input type='number' min='0' max='10' name='mid' value='0' Placeholder="Enter the number of Mids" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Finals : </td>
            <td><input type='number' min='0' max='10' name='final' value='0' Placeholder="Enter the number of Finals" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Assignments : </td>
            <td><input type='number' min='0' max='36' name='assignment' value='0' Placeholder="Enter the number of Assignments" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Presentations : </td>
            <td><input type='number' min='0' max='36' name='present' value='0' Placeholder="Enter the number of Presentations" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of Projects : </td>
            <td><input type='number' min='0' max='36' name='pro' value='0' Placeholder="Enter the number of Projects" class="dn w-100"></td>
        </tr>
        <tr>
            <td>Enter the number of  VIVA : </td>
            <td><input type='number' min='0' max='36' name='viva' value='0' Placeholder="Enter the number of VIVA" class="dn w-100"></td>
        </tr>
        <tr>
            <td></br></td>
        </tr>
        <tr>
            <td colspan='2'><center><button class='aback shadow-lg lab w-100' name='cont'>Next</button></center></td></tr>
        </tr>
    </table>
    </form>
    </div>
    <?php
    session_start();
    if(isset($_POST['cont'])){
        $quiz=$_POST["quiz"];
        $ct=$_POST["test"];
        $mid=$_POST["mid"];
        $final=$_POST["final"];
        $assingment=$_POST["assignment"];
        $preset=$_POST["present"];
        $pro=$_POST["pro"];
        $viva=$_POST["viva"];

        if($_POST["quiz"]==0 && $_POST["test"]==0 && $_POST["mid"]==0 && $_POST["final"]==0 && $_POST["lab"]==0 && $_POST["assignment"]==0 && $_POST["present"]==0 && $_POST["pro"]==0){
            header("location:exam_no.php?no=You've given all field as 0, You have take atleast 1 exam/assignment to submit your grade");
        }
        else if( ($_POST["quiz"]>=0 ||!empty($_POST["quiz"])) && ($_POST["test"]>=0 || !empty($_POST["test"])) && ($_POST["mid"]>=0 || !empty($_POST["mid"])) && ($_POST["final"]>=0 || !empty($_POST["final"])) && ($_POST["lab"]>=0 || !empty($_POST["lab"])) && ($_POST["assignment"]>=0 || !empty($_POST["assignment"]))){
            $_SESSION["quiz"]=$_POST["quiz"];
            $_SESSION["ct"]=$_POST["test"];
            $_SESSION["mid"]=$_POST["mid"];
            $_SESSION["final"]=$_POST["final"];
            $_SESSION["assingment"]=$_POST["assignment"];
            $_SESSION["present"]=$_POST["present"];
            $_SESSION["pro"]=$_POST["pro"];
            $_SESSION["viva"]=$_POST["viva"];
            header("location:co_ver.php");
        }
        else if(empty($_POST["quiz"]) || empty($_POST["test"]) || empty($_POST["mid"]) || empty($_POST["final"]) || empty($_POST["lab"])){
            header("location:exam_no.php?empty=Please fill in the blanks and if you haven't taken any quiz or ct or mid or final or assignment or lab, please enter 0");
        }
    }
    ?>  
    <center><button class='aback shadow-lg'><a class ='lab' href="section_list.php">Cancel</a></button></center>
    </center>
</body>
</html>