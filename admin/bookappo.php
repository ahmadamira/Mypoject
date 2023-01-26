<?php
if(isset($_POST['save']) ){
    $v1=$_POST['name'];
    $v2=$_POST['doctorname'];


    $v5=$_POST['Service'];
    $v6=$_POST['adate'];


    $v9=$_POST['msg'];


    $db=new mysqli('localhost','clinic','123456','clinic');
    $query="SELECT * FROM doctor WHERE Name='$v2'";
    $rs=$db->query($query);
    $name=mysqli_fetch_array($rs);
    $na=$name['ID'];
//$qry="INSERT INTO appointment (name, doctorname, dob, gender, service, ad, email, contactnum, msg) VALUES ('efdefe', 'efefef', '', 'ffbf', 'grgrg', '2022-05-10', 'rgrgrgeg', '0597089024', 'rgrg')";

    $qry="INSERT INTO appointment (PatientName, DoctorName, DepartmentName, AppDate, msg,DID) VALUES ('".$v1."', '".$v2."',   '".$v5."', '".$v6."', '".$v9."','".$na."');";
    $rs=$db->query($qry);
header('location: patiento.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
        href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
        rel="stylesheet"
    />
</head>
<body class=" bg-info ">

<container>
    <section id="book-appointment" class="p-5 bg-info text-dark">
        <div class="card">
            <div class="card-header bg-dark text-light">
                <h2 class="card-title">Book An Appointment</h2>
            </div>
            <div class="card-body">
                <form method="post" action="bookappo.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Name" name="name" required id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctorname">Doctor Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Doctor name" id="doctorname" name="doctorname"required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="dob">Date Of Birth: <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" name="gender" class="form-control">
                                    <option value="gender">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select></div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="service">Service <span class="text-danger">*</span></label>
                                <select name="Service" class="form-control" id="service" required>
                                    <option value="">Service</option>
                                    <option value="dental">Dental Checkup</option>
                                    <option value="body">Blood Checkup</option>
                                    <option value="heart">Vaccination Checkup</option>
                                    <option value="ent">ENT Checkup</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="date">Appointment Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="adate" name="adate" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Contact Number:</label>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="symptoms">Tell Us About Your Problems:</label>
                                <textarea cols="3" rows="3" id="symptoms" class="form-control" name="msg"   placeholder="Tell us about problems you are facing"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ml-auto">
                        <button type="submit" class="btn btn-outline-success mr-1" name="save">Submit</button>
                      <a href="patiento.php" class="btn btn-outline-danger"> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

</container>
</body>
<script>
    mapboxgl.accessToken =
        'pk.eyJ1IjoiYnRyYXZlcnN5IiwiYSI6ImNrbmh0dXF1NzBtbnMyb3MzcTBpaG10eXcifQ.h5ZyYCglnMdOLAGGiL1Auw'
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [35.23632435549473, 32.233609039094944],
        zoom: 18,
    })
</script>
</html>