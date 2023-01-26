<?php
session_start();
include ('in/header.php')


?>







    <div class="container-fluid px-4">
        <h1 class="mt-4">Doctors</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Doctors</li>
        </ol>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctors Info</h4>
                        <a class="btn btn-primary" href="bookappo.php">BOOK APPOINTMENT</a>
                    </div>
                    <div class="card-body">

                        <?php

                        if(isset($_SESSION['success'])&& $_SESSION['success']!=''){
                            echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
                            unset($_SESSION['success']);
                        }
                        if(isset($_SESSION['status'])&& $_SESSION['status']!=''){
                            echo '<h2 class="bg-primary text-white">'.$_SESSION['status'].'</h2>';
                            unset($_SESSION['status']);
                        }
                        ?>
                        <?php
                        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
                        $qrystr="SELECT * FROM doctor";
                        $res=$db->query($qrystr);

                        if(mysqli_num_rows($res)>0){

                        ?>

                        <table class="table table-bordered" id="dataTable" style=" width:100%"; cellspacing:"0";" >
                        <thead >
                        <tr>
                            <th>Photo</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Department Name</th>
                            <th>Working Hours</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        while($row=mysqli_fetch_assoc($res)){
                            ?> <!--$row['image'];-->
                            <tr>
                                <td><?php echo'<img src="upload/'.$row['image'].'" width="100px" height="100px" alt="">'?></td>
                                <td><?php echo $row['ID'];?></td>
                                <td><?php echo $row['Name'];?></td>
                                <td><?php echo $row['Specialty'];?></td>
                                <td><?php echo $row['DepartmentName'];?></td>
                                <td><?php echo $row['startTime'];?>-<?php echo $row['endTime'];?></td>

                            </tr>
                            <?php
                        }




                        ?>

                        </tbody>
                        </table>
                    </div>
                    <?php
                    }
                    else{
                        echo "No Record Found";
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>


<?php
include ('in/footer.php')
?>
<?php
include ('in/scripts.php')
?>