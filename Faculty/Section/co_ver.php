<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<div class="container my-5 w-50 bg-white text-light p-2 rounded-4 shadow-lg">
    <?php
    require_once("../../connection.php");
    session_start();
    $course=$_SESSION['f_course'];
    $section = $_SESSION['section'];
    $quiz=$_SESSION["quiz"];
    $ct=$_SESSION["ct"];
    $mid=$_SESSION["mid"];
    $final=$_SESSION["final"];
    $assignment=$_SESSION["assingment"];
    $present=$_SESSION["present"];
    $pro=$_SESSION["pro"];
    $viva=$_SESSION["viva"];
    ?>
    <center><h3 class='lev'><?php echo $section ?></h3></center></br>
    <form method="POST">
    <?php
    if(@$_GET['stat']==true){ ?> <div class="alert alert-primary" role="alert"> <?php echo "<center>".$_GET['stat']."</center>"?> </div> <?php }
    ?>
    <br>
    <div class='new'><div class='new_box'>
    <input type='text' id="search" name='question' class='bin' placeholder='Google Drive Link for Questions' autocomplete="off" required/>
    </div></div>
    <center>
    <table class='lev'>
    <tr><td>&nbsp</td></tr>
    <tr>
    <th>Assesments</th>
    <th>Mark</th>
    <th>CO</th>
    </tr>
    <?php
    for($a=1;$a<=$ct;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='CT$a' value='CT$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mCT$a'></td>"; 
        echo "<td><div><SELECT name='cCT$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "</SELECT></td>";
        echo "<tr>";
    }
    for($a=1;$a<=$quiz;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='Q$a' value='Q$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mQ$a'></td>"; 
        echo "<td><div><SELECT name='cQ$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }    
        echo "<tr>";
    }
    for($a=1;$a<=$mid;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='M$a' value='MID$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mM$a'></td>"; 
        echo "<td><div><SELECT name='cM$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    for($a=1;$a<=$final;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='F$a' value='Final$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mF$a'></td>"; 
        echo "<td><div><SELECT name='cF$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    for($a=1;$a<=$assignment;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='A$a' value='Assignment$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mA$a'></td>"; 
        echo "<td><div><SELECT name='cA$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    for($a=1;$a<=$present;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='P$a' value='Presentation$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mP$a' ></td>"; 
        echo "<td><div><SELECT name='cP$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    for($a=1;$a<=$pro;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='Pro$a' value='Project$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mPro$a'></td>"; 
        echo "<td><div><SELECT name='cPro$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    for($a=1;$a<=$viva;$a++){
        $cq="SELECT * from co_id where code='$course'";
        $rq=mysqli_query($con,$cq);
        echo "<tr>";
        echo "<td><input class='dna w-100' type='text' name='viva$a' value='VIVA$a' readonly></td>";
        echo "<td><input class='dna w-100' value='0' type='number' min='0' max='100' step='any' name='mviva$a'></td>"; 
        echo "<td><div><SELECT name='cviva$a' class='sele'>
                <OPTION Value='NONE' class='opt'>NONE</OPTION>";
        while($row=mysqli_fetch_assoc($rq)) {
            echo "<OPTION Value='$row[title]' class='opt'>".$row['title']."</OPTION>";
        }
        echo "<tr>";
    }
    ?>
    </table>
    </center>
    </br>
    <center><button class='aback' name='submit'>Submit</button></center>
    </form>
    </div>
    <center><button class='aback shadow-lg'><a class ='lab' href="exam_no.php">Cancel</a></button></center>
    </center>
    <?php
    if(isset($_POST['submit'])){
            $arr=array();
            for($i=1;$i<=$ct;$i++){
                if($_POST["cCT$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cCT$i"]);
                    }
                    else{
                        if(!in_array($_POST["cCT$i"],$arr)){
                            array_push($arr,$_POST["cCT$i"]);
                        }
                    }
                    
                }
            }

            
            for($i=1;$i<=$quiz;$i++){
                if($_POST["cQ$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cQ$i"]);
                    }
                    else{
                        if(!in_array($_POST["cQ$i"],$arr)){
                            array_push($arr,$_POST["cQ$i"]);
                        }
                    }
                }
            }
            
            for($i=1;$i<=$mid;$i++){
                if($_POST["cM$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cM$i"]);
                    }
                    else{
                        if(!in_array($_POST["cM$i"],$arr)){
                            array_push($arr,$_POST["cM$i"]);
                        }
                    }
                }
            }
            for($i=1;$i<=$final;$i++){
                if($_POST["cF$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cF$i"]);
                    }
                    else{
                        if(!in_array($_POST["cF$i"],$arr)){
                            array_push($arr,$_POST["cF$i"]);
                        }
                    }  
                }
            }
            for($i=1;$i<=$assignment;$i++){
                if($_POST["cA$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cA$i"]);
                    }
                    else{
                        if(!in_array($_POST["cA$i"],$arr)){
                            array_push($arr,$_POST["cA$i"]);
                        }
                    }
                }
            }
            for($i=1;$i<=$present;$i++){
                if($_POST["cP$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cP$i"]);
                    }
                    else{
                        if(!in_array($_POST["cP$i"],$arr)){
                            array_push($arr,$_POST["cP$i"]);
                        }
                    }
                }
            }
            for($i=1;$i<=$pro;$i++){
                if($_POST["cPro$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cPro$i"]);
                    }
                    else{
                        if(!in_array($_POST["cPro$i"],$arr)){
                            array_push($arr,$_POST["cPro$i"]);
                        }
                    }
                }
            }
            for($i=1;$i<=$viva;$i++){
                if($_POST["cviva$i"]!="NONE"){
                    if(count($arr)==0){
                        array_push($arr,$_POST["cviva$i"]);
                    }
                    else{
                        if(!in_array($_POST["cviva$i"],$arr)){
                            array_push($arr,$_POST["cviva$i"]);
                        }
                    }
                }
            }



            if(count($arr)==mysqli_num_rows($rq)){

                for($i=1;$i<=$ct;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["CT$i"]."','".$_POST["cCT$i"]."','".$_POST["mCT$i"]."')";
                    $result=mysqli_query($con,$query);

                }
    
                for($i=1;$i<=$quiz;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["Q$i"]."','".$_POST["cQ$i"]."','".$_POST["mQ$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$mid;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["M$i"]."','".$_POST["cM$i"]."','".$_POST["mM$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$final;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["F$i"]."','".$_POST["cF$i"]."','".$_POST["mF$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$assignment;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["A$i"]."','".$_POST["cA$i"]."','".$_POST["mA$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$present;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["P$i"]."','".$_POST["cP$i"]."','".$_POST["mP$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$pro;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["Pro$i"]."','".$_POST["cPro$i"]."','".$_POST["mPro$i"]."')";
                    $result=mysqli_query($con,$query);
                }
    
                for($i=1;$i<=$viva;$i++){
                    $query="INSERT into exam_co values('$section','".$_POST["viva$i"]."','".$_POST["cviva$i"]."','".$_POST["mviva$i"]."')";
                    $result=mysqli_query($con,$query);
                }

                $question=$_POST['question'];
                $q1="INSERT into questions values('$section','$question')";
                $r1=mysqli_query($con,$q1);

                $q2="SELECT * from co_aprove where section='$section' and status='Disapprove'";
                $r2=mysqli_query($con,$q2);
                if(mysqli_num_rows($r2)>0){
                    $q3="UPDATE co_aprove set status=NULL where section='$section'";
                    $r3=mysqli_query($con,$q3);
                    if($r3){
                        echo "<script>window.location.href='section_list.php?'</script>";
                    }
                }
                else{
                    echo "<script>window.location.href='section_list.php?'</script>";
                }
            }

            else{
                echo "<script>window.location.href='co_ver.php?stat=You have to include all CO'</script>";
            }
    }
    ?>
</body>
</html>