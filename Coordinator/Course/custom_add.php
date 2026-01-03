<html>
    <link rel="stylesheet" href="../../CSS/style.css" type="text/css">
    <link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <SCRIPT LANGUAGE="javaScript" type="text/javaScript">
    window.history.forward()
    </SCRIPT>
<body>
<?php
require_once("../../connection.php");
session_start();
$course=$_SESSION['acode'];
?>
<center>
</br>
<?php if(@$_GET['fail']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['fail']?> </div> <?php }?>
<div class='container my-5 w-75 bg-white text-light p-2 rounded-4 shadow-lg'>
    <h3 class='lev'><?php echo $course." "; ?> Outcome</h3></br></br>
    <div>
    <form method="POST" action="custom_process.php">  
    <table id="dynamic_field">
    <tr class='lev'>
        <th>SL</th>
        <th>CO Desciption</th>
        <th>POs</th>
        <th>Bloom's taxonomy domain/level</th>
        <th>Delivery methods and activities</th>
        <th>Assessment tools</th>
        <th>CO Wt</th>
        <th></th>
    </tr>
    <?php
    $q1="SELECT * from co_id where code='$course'";
    $r1=mysqli_query($con,$q1);
    $row1=mysqli_num_rows($r1);
    $i=1;
    while($row1=mysqli_fetch_assoc($r1)){
        while($i<=7){
            echo "<tr>";
            echo "<td><input class='dna w-100' name='a1$i' value='$row1[title]' readonly></td>";
            echo "<td><input class='dna w-100' name='a2$i' value='$row1[Description]' required></td>";
            echo "<td><input maxlength='1' class='dna w-100' name='a3$i' value='$row1[PO]' required></td>";
            echo "<td><input class='dna w-100' name='a4$i' value='$row1[bloom]' required></td>";
            echo "<td><input class='dna w-100' name='a5$i' value='$row1[method]' required></td>";
            echo "<td><input class='dna w-100' name='a6$i' value='$row1[tool]' required></td>";
            echo "<td><input type='number' min='0' max='100' class='dna w-100' name='a7$i' value='$row1[wt]' required></td>";
            echo "<td></td>";
            echo "</tr>";
            $i++;
            break;
        }
    }
    ?> 
    </table>
    </br>
    <button class='aback' id = 'submit' name='update'>Add</button>
    </form>  
</div>
</div>
<form method="POST">
<input type='submit' class='aback' value='Cancel' name='Cancel'/>
</form>
</center>
<?php
if(isset($_POST['Cancel'])){
    $dq="DELETE from co_id where code='$course'";
    $dr=mysqli_query($con,$dq);
    header("location:course_list.php");
}
?>
</body>
</html>