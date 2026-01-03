<?php
session_start();
if(isset($_GET['d']) && isset($_GET['fn'])){
    $_SESSION['temp_dep']=$_GET['d'];
    $_SESSION['temp_fn']=$_GET['fn'];
    if(isset($_GET['in'])){
        $_SESSION['temp_in']=$_GET['in'];
    }
    header('location:update_chair.php');
}
else{
    header('location:../../index.php');
}
?>