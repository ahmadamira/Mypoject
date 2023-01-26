<?php
session_start();
if(isset($_POST['doct_update_btn'])){
$edit_id=$_POST['do_edit_id'];
$edit_nme=$_POST['do_edit_name'];
$edit_name=$_POST['editt_name'];
$edit_em=$_POST['d_edit_em'];
$edit_ps=$_POST['d_edit_pa'];
$edit_Spec=$_POST['edit_Spec'];
$edit_Dept=$_POST['edit_Dept'];
$edit_st=$_POST['edit_sT'];
$edit_et=$_POST['edit_eT'];
$edit_img=$_FILES["Doctormo_image"]['name'];

@$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
$query="DELETE  FROM doctor WHERE ID='$edit_id' ";
$res=$db->query($query);

$query="UPDATE regestration SET  username='$edit_name', password='$edit_ps', email='$edit_em' WHERE username='$edit_nme'";
$res=$db->query($query);

$query="INSERT INTO doctor ( `Name`, `Specialty`, `DepartmentName`, `startTime`,`endTime`,`image`) VALUES ('".$edit_name."', '".$edit_Spec."', '".$edit_Dept."', '".$edit_st."', '".$edit_et."','".$edit_img."')";
$res=$db->query($query);

if($res){
move_uploaded_file($_FILES["Doctormo_image"]["tmp_name"], "upload/".$_FILES["Doctormo_image"]["name"]);
$_SESSION['success']="Doctor Data is Updated";
$_SESSION['log']=$edit_name;
header('location: ../doctor.php');
}
else{
$_SESSION['status']="Doctor Data is Not Updated";
header('location: ../doctor.php');
}
}

//////edit appo1-edit
if(isset($_POST['appo_update_btn'])){
    $edit_id=$_POST['appo_edit_id'];

    $edit_st=$_POST['appo_edit_startTime'];
    $edit_et=$_POST['appo_edit_endTime'];
    $ch=$_POST['choose'];
    if($ch=="accept"){
        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');


        $query1="UPDATE appointment SET  startAppoTime='$edit_st', EndAppoTime='$edit_et',State='accept' WHERE ID='$edit_id'";
        $res=$db->query($query1);
        header('location: ../vie-appointment.php');

    }
    else{
        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');


        $query1="DELETE  FROM appointment  WHERE ID='$edit_id'";
        $res=$db->query($query1);
        header('location: ../vie-appointment.php');
    }






    if($res){

        $_SESSION['success']="Doctor Data is Updated";
        header('location: ../vie-appointment.php');
    }
    else{
        $_SESSION['status']="Doctor Data is Not Updated";
        header('location: ../vie-appointment.php');
    }
}
?>