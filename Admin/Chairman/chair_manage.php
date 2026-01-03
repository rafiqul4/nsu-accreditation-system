<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<?php
require_once("../../connection.php");
if(@$_GET['run']==true){
?> <center><h2><div class="alert">
<p> <?php echo $_GET['run']?> </p>
</div></h2></center> <?php
}
$list="select * from department";
$r_list=mysqli_query($con,$list);
if (mysqli_num_rows($r_list) > 0){
    echo "<br>";
    echo "<center>";
    echo"<table class='tab1'>";
    echo "<thead class='the1'>";
    echo "<tr class='tr1'>";
    echo "<th class='th1'>"."<b>"."Department"."</b>"."</td>";
    echo "<th class='th1'>"."<b>"."Department Name"."</b>"."</th>";
    echo "<th class='th1'>"."<b>"."Current Chairman"."</b>"."</th>";
    echo "<th class='th1'>"."<b>"."Name"."</b>"."</th>";
    echo "<th class='th1'>"."<b>".""."</b>"."</th>";
    echo "</tr>";
    echo "</thead>";
    echo '<tfoot class="tfo">'.'<tr>'.'<th class="th1" colspan="6">'."<button class='newdep'>"."<a class='lab' href='new_dep.php'>"."Add a new department"."</a>"."</button>".'</th>'.'</tr>'. '</tfoot>';
    while($row = mysqli_fetch_assoc($r_list)){
        if($row["c_initial"]==NULL || $row["name"]==NULL){
            $row["c_initial"]="N/A";
            $row["name"]="N/A";
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row["dep"]."</td>";
            echo "<td class='td1'>".$row["dep_name"]."</td>";
            echo "<td class='td1'>".$row["c_initial"]."</td>";
            echo "<td class='td1'>".$row["name"]."</td>";
            echo "<td class='td1'>"."<center>"."<button class='set'>"."<a class='lab' href='temp.php?in=$row[c_initial] && d=$row[dep] && fn=$row[name]'>"."Appoint chairman"."</a>"."</button>"."</center>"."</td>";
            echo "</tr>";

        }
        else{
        echo "<tr class='tr1'>";
        echo "<td class='td1'>".$row["dep"]."</td>";
        echo "<td class='td1'>".$row["dep_name"]."</td>";
        echo "<td class='td1'>".$row["c_initial"]."</td>";
        echo "<td class='td1'>".$row["name"]."</td>";
        echo "<td class='td1'>"."<center>"."<button class='set'>"."<a class='lab' href='temp.php?in=$row[c_initial] && d=$row[dep] && fn=$row[name]'>"."Update chairman"."</a>"."</button>"."</center>"."</td>";
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</center>";
    echo "<br>";
}
else {
    echo "<center>"."<H1>"."No chairman has been assigned to any department"."</center>"."</H1>";
}
echo "<center>"."<button class='aback'>"."<a class='lab' href='../admin_home.php'>"."Back"."</a>"."</button>"."</center>";
?>