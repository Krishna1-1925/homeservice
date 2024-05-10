<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <script src="https://kit.fontawesome.com/f8daa07b16.js" crossorigin="anonymous"></script>

   <!-- bootstrap link -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <title>Home Service - Register</title>
    <style>
        body{
            background: ghostwhite;
        }
    </style>
</head>
<body>
    <?php
    include ('dbconnect.php');
    if(isset($_REQUEST['rSignup']))
    {
        if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail'] == "" ) || ( $_REQUEST['rPassword'] == ""))
        {
            $regmsg = '<div class="alert alert-warning mt-2 text-center" role="alert">All Fields are Required</div>';
        }else{
            $sql1 = "SELECT r_email FROM registration WHERE r_email = '".$_REQUEST['rEmail']."'";
            $result = $conn->query($sql1);
            if($result->num_rows==1)
            {
                $regmsg = '<div class="alert alert-danger mt-2 text-center" role="alert">Email Id Already Registered</div>';
            }else{
                $rName = $_REQUEST['rName'];
                $rEmail = $_REQUEST['rEmail'];
                $rPassword = $_REQUEST['rPassword'];
                $rMobile=$_REQUEST['rMobile'];
                $rGender=$_REQUEST['rGender'];
                $rAddress=$_REQUEST['rAddress'];

                $sql =" INSERT INTO registration(r_name,r_email,r_password,r_Mobile,r_Gender,r_Address) VAlUES('$rName','$rEmail','$rPassword','$rMobile','$rGender','$rAddress')";

                 if($conn ->query($sql) == TRUE)
                 {
                    $regmsg = '<div class="alert alert-success mt-2 text-center" role="alert" >Register Successfully</div>';
                    header('Location:Login.php');
                 }else{
                    $regmsg = '<div class="alert alert-danger mt-2 text-center" role="alert" >Unable Register</div>';
                 }
            }
        }
    }
    ?>

 <!-- Start Registration Form -->

 <div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST"style="background: darkgray; border-radius:5px;">
                <div class="form-group">
                   <i class="fas fa-user"></i> <label for="" class="font-weight-bold pl-2">Name</label>
                   <input type="text" class="form-control" placeholder="Name" name="rName">                     
                </div>
                <div class="form-group">
                   <i class="fas fa-envelope"></i> <label for="" class="font-weight-bold pl-2">Email</label>
                   <input type="email" class="form-control" placeholder="Email" name="rEmail">
                   <small class="font text">We'll never share your email with anyone else</small>                     
                </div>
                <div class="form-group">
                   <i class="fas fa-home"></i> <label for="" class="font-weight-bold pl-2">Address</label>
                   <input type="text" class="form-control" placeholder="Address" name="rAddress">                     
                </div>
                <div class="form-group">
                   <i class="fas fa-phone"></i> <label for="" class="font-weight-bold pl-2">Contact No.</label>
                   <input type="number" class="form-control" placeholder="contact no" name="rMobile">                     
                </div>
                <div class="form-group">
                   <i class="fas fa-person"></i> <label for="" class="font-weight-bold pl-2">Gender :</label>&nbsp;&nbsp;
                   <input type="radio" name="rGender" value="male"> Male &nbsp;
                   <input type="radio" name="rGender" value="female"> Female &nbsp;   
                   <input type="radio" name="rGender" value="Other"> Other &nbsp;             
                </div>
                <div class="form-group">
                   <i class="fas fa-key"></i> <label for="" class="font-weight-bold pl-2">Password</label>
                   <input type="password" class="form-control" placeholder="Password" name="rPassword">                     
                </div>
                <button type="submit" class="btn btn-dark mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                <em style="font-size:10px;">Note - By clicking Sign Up , you agree to our Terms, Data Policy and Cookie Policy</em>
                <br>
           <?php 
        if(isset($regmsg)) {echo $regmsg;}
           ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>