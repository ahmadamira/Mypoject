<?php

include ('inc/header.php')


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Doctor Data Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['d_edit_data_btn'])){
            $id=$_POST['d_edit_id'];

            @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
            $query="SELECT * FROM doctor WHERE ID='$id'";
            $res=$db->query($query);

            foreach($res as $row){

                ?>
                <form action="code.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="edit_id" value="<?php echo $row['ID'] ?>" >
                    <input type="hidden" name="edit_name" value="<?php echo $row['Name'] ?>" >
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" name="edittt_name" value="<?php echo $row['Name'] ?>" class="form-control" >
                    </div>




                    <div class="mb-3">
                        <label >Specialty</label>
                        <input type="text" name="edit_Specialty" value="<?php echo $row['Specialty'] ?>"  class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label >Department Name</label>
                        <input type="text" name="edit_Department" value="<?php echo $row['DepartmentName'] ?>"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label >Working Hours</label>
                        <input type="time" name="edit_startTime" value="<?php echo $row['startTime'] ?>"  class="form-control" >
                        <input type="time"  name="edit_endTime" value="<?php echo $row['endTime'] ?>"  class="form-control"  >
                    </div>

                    <div class="mb-3">
                        <label >Upload Img</label>
                        <input type="file" name="Doctor_image" value="<?php echo $row['image'] ?>"  id="Doctor_image" class="form-control">
                    </div>



                    <a href="doctor.php" class="btn btn-danger">BACK</a>



                </form>
                <?php

            }
        }
        ?>

    </div>
</div>















<?php
include ('inc/footer.php')
?>
<?php
include ('inc/scripts.php')
?>
