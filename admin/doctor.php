
<?php
session_start();
$g=$_SESSION['log'];
include ('inc/header.php')
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
                    <form action="edit_doctors.php" method="post">
                        <input type="hidden" name="edit_dat_i" value="<?php echo "$g"; ?>">
                    <button type="submit" name="sendo" class="btn btn-primary" >Edit DETAILS</button>
                    </form>
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

                    <table class="table " style="background-color: white;">

                        <?php
                        if($res)
                        {
                            while($row=mysqli_fetch_array($res)){
                                ?>
                                <tbody>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th><?php echo $row['Name'];?></th>
                                </tr>
                                <tr>
                                    <th>Specialty</th>
                                    <th><?php echo $row['Specialty'];?></th>
                                </tr>
                                <tr>
                                    <th>Service</th>
                                    <th><?php echo $row['DepartmentName'];?></th>
                                </tr>
                                <tr>
                                    <th>Start Time</th>
                                    <th><?php echo $row['startTime'];?></th>
                                </tr>
                                <tr>
                                    <th>End Time</th>
                                    <th><?php echo $row['endTime'];?></th>
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
include ('inc/footer.php')
?>
<?php
include ('inc/scripts.php')
?>

