<?php require_once("../../connection.php");
session_start();
?>
<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
        <?php 
        $sem=$_SESSION['sem'];
        if($sem=="New Semester has not been enrolled yet "){
            echo "<center><h1 class='my-5 lev'>In order to create section you will have to go semester management and create a new semester</h1></center>";

        }
        else{
            echo "<center>";
            $sql="SELECT * from section where semester='$sem'";
            $result=mysqli_query($con,$sql);
            $sem_row=mysqli_num_rows($result);
            if($sem_row==0){
                echo "<h1 class='my-5 lev'>You haven't created any section for any course for this semester</h1>";
                echo "<div><button class='big'><a class='lab' href='new_sec.php'>Create New Section</a></button></div></br>";
            }
            else{
                $q1="SELECT c_code,semester,COUNT(*) FROM section where semester='$sem' GROUP BY c_code,semester";
                $r1=mysqli_query($con,$q1);
                ?>
                <h3 class='lev'>Added Sections</h3>
                <table class='tab1'>
                <thead class='the1'>
                <tr class='tr1'>
                <th class='th1'>Course</th><th class='th1'>Number of Section</th>
                </tr>
                </thead>
                <?php
                while($row1=mysqli_fetch_assoc($r1)){
                    echo "<tr class='tr1'>";
                    echo "<td class='td1'>".$row1['c_code']."</td>";
                    echo "<td class='td1'>".$row1['COUNT(*)']."</td></tr>";
                }
                echo "</table></br>";
                echo "<div><button class='big'><a class='lab' href='new_sec.php'>Create New Section</a></button></div></br>";
            }
        }
        ?>
        <center><div><button class="aback"><a class='lab' href="../admin_home.php">Back</a></button></div></center></center>
    </body>
</html>