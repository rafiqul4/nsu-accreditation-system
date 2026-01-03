<?php 
require_once("../../connection.php");
?>
<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<body>
</br>
<center>
<?php
$cur_date=date("Y-m-d");
$sql="SELECT * from semester ORDER by end DESC";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==0){
    echo "<h3 class='lev'>No semester has been created</h3>";
}
else{
?>
<h3 class='lev'>Semester list</h3></br>
<?php
if(@$_GET['del']==true){
    ?><center> <div class="alert alert-primary w-50" role="alert">
    <p> <?php echo $_GET['del']?> </p>
    </div></center><?php
}
if(@$_GET['same']==true){
    ?><center> <div class="alert alert-primary w-50" role="alert">
    <p> <?php echo $_GET['same']?> </p>
    </div></center><?php
}
if(@$_GET['no']==true){
    ?><center> <div class="alert alert-primary w-50" role="alert">
    <p> <?php echo $_GET['no']?> </p>
    </div></center><?php
}
if(@$_GET['ok']==true){
    ?><center> <div class="alert alert-primary w-50" role="alert">
    <p> <?php echo $_GET['ok']?> </p>
    </div></center><?php
}
$cur_date=date("Y-m-d");
$sql="SELECT * from semester ORDER by end DESC";
$result=mysqli_query($con,$sql);
?>
<table class='tab1 w-50'>
    <thead class='the1'>
    <tr class='tr1'>
    <th class='th1'>Season</th>
    <th class='th1'>Year</th>
    <th class='th1'>Start</th>
    <th class='th1'>End</th>
    <th class='th1' colspan='3'></th>
    </tr>
    </thead>
<?php
    while($row=mysqli_fetch_assoc($result)){
        if($cur_date>=$row['start'] && $cur_date<=$row['end']){
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row['season']."</td>";
            echo "<td class='td1'>".$row['year']."</td>";
            echo "<td class='td1'>".$row['start']."</td>";
            echo "<td class='td1'>".$row['end']."</td>";
            echo "<td class='td1'><b>Current Semester</b></td>";
            echo "<td class='td1'><a class='up' href='edit_sem.php?us=$row[season] && uy=$row[year] && u1=$row[start] && u2=$row[end]'><i title='Update Semester' class='fa fa-edit'></i></a></td>";
            echo "<td class='td1'><a class='del' href='del_sem.php?ds=$row[season] && dy=$row[year]'><i title='Update Semester' class='fa fa-close'></i></a></td>";
            echo "</tr>";

        }
        else{
            echo "<tr class='tr1'>";
            echo "<td class='td1'>".$row['season']."</td>";
            echo "<td class='td1'>".$row['year']."</td>";
            echo "<td class='td1'>".$row['start']."</td>";
            echo "<td class='td1'>".$row['end']."</td>";
            echo "<td></td>";
            echo "<td class='td1'><a class='up' href='edit_sem.php?us=$row[season] && uy=$row[year] && u1=$row[start] && u2=$row[end]'><i title='Update Semester' class='fa fa-edit'></i></a></td>";
            echo "<td class='td1'><a class='del' href='del_sem.php?ds=$row[season] && dy=$row[year]'><i title='Update Semester' class='fa fa-close'></i></a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}
?>  
</br><div><button class='aback'><a class='lab' href="../admin_home.php">Back</a></button></div>
</center>
</body>
</html>