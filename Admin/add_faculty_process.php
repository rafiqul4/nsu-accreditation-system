<?php
session_start();
require_once("../connection.php");
if(isset($_POST['save_date']))
  {
    if(empty($_POST['initial']) || empty($_POST['fname']) || empty($_POST['password']) || empty($_POST['no']) || empty($_POST['email'])  || empty($_POST['dateofbirth']) || empty($_POST['dep'])){
      header("location:Add_faculty.php?Empty=please fill in the blanks");
    }  
    else{
      $initial= $_POST['initial'];    
      $fname = $_POST['fname'];
      $password=md5($_POST['password']);
      $Phone_Number=$_POST['no'];
      $email=$_POST['email'];
      $Birthdate = date('Y-m-d', strtotime($_POST['dateofbirth']));
      $dep=$_POST['dep'];
      $q1="select * from faculty where initial='$initial'";
      $r1=mysqli_query($con, $q1);
      $b1=mysqli_num_rows($r1);
      $q2="select * from faculty where email='$email'";
      $r2=mysqli_query($con, $q2);
      $b2=mysqli_num_rows($r2);
      $q3="select * from faculty where phone_number='$Phone_Number'";
      $r3=mysqli_query($con, $q3);
      $b3=mysqli_num_rows($r3);
      if($b1==0 && $b2==0 && $b3==0){
        $query = "INSERT INTO faculty(initial,name,PASSWORD,phone_number,email,birthday,department)
        VALUES ('$initial','$fname','$password','$Phone_Number','$email','$Birthdate','$dep')";
        $result = mysqli_query($con, $query);
        header("location:add_faculty.php?Stop=Faculty Added");
      }
      else if($b1>0){
        header("location:add_faculty.php?Done=Initial already exists");
      }
      else if($b2>0){
        header("location:add_faculty.php?e=Email already exists");
      }
      else if($b3>0){
        header("location:add_faculty.php?p=Phone Number already exists");
      }
    }
}
?>
