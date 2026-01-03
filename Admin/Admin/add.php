<?php
require_once("../../connection.php");
session_start();
if(isset($_SESSION['special']) && $_GET['ini']){
    $initial=$_GET['ini'];
    $query="SELECT * FROM admin where name='$initial'";
    $res=mysqli_query($con,$query);
    $sql="SELECT * FROM faculty WHERE initial='$initial'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)==0 && mysqli_num_rows($result)>0){
        mysqli_query($con,"INSERT INTO admin VALUES ('$initial')");
    }
    header("location: list");
}
else{
    header('location: ../ncvisgsgdsogndsksgsnbsnbisnigssdngsincknbkcsnsdgsgjcbxjcbcxbgrjfdjgjfsj/index');
}
?>