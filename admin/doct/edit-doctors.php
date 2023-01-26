<?php
//session_start();
include ('../inc/header.php')


?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Doctor Data Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['sendo'])){
            $name=$_POST['edit_dat_i'];
            @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
            $query="SELECT * FROM doctor WHERE Name='$name';";
            $res=$db->query($query);
            $id=mysqli_fetch_array($res);
            $idd=$id['ID'];
            $query="SELECT * FROM doctor WHERE ID='$idd';";
            $res=$db->query($query);
            $query1="SELECT * FROM regestration WHERE username='$name';";
            $res1=$db->query($query1);
            foreach($res as $row){
                foreach($res1 as $row1){
                    ?>
                    <form action="cod.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="do_edit_id" value="<?php echo $row['ID'] ?>" >
                        <input type="hidden" name="do_edit_name" value="<?php echo $row['Name'] ?>" >
                        <div class="mb-3">
                            <label >Name</label>
                            <input type="text" name="editt_name" value="<?php echo $row['Name'] ?>" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label >Email</label>
                            <input type="text" name="d_edit_em" value="<?php echo $row1['email'] ?>" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label >Password</label>
                            <input type="text" name="d_edit_pa" value="<?php echo $row1['password'] ?>" class="form-control" >
                        </div>


                        <div class="mb-3">
                            <label >Specialty</label>
                            <input type="text" name="edit_Spec" value="<?php echo $row['Specialty'] ?>"  class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label >Department Name</label>
                            <input type="text" name="edit_Dept" value="<?php echo $row['DepartmentName'] ?>"  class="form-control">
                        </div>

                        <div class="mb-3">
                            <label >Working Hours</label>
                            <input type="time" name="edit_sT" value="<?php echo $row['startTime'] ?>"  class="form-control" >
                            <input type="time"  name="edit_eT" value="<?php echo $row['endTime'] ?>"  class="form-control"  >
                        </div>

                        <div class="mb-3">
                            <label >Upload Img</label>
                            <input type="file" name="Doctormo_image" value="<?php echo $row['image'] ?>"  id="Doctormo_image" class="form-control">
                        </div>



                        <a href="doctor.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="doct_update_btn" class="btn btn-primary">EDIT</button>


                    </form>
                    <?php
                }
            }
        }
        ?>

    </div>
</div>




















<?php
include ('../inc/footer.php')
?>
<?php
include ('../inc/scripts.php')
?>





























