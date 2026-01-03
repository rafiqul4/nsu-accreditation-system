<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    <?php
    require_once("../../connection.php");
    session_start();
    $user=$_SESSION['user'];
    $course=$_GET['coor'];
    $dep=$_SESSION['dep'];
    $check="select * from faculty where department='$dep' and initial!='$user'";
    $cres=mysqli_query($con,$check);
    if(mysqli_num_rows($cres)>0){
        echo"<center><table class='tab1'>";
        echo "<thead class='the1'>";
        echo "<tr class='tr1'>";
        echo "<th class='th1'>"."Intitial"."</th>";
        echo "<th class='th1'>"."Name"."</th>";
        echo "<th class='th1'>".""."</th>";
        echo "</tr>";
        echo "<thead>";
        while($row = mysqli_fetch_assoc($cres)){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row["initial"]."</td>";
            echo "<td class='td1'>".$row["name"]."</td>";
            $q1="select * from course where code='$course' and coordinator='$row[initial]'";
            $r1=mysqli_query($con,$q1);
            if(mysqli_num_rows($r1)>0){
                echo "<td class='td1'>"."<center><b>Current Coordinator</b></center>"."</td>";
            }
            else{
                echo "<td class='td1'>"."<center>"."<button class='set'>"."<a class='lab' href='set_coor.php?ini=$row[initial] && cor=$course'>"."Set as Course Coordinator"."</a>"."</button>"."</center>"."</td>";
            }
            echo "</tr>";           
        }
        echo "</table></br>";
    }
    else{
        echo "<h2 class='lev'>No faculty available apart from yourself</h2>";
    }
    ?>
    <button class='aback'><a href='course_man.php' class='lab'>Cancel</button>
</body>
</html>