<?php
include ('includes/header.php')
?>
<?php
@$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
$qrystr="SELECT * FROM patient";
$res=$db->query($qrystr);

?>
    <!-- Modal -->
    <div class="modal fade" id="PatientsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label >Name</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Enter Name" required>
                        </div>


                        <div class="mb-3">
                            <label >Email</label>
                            <input type="text" name="patient_email" class="form-control" placeholder="Enter Email" required>
                        </div>

                        <div class="mb-3">
                            <label >Password</label>
                            <input type="text" name="patient_password" class="form-control" placeholder="Enter Password" required>
                        </div>

                        <div class="mb-3">
                            <label >TeleNO</label>
                            <input type="tel" name="patient_teleNO" class="form-control" placeholder="Enter Telephone Number"  required>

                        </div>

                        <div class="mb-3">
                            <label >BirthDate</label>
                            <input type="date" name="patient_BD" class="form-control" placeholder="Enter BirthDate"  required>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_patient" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <h4 class="mt-4">Patients</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Patients</li>
        </ol>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registered Patients</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PatientsModal">ADD</button>
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

                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Tel.NO</th>
                            <th>Birth Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <?php
                        if($res)
                        {
                            while($row=mysqli_fetch_array($res)){
                                ?>
                                <tbody>
                                <tr>
                                    <th><?php echo $row['ID'];?></th>
                                    <th><?php echo $row['Name'];?></th>
                                    <th><?php echo $row['TeleNO'];?></th>
                                    <th><?php echo $row['BirthDate'];?></th>
                                    <th>
                                        <form action="patient-edit.php" method="post" >
                                            <input type="hidden" name="patient_edit_id" value="<?php echo $row['ID'] ?>" >
                                            <input type="hidden" name="patient_edit_name" value="<?php echo $row['Name'] ?>">
                                            <button type="submit" name="patient_edit_data_btn" class="btn btn-primary"  >EDIT</button>
                                        </form>
                                    </th>
                                   <th> <form action="code.php" method="post" >
                                        <input type="hidden" name="patient_delete_id" value="<?php echo $row['ID'] ?>">
                                        <input type="hidden" name="patient_delete_name" value="<?php echo $row['Name'] ?>">
                                        <button type="submit" name="patient_delete_btn" class="btn btn-danger" >DELETE</button>
                                    </form></th>
                                </tr>
                                </tbody>
                                <?php

                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>

                    </table>
                    </div>

                </div>
            </div>

        </div>
    </div>


<?php
include ('includes/footer.php')
?>
<?php
include ('includes/scripts.php')
?>