<?php




        if(isset($_POST['nusern']) && isset($_POST['npass']) && isset($_POST['email']) ){
            $uname=$_POST['nusern'];
            $up=$_POST['npass'];
            $em=$_POST['email'];


            @$db =new mysqli('localhost', 'clinic', '123456', 'clinic');
            $qrystr="INSERT INTO regestration(`username`, `password`, `level`, `email`) VALUES ('".$uname."','".$up."','0','".$em."')";
            $f=1;

        }
        if($f==1){
            $res=$db->query($qrystr);
            header('location: login.php');

        }






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="omlo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="sign-in-signup">
        <form action="login.php" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password"  name="password" placeholder="Password">
            </div>
            <input type="submit" value="Login" class="btn">
            <p class="social-text">Or Sign in with social platform</p>
            <div class="social-media">
                <a href="https://www.facebook.com/profile.php?id=100011246431318" class="social-icon">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
        </form>

        <form class="sign-up-form" action="up.php" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="nusern" placeholder="Username">
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="npass" placeholder="Password">
            </div>
            <input type="submit" value="Sign up" class="btn">
            <p class="social-text">Or Sign in with social platform</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
        </form>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Member of Brand?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus facilis illum labore nisi tempore, veritatis.</p>
                <button class="btn" id="sign-in-btn">Sign in</button>
            </div>
            <img src="../img/logf.svg" alt="" class="image">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>New to Brand</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus facilis illum labore nisi tempore, veritatis.</p>
                <button class="btn" id="sign-up-btn">Sign up</button>
            </div>
            <img src="../img/log2.svg" alt="" class="image">
        </div>
    </div>
</div>
<script src="om.js"></script>
</body>
</html>

