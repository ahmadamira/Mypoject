<?php
session_start();


if(isset($_POST['save_doctor'])){
    $name=$_POST['doctor_name'];
    $Specialty=$_POST['doctor_Specialty'];
    $Department=$_POST['doctor_Department'];
    $st=$_POST['startTime'];
    $pass=$_POST['doctor_password'];
    $em=$_POST['doctor_email'];
    $et=$_POST['endTime'];
    $img=$_FILES["Doctor_image"]['name'];

if(file_exists("upload/" . $_FILES["Doctor_image"]["name"]))
{
    $store=$_FILES["Doctor_image"]["name"];
    $_SESSION['status']="Image already exists. '.$store.'";
    header('location: view-doctors.php');
}
else{
    @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
    $query2="INSERT INTO regestration ( `username`, `password`, `level`,`email`) VALUES ('".$name."', '".$pass."','1', '".$em."');";
    $res=$db->query($query2);
    $query="INSERT INTO doctor ( `Name`, `Specialty`, `DepartmentName`, `startTime`,`endTime`,`image`) VALUES ('".$name."', '".$Specialty."', '".$Department."', '".$st."', '".$et."','".$img."');";
    $res=$db->query($query);

    if($res){
        move_uploaded_file($_FILES["Doctor_image"]["tmp_name"], "upload/".$_FILES["Doctor_image"]["name"]);
        $_SESSION['success']="Doctor Added";
        header('location: view-doctors.php');
    }
    else{
        $_SESSION['status']="Doctor Not Added";
        header('location: view-doctors.php');
    }
}
}
//Delete part
if(isset($_POST['delete_btn'])){
    $id=$_POST['delete_id'];
    $name=$_POST['delete_name'];
    @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
    $query="DELETE  FROM regestration WHERE username='$name' ";
    $res=$db->query($query);
    $query="DELETE  FROM doctor WHERE ID='$id' ";

    $res=$db->query($query);

    if($res){
        $_SESSION['success']="Doctor Data is Deleted";
        header('location: view-doctors.php');
    }
    else{
        $_SESSION['status']="Doctor Data is Not Deleted";
        header('location: view-doctors.php');
    }

}

//Edit part


if(isset($_POST['doctor_update_btn'])){
    $edit_id=$_POST['edit_id'];
    $edit_nm=$_POST['edit_name'];
    $edit_name=$_POST['edittt_name'];
    $edit_em=$_POST['d_edit_email'];
    $edit_ps=$_POST['d_edit_pass'];
    $edit_Spec=$_POST['edit_Specialty'];
    $edit_Dept=$_POST['edit_Department'];
    $edit_st=$_POST['edit_startTime'];
    $edit_et=$_POST['edit_endTime'];
    $edit_img=$_FILES["Doctor_image"]['name'];

    @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
    $query="DELETE  FROM doctor WHERE ID='$edit_id' ";
    $res=$db->query($query);

    $query="UPDATE regestration SET  username='$edit_name', password='$edit_ps', email='$edit_em' WHERE username='$edit_nm'";
    $res=$db->query($query);

    $query="INSERT INTO doctor ( `Name`, `Specialty`, `DepartmentName`, `startTime`,`endTime`,`image`) VALUES ('".$edit_name."', '".$edit_Spec."', '".$edit_Dept."', '".$edit_st."', '".$edit_et."','".$edit_img."');";
    $res=$db->query($query);

    if($res){
        move_uploaded_file($_FILES["Doctor_image"]["tmp_name"], "upload/".$_FILES["Doctor_image"]["name"]);
        $_SESSION['success']="Doctor Data is Updated";
        header('location: view-doctors.php');
    }
    else{
        $_SESSION['status']="Doctor Data is Not Updated";
        header('location: view-doctors.php');
    }
}

