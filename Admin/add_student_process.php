<?php
session_start();
require_once("../connection.php");
if(isset($_POST['save_date']))
  {
    if(empty($_POST['id']) || empty($_POST['fname']) || empty($_POST['no']) || empty($_POST['email'])){
      header("location:Add_student.php?Empty=please fill in the blanks");
    }  
    else{
      $id= $_POST['id'];    
      $fname = $_POST['fname'];
      $Phone_Number=$_POST['no'];
      $email=$_POST['email'];
      $dep=$_POST['dep'];
      $q1="select * from student where id='$id'";
      $r1=mysqli_query($con, $q1);
      $b1=mysqli_num_rows($r1);
      $q2="select * from student where email='$email'";
      $r2=mysqli_query($con, $q2);
      $b2=mysqli_num_rows($r2);
      $q3="select * from student where phone_number='$Phone_Number'";
      $r3=mysqli_query($con, $q3);
      $b3=mysqli_num_rows($r3);
      if($b1==0 && $b2==0 && $b3==0){
        $query = "INSERT INTO student(id,name,phone_number,email,dep)
        VALUES ('$id','$fname','$Phone_Number','$email','$dep')";
        $result = mysqli_query($con, $query);
        header("location:add_student.php?Stop=Student Added");
      }
      else if($b1>0){
        header("location:add_student.php?Done=ID already exists");
      }
      else if($b2>0){
        header("location:add_student.php?e=Email already exists");
      }
      else if($b3>0){
        header("location:add_student.php?p=Phone Number already exists");
      }
    }
}
?>
