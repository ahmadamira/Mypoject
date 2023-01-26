<?php
include ('includes/header.php')
?>
<?php
@$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
$qrystr="SELECT * FROM contactus";
$res=$db->query($qrystr);

?>


    <div class="container-fluid px-4">
        <h4 class="mt-4">Admin Page</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item active">Contact US Messages</li>
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

                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <?php
                            if($res)
                            {
                                while($row=mysqli_fetch_array($res)){
                                    ?>
                                    <tbody>
                                    <tr>
                                        <th><?php echo $row['Name'];?></th>
                                        <th><?php echo $row['Emal'];?></th>
                                        <th><?php echo $row['message'];?></th>

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