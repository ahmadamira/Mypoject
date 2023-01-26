<?php
session_start();
$g=$_SESSION['log'];
include ('../inc/header.php')
?>
<?php
@$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
$qrystr="SELECT * FROM doctor WHERE Name='$g'";
$res=$db->query($qrystr);

?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Patients</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Appointments</li>
    </ol>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View Appointments</h4>

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
                            <th>Patient Name</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Confirm</th>
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
                                    <th><?php echo $row['PatientName'];?></th>
                                    <th><?php echo $row['DepartmentName'];?></th>
                                    <th><?php echo $row['AppDate'];?></th>
                                    <th><?php echo $row['startAppoTime'];?></th>
                                    <th><?php echo $row['EndAppoTime'];?></th>
                                    <th>
                                        <form action="appo-edit.php" method="post" >
                                            <input type="hidden" name="appo_edit_id" value="<?php echo $row['ID'] ?>" >
                                            <button type="submit" name="apppo_edit_data_btn" class="btn btn-primary"  >Select</button>
                                        </form>
                                    </th>

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
include ('../inc/footer.php')
?>
<?php
include ('../inc/scripts.php')
?>
