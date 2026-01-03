<html>
<link rel='shortcut icon' type='x-icon' href='../../Images/mini.png'>
<link rel="stylesheet" href="../../CSS/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../CSS/bootstrap.min.css">
<script type="text/javascript" src="../../Timeout/two_level.js"></script>
<body>
<?php
session_start();
require_once("../../connection.php");
if(isset($_SESSION['special'])){
    ?>
        <div class="container-fluid">
            
            <!-- Top Bar -->
            <div class="row bg-primary text-white custom_height align-items-center">
                <div class="col-2 ">
                    <h1 class="obe-animation"><a class='lab' href='../admin_home'>OBE</a></h1>
                </div>
                <div class="col-7 text-center">
                    <h4>Admin Mode</h4>
                </div>

                <div class="col-3 popup-top-bar">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" class="btn4 bg-primary btn-primary popup-button float-end" data-toggle="modal" data-target="#teacherProfileModal">
                        <img src="../../Images/profile.jpg" alt="Popup Image" class="popup-image rounded-circle" style="width: 60px; height: 60px;">
                    </button>
                </div>
            </div>
        


            <!-- Teacher Profile Modal -->
            <div class="modal fade" id="teacherProfileModal" tabindex="-1" role="dialog" aria-labelledby="teacherProfileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog w-100 position-absolute top-0 end-0" role="document">
                    <div class="modal-content w-75" style="height: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="teacherProfileModalLabel">Profile</h5>
                        </div>
                        <div class="modal-body">
                            <div style="width: 100px; height: auto; margin: 0 auto;">
                                <img src="../../Images/profile.jpg" alt="Teacher's Photo" class="popup-image rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <h3 class="text-center"><?php echo $_SESSION['name'] ?></h3>
                            <h3 class="text-center">Initial :<?php echo " ".$_SESSION['admin'] ?></h3>
                            <h3 class="text-center"><a href='../Update/type_password' class="text-primary lab"><u>Update Profile</u></a></h3><br>
                            <center><a class="btn btn-danger btn-block text-center w-100" href="../admin_logout?logout">Logout</a></center>
                        </div>
                    </div>
                </div>
            </div> 

        </div>
        <br>
        <center class='lev'>
            <h3>Admin Lists</h3>
            <table class='tab1'>
                <thead class='the1'>
                    <tr class='tr1'>
                        <th class='th1'>Initial</th>
                        <th class='th1'>Name</th>
                        <th class='th1'>Email</th>
                        <th class='th1'></th>
                    </tr>
                </thead>
                <tfoot class='tfo'>
                    <tr class='tr1'>
                        <td class='td1' colspan='4'><a class='btn btn-info text-white h5' a href='faculty'>Add</a></td>
                    </tr>
                </tfoot>
                <?php
                $sql="SELECT * from admin where name!='admin'";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr class='tr1'>";
                        echo "<td class='td1'>".$row['name']."</td>";
                        $query="SELECT * FROM faculty WHERE initial='$row[name]'";
                        $res=mysqli_query($con,$query);
                        $fetch=mysqli_fetch_assoc($res);
                        echo "<td class='td1'>".$fetch['name']."</td>";
                        echo "<td class='td1'>".$fetch['email']."</td>";
                        echo "<td class='td1'><a class='del' a href='del?code=$row[name]'><i title='Update faculties' class='fa fa-close'></i></a></td>";
                        echo "</tr>";
                    }
                }
                else{
                    echo "<tr class='tr1'><td class='td1' colspan='4'>No admin added</td></tr>";
                }
                ?>
            </table>
        </center>
    <?php
    
}
else{
    header('location: ../ncvisgsgdsogndsksgsnbsnbisnigssdngsincknbkcsnsdgsgjcbxjcbcxbgrjfdjgjfsj/index');
}
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>