//ADD Patient
if(isset($_POST['save_patient'])){
    $name=$_POST['patient_name'];
    $email=$_POST['patient_email'];
    $password=$_POST['patient_password'];
    $tele=$_POST['patient_teleNO'];
    $BD=$_POST['patient_BD'];




        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
    $query2="INSERT INTO regestration ( `username`, `password`, `level`,`email`) VALUES ('".$name."', '".$password."','0', '".$email."');";
    $res=$db->query($query2);
        $query1="INSERT INTO patient ( `Name`, `TeleNO`, `BirthDate`) VALUES ('".$name."', '".$tele."', '".$BD."');";
        $res=$db->query($query1);


        if($res){

            $_SESSION['success']="Patient Added";
            header('location: view-patients.php');
        }
        else{
            $_SESSION['status']="Patient Not Added";
            header('location: view-patient.php');
        }

}

////////////////delete patient
if(isset($_POST['patient_delete_btn'])){
    $id=$_POST['patient_delete_id'];
    $name=$_POST['patient_delete_name'];

    @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
    $query="DELETE  FROM regestration WHERE username='$name' ";
    $res=$db->query($query);
    $query1="DELETE  FROM patient WHERE ID='$id' ";
    $res=$db->query($query1);



    if($res){
        $_SESSION['success']="Patient Data is Deleted";
        header('location: view-patients.php');
    }
    else{
        $_SESSION['status']="Patient Data is Not Deleted";
        header('location: view-patients.php');
    }

}

//////////////////edit patient data

if(isset($_POST['patient_update_btn'])){
    $edit_id=$_POST['pt_edit_id'];
    $edit_na=$_POST['pt_edit_name'];
    $edit_name=$_POST['edit_nam'];
    $edit_email=$_POST['edit_Email'];
    $edit_pt=$_POST['edit_Password'];
    $edit_telno=$_POST['edit_TeleNO'];
    $edit_bd=$_POST['edit_BirthDate'];


    @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
   /* $query="DELETE  FROM regestration WHERE username='$edit_na' ";
    $res=$db->query($query);*/
    $query1="DELETE  FROM patient WHERE ID='$edit_id' ";
    $res=$db->query($query1);
    $query="UPDATE regestration SET  username='$edit_name', password='$edit_pt', email='$edit_email' WHERE username='$edit_na'";
    $res=$db->query($query);

    $query1="INSERT INTO patient ( `Name`, `TeleNO`, `BirthDate`) VALUES ('".$edit_name."', '".$edit_telno."', '".$edit_bd."');";
    $res=$db->query($query1);



    if($res){
        $_SESSION['success']="Patient Data is Updated";
        header('location: view-patients.php');
    }
    else{
        $_SESSION['status']="Patient Data is Not Updated";
        header('location: view-patients.php');
    }
}


///////////////contactus
/*if(isset($_POST['send_op'])){
    $usern=$_POST['name'];
    $em=$_POST['email'];
    $ph=$_POST['phone'];
    $msg=$_POST['message'];

    if(($usern='Username') || ($em='Email' )|| ($ph='Subject') || ($ms='Message') ){
        header('location: contactus/contact.php?error');
    }
    else{
        $query1="INSERT INTO contactus ( `Name`, `Emal`, `message`) VALUES ('".$usern."', '".$em."', '".$msg."');";
        $res=$db->query($query1);
        $to="s11925044@stu.najah.edu";
        mail($to,$ph,$msg,$em);
        if(mail($to,$ph,$msg,$em)){
             header("ind.php?success");
        }
    }
}
else{
    header("location:ind.php");
}*/







////////////edit appo
if(isset($_POST['appo_update_btn'])){
    $edit_id=$_POST['appo_edit_id'];

    $edit_st=$_POST['appo_edit_startTime'];
    $edit_et=$_POST['appo_edit_endTime'];
    $ch=$_POST['choose'];
    if($ch=="accept"){
        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');


        $query1="UPDATE appointment SET  startAppoTime='$edit_st', EndAppoTime='$edit_et',State='accept' WHERE ID='$edit_id'";
        $res=$db->query($query1);
        header('location: view-appointment.php');

    }
    else{
        @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');


        $query1="DELETE  FROM appointment  WHERE ID='$edit_id'";
        $res=$db->query($query1);
        header('location: view-appointment.php');
    }






    if($res){

        $_SESSION['success']="Doctor Data is Updated";
        header('location: view-appointment.php');
    }
    else{
        $_SESSION['status']="Doctor Data is Not Updated";
        header('location: view-appointment.php');
    }
}
?>


