<?php
session_start();
include ('includes/header.php')


?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patient Data Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['patient_edit_data_btn'])){
            $id=$_POST['patient_edit_id'];
            $name=$_POST['patient_edit_name'];
            @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
            $query="SELECT * FROM patient WHERE ID='$id'";
            $res=$db->query($query);
            $query1="SELECT * FROM regestration WHERE username='$name'";
            $res1=$db->query($query1);
            foreach($res as $row) {
                foreach($res1 as $row1){
                ?>
                <form action="code.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="pt_edit_id" value="<?php echo $row['ID'] ?>" >
                    <input type="hidden" name="pt_edit_name" value="<?php echo $row['Name'] ?>" >
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" name="edit_nam" value="<?php echo $row['Name'] ?>" class="form-control" >
                    </div>


                    <div class="mb-3">
                        <label >Email</label>
                        <input type="email" name="edit_Email" value="<?php echo $row1['email'] ?>"  class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label >Password</label>
                        <input type="text" name="edit_Password" value="<?php echo $row1['password'] ?>"  class="form-control">
                    </div>

                    <div class="mb-3">
                        <label >TeleNO</label>
                        <input type="tel" name="edit_TeleNO" value="<?php echo $row['TeleNO'] ?>"  class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label >BirthDate</label>
                        <input type="date" name="edit_BirthDate" value="<?php echo $row['BirthDate'] ?>"   class="form-control">
                    </div>



                    <a href="view-patients.php" class="btn btn-danger">CANCEL</a>
                    <button type="submit" name="patient_update_btn" class="btn btn-primary">Update</button>


                </form>
                <?php
                }
            }
        }
        ?>

    </div>
</div>


<?php
include ('includes/footer.php')
?>
<?php
include ('includes/scripts.php')
?>




























<?php
include ('includes/footer.php')
?>
<?php
include ('includes/scripts.php')
?>
