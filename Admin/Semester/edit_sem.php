<?php 
require_once("../../connection.php");
?>
<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<body>
<center>
<?php
$season=$_GET['us'];
$year=$_GET['uy'];
$sdt=$_GET['u1'];
$edt=$_GET['u2'];
?>
<div>
<form method='POST'>
<table class="container my-5 w-25 h-50 bg-white text-light p-2 rounded-4 shadow-lg">
<tr class='lev'>
    <td>Season </td>
    <td><SELECT class='sele' name="season" required>
        <OPTION class='opt' Value="<?php echo $season ?>"><?php echo $season ?></OPTION>
        <?php 
        if($season=="Spring " && $year>=2023){
            echo "<OPTION class='opt' Value='Summer'>Summer</OPTION>";
        }
        else if($season=="Summer " && $year>=2023){
            echo "<OPTION class='opt' Value='Spring'>Spring</OPTION>";
        }
        else if($season=="Spring " && $year<2023){
            echo "<OPTION class='opt' Value='Summer'>Summer</OPTION>";
            echo "<OPTION class='opt' Value='Fall'>Fall</OPTION>";
        }
        else if($season=="Summer " && $year<2023){
            echo "<OPTION class='opt' Value='Spring'>Spring</OPTION>";
            echo "<OPTION class='opt' Value='Fall'>Fall</OPTION>";
        }
        else if($season=="Fall " && $year<2023){
            echo "<OPTION class='opt' Value='Spring'>Spring</OPTION>";
            echo "<OPTION class='opt' Value='Summer'>Summer</OPTION>";
        }
        ?>
        </SELECT></td><td><button class='big' name='update1'>Update Season</button></td></tr>
    <tr class='lev'><td>Start Time</td><td><input class='dn' type='date' name= 'sdt' value=<?php echo $sdt ?>></td><td></td></tr>
    <tr class='lev'><td>End Time</td><td><input class="dn" type='date' name='edt' value="<?php echo $edt ?>" required/></td><td></td></tr>
    <tr><td colspan='3'><center><button class='big'  name='update2'>Update Dates</button></center></td></tr>
    </table>
</form>
</div>
<button class='aback'><a class='lab' href="sem_list.php">Back</a></button>
</center>
<?php
if(isset($_POST['update1'])){
    $ns=$_POST['season'];
    if($ns=="Spring"){
        $sl=1;
    }
    else if($ns=="Summer"){
        $sl=2;
    }
    else if($ns=="Fall"){
        $sl=3;
    }
    $q1="SELECT * from semester where season='$ns' and year=$year";
    $r1=mysqli_query($con,$q1);
    if(mysqli_num_rows($r1)>0){
        header("location:sem_list.php?same=Semester already exists");
    }
    
    else if(mysqli_num_rows($r1)==0){
        $q2="UPDATE semester set serial=$sl,season='$ns' where season='$season' and year=$year";
        $r2=mysqli_query($con,$q2);
        if($r2){
            header("location:sem_list.php?ok=Semester updated");
        }
    }
}
else if(isset($_POST['update2'])){
    $nsdt=$_POST['sdt'];
    $nedt=$_POST['edt'];
    $ny=date('Y', strtotime($nsdt));
    if($nedt<$nsdt){
        header("location:sem_list.php?no=Start date has to be less than End date");
    }
    else if($nedt>$nsdt){
        $q2="UPDATE semester set year=$ny,start='$nsdt',end='$nedt' where season='$season' and year=$year";
        $r2=mysqli_query($con,$q2);
        if($r2){
            header("location:sem_list.php?ok=Semester updated");
        }
    }
}

?>
</body>
</html>