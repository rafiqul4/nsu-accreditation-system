<html>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
    <body>
        <center>
        </br>
            <?php
            require_once("../../connection.php");
            $code=$_GET['wc'];
            $sql="SELECT * from co_id where code='$code'";
            $result=mysqli_query($con,$sql);
            $r=mysqli_num_rows($result);
            if($r>0){
            echo "<h2 class='lev'>".$code."</h2>";
            ?>
            <table class='tab1'>
            <tr class='tr1'>
                <th class='th1'>COs</th>
                <th class='th1'>CO Desciption</th>
                <th class='th1'>POs</th>
                <th class='th1'>Bloom's taxonomy domain/level</th>
                <th class='th1'>Delivery methods and activities</th>
                <th class='th1'>Assessment tools</th>
                <th class='th1'>CO Wt</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr class='tr1'>";
                echo "<td class='td1'>".$row['title']."</td>";
                if($row['Description']==NULL){
                    echo "<td class='td1'>N/A</td>";
                }
                else{
                    echo "<td class='td1'>".$row['Description']."</td>";
                }
                if($row['PO']==NULL){
                    echo "<td class='td1'>N/A</td>";
                }
                else{
                    echo "<td class='td1'>".$row['PO']."</td>";
                }
                if($row['bloom']==NULL){
                    echo "<td class='td1'>N/A</td>";
                }
                else{
                    echo "<td class='td1'>".$row['bloom']."</td>";
                }
                if($row['method']==NULL){
                    echo "<td class='td1'>N/A</td>";
                }
                else{
                    echo "<td class='td1'>".$row['method']."</td>";
                }
                if($row['tool']==NULL){
                    echo "<td class='td1'>N/A</td>";
                }
                else{
                    echo "<td class='td1'>".$row['tool']."</td>";
                }
                if($row['wt']==NULL){
                echo "<td class='td1'>N/A</td>";
                }
                else{
                echo "<td class='td1'>".$row['wt']."%</td></tr>";
                }
            }
            }
            else{
                echo "<h2 class='lev'>".$code." course Outcome hasn't created by the course coordinator yet</h2>";
            }
            ?>
            </table>
            </br><div><button class='aback'><a href='course_man.php' class='lab'>Back</button></div>
        </center>
    </body>
<html>