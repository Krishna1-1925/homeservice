<?php 

include('dbconnect.php');
session_start();
if(!isset($_SESSION['is_login'])){
 if(isset($_REQUEST['rEmail'])) {
$rEmail =mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPassword =mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));
$sql = "SELECT r_Email, r_Password FROM registration WHERE r_Email = '".$rEmail."' AND r_Password = '".$rPassword."' limit 1";

  $result = $conn ->query($sql);
  if($result->num_rows == 1){
    $_SESSION['is_login']=true;
    $_SESSION['rEmail']=$rEmail;
  echo "<script> location.href='submitreq.php';</script>";
  } else{
    $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
  }
}
}
else{
    echo "<script> location.href='requestprofile.php';</script>";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- bootstrap jquery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <!-- pooper cdn -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <script src="https://kit.fontawesome.com/f8daa07b16.js" crossorigin="anonymous"></script>


<style>
    .custom-margin{
        margin-top: 8vh;
    }
    body{
        background: ghostwhite;
    }
    .row .form{
        background: darkgray;
    }
</style>

    <title>Home Service - Login</title>
</head>
<body> 
      <!-- start navigation -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark pl-5 fixed-top">
        <a href="index.php" class="navbar-brand"><img src="img/logo.jpg" alt="" style=" width:50px; height:50px;"> Home-<span class="color_titel">Service </span></a>
        <!-- <span class="text">Customer's Happiness is our Main Goal</span> -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav" >
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="service.php" class="nav-link">Services</a></li>
                <!-- <li class="nav-item"><a href="userregister.php" class="nav-link">Registration</a></li> -->
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li> 
            </ul>
        </div>
     </nav>
    <!-- end navigation -->
 <br><br>
<div class="mb-3 mt-5 text-center" style="font-size:30px;">
   <!-- <i class="fas fa-stethoscope"></i> -->
    <span>Online-Service-Management System</span>

</div>
<p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-dark"></i> &nbsp; LOGIN</p>
<div class="container-fluid">
    <div class="row justify-content-center custom-margin">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4 form" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="rEmail">
                    <small class="form-text ">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="rPassword">
                </div>
                <button type="submit" class="btn btn-outline-dark mt-3 font-weight-bold btn-block shadow-sm">Login</button>
                <button type="submit" class="btn btn-dark mt-5 btn-block shadow-sm font-weight-bold">Forget Password</button>
                <?php 
                if(isset($msg)) {echo $msg;}
                ?>
            </form>
            <div class="text-center"><a href="userregister.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">I don't have an account</a></div>
        </div>
    </div>

</div>

</body>
</html>