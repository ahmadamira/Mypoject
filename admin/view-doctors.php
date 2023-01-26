<?php
session_start();
include ('includes/header.php')


?>


    <!-- Modal -->
    <div class="modal fade" id="DoctorsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" name="doctor_name" class="form-control" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-3">
                        <label >Email</label>
                        <input type="text" name="doctor_email" class="form-control" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-3">
                        <label >Password</label>
                        <input type="text" name="doctor_password" class="form-control" placeholder="Enter Password" required>
                    </div>


                    <div class="mb-3">
                        <label >Specialty</label>
                        <input type="text" name="doctor_Specialty" class="form-control" placeholder="Enter Specialty" required>
                    </div>

                    <div class="mb-3">
                        <label >Department Name</label>
                        <input type="text" name="doctor_Department" class="form-control" placeholder="Enter Department Name" required>
                    </div>

                    <div class="mb-3">
                        <label >Working Hours</label>
                        <input type="time" name="startTime" class="form-control"  required>
                        <input type="time"  name="endTime" class="form-control"  required>
                    </div>

                    <div class="mb-3">
                        <label >Upload Img</label>
                        <input type="file" name="Doctor_image" id="Doctor_image" class="form-control"  required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save_doctor" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>





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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DoctorsModal">ADD</button>
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
                          <th>EDIT</th>
                          <th>DELETE</th>

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
                        <td>
                            <form action="doctor-edit.php" method="post" >
                                <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>" >
                                <input type="hidden" name="edit_name" value="<?php echo $row['Name'] ?>" >
                                <button type="submit" name="edit_data_btn" class="btn btn-primary"  >EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post" >
                            <input type="hidden" name="delete_id" value="<?php echo $row['ID'] ?>">
                                <input type="hidden" name="delete_name" value="<?php echo $row['Name'] ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger" >DELETE</button>
                            </form>

                        </td>
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
include ('includes/footer.php')
?>
<?php
include ('includes/scripts.php')
?>