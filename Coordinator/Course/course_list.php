<html>
<head>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
</head>
<body>
<?php
require_once("../../connection.php");
session_start();
$cor=$_SESSION['user'];
$q1="SELECT * from course where coordinator='$cor'";
$r1=mysqli_query($con,$q1);
?>
<center>
<h2 class='lev'>Course List</h2>
<?php if(@$_GET['done']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['done']?> </div> <?php }?>
<?php if(@$_GET['del']==true){ ?> <div class="alert alert-primary d-inline-flex p-2" role="alert"> <?php echo $_GET['del']?> </div> <?php }?>
<table class='tab1'>
    <tr class='tr1'>
        <th class='th1'>Course Code</td>
        <th class='th1'>Course Tittle</td>
        <th class='th1'>Course Credit</td>
        <th class='th1'>Course Outcome</td>
        <th colspan='3'></td>
    </tr>
<?php
while($row=mysqli_fetch_assoc($r1)){
    echo "<tr class='tr1'><td class='td1'>".$row['code']."</td>";
    echo "<td class='td1'>".$row['title']."</td>";
    echo "<td class='td1'>".$row['credit']."</td>";
    $query="select * from co_id where code='$row[code]'";
    $res=mysqli_query($con,$query);
    $rrow=mysqli_num_rows($res);
    if($rrow>0){
    ?>
    <td class='td1'><?php while($r=mysqli_fetch_assoc($res)){
        $final=$r['title']."&nbsp;&nbsp;&nbsp;"; 
        echo $final;
        }
        echo "</td>";
    } 
    else{
        echo "<td><center>N/A</center></td>";
    }   
    if($rrow==0){
        echo "<td colspan='3' class='td1'><a class='plus' href='co_add.php?cor=$row[code]'><i title='ADD' class='fa fa-plus'></i></a></td>";
    }
    else{
        echo "<td class='td1'><a class='set' href='wc.php?wc=$row[code]'>Check</a></td>";
        echo "<td class='td1'><a class='up' href='temp_course.php?uc=$row[code]'><i title='UPDATE' class='fa fa-edit'></i></a></td>";
        echo "<td class='td1'><a class='del' href='delete_co.php?dc=$row[code]'><i title='DELETE' class='fa fa-close'></i></a></td>";
    }  
    echo "</tr>";
}
?>
</table></br>
<button class='aback'><a class='lab' href='../Home.php'>Back</a></button></center>
</body>
</html>