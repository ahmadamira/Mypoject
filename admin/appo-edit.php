<?php
session_start();
include ('includes/header.php')


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Appointment Data Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['apppo_edit_data_btn'])){
            $id=$_POST['appo_edit_id'];

            @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
            $query="SELECT * FROM appointment WHERE ID='$id'";
            $res=$db->query($query);

            foreach($res as $row) {

                    ?>
                    <form action="code.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="appo_edit_id" value="<?php echo $row['ID'] ?>" >



                        <div class="mb-3">
                            <label >Appointment Time</label>
                            <input type="time" name="appo_edit_startTime" value="<?php echo $row['startAppoTime'] ?>"  class="form-control" >
                            <input type="time"  name="appo_edit_endTime" value="<?php echo $row['EndAppoTime'] ?>"  class="form-control"  >
                        </div>

                        <div class="mb-3">
                        <label >Choose </label>

                        <select name="choose" >
                            <option name="accept" value="accept">Accept</option>
                            <option name="reject" value="reject">Reject</option>

                        </select>
                        </div>




                        <a href="view-appointment.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" name="appo_update_btn" class="btn btn-primary">EDIT</button>


                    </form>
                    <?php

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
