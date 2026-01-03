<?php
require_once("../../connection.php");
session_start();
$course=$_SESSION['ucode'];
$q1="SELECT * from co_id where code='$course'";
$r1=mysqli_query($con,$q1);
$row1=mysqli_num_rows($r1);
$i=1;
while($i<=$row1){
    while($ro1=mysqli_fetch_assoc($r1)){
        $q3="SELECT * from co_id where code='$course' and title='".$_POST["a1$i"]."'";
        $r3=mysqli_query($con,$q3);
        $q2="UPDATE co_id set Description='".$_POST["a2$i"]."' , PO='".$_POST["a3$i"]."', bloom='".$_POST["a4$i"]."', method='".$_POST["a5$i"]."' , tool='".$_POST["a6$i"]."' where code='$course' and title='".$ro1["title"]."' ";
        $r2=mysqli_query($con,$q2);
        if(mysqli_num_rows($r3)==0){
            $q4="UPDATE co_id set title='".$_POST["a1$i"]."' where code='$course' and title='".$ro1["title"]."' ";
            $r4=mysqli_query($con,$q4);
            $i++;
        }
        else{
            $i++;
        }
    }
} 
$sum=0;
for($k=1;$k<=$row1;$k++){
    $sum=$sum+$_POST["a7$k"];
}
if($sum==100){
    $q6="SELECT * from co_id where code='$course'";
    $r6=mysqli_query($con,$q6);
    $l=1;
    while($l<=$row1){
        while($ro2=mysqli_fetch_assoc($r6)){
            $q5="UPDATE co_id set wt='".$_POST["a7$l"]."' where code='$course' and title='".$ro2["title"]."' ";
            $r5=mysqli_query($con,$q5);  
            $l++;
        }
    }
    echo "Update successful";
}
else{
    if(empty($_POST["co"])){
        $number=0;
    }
    else{
        $number = count($_POST["co"]);
    }
    if($number > 0){
        for($f=0;$f<$number;$f++){
            $sum=$sum+$_POST["wt"][$f];
            $q10="SELECT * from co_id where code='$course' and title='".$_POST["co"][$f]."'";
            $r10=mysqli_query($con,$q10);
            if(mysqli_num_rows($r10)==0){
                $q9="INSERT into co_id Values('$course','".$_POST["co"][$f]."','".$_POST["des"][$f]."' , '".$_POST["po"][$f]."','".$_POST["bloom"][$f]."','".$_POST["del"][$f]."' ,'".$_POST["as"][$f]."',0) ";
                $r9=mysqli_query($con,$q9);
                
            }
            else{
                continue;
            }
        }
        $sum1=$sum;
        if($sum1==100){
            $q11="SELECT * from co_id where code='$course'";
            $r11=mysqli_query($con,$q11);

            $g=1;
            while($g<=$row1){
                while($ro3=mysqli_fetch_assoc($r11)){
                    $q13="UPDATE co_id set wt='".$_POST["a7$g"]."' where code='$course' and title='".$ro3["title"]."' ";
                    $r13=mysqli_query($con,$q13); 
                    if($g<=$row1){
                        $g++;
                    }
                    else{
                        break;
                    }
                }
            }
            
            for($e=0;$e<$number;$e++){
                $q12="UPDATE co_id set wt='".$_POST["wt"][$e]."' where code='$course' and title='".$_POST["co"][$e]."' ";
                $r12=mysqli_query($con,$q12);  
            }
            echo "Update successful";
        }  
        else{
            echo "Failed Update CO weightage as sum of weightage is not equal to 100%";
        } 
    }
    else{
        echo "Failed Update CO weightage as sum of weightage is not equal to 100%";
    }
}
?>