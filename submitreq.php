<?php

include('dbconnect.php');

session_start();
if($_SESSION['is_login'])
{
    $rEmail =$_SESSION['rEmail'];
}
else{
    echo "<script> location.href='login.php'</script>";
}

if(isset($_REQUEST['submitrequest'])){
    // chaking for empty fields
    if(($_REQUEST['requestinfo'] == "" ) || ($_REQUEST['requestdesc'] == "" ) || 
    ($_REQUEST['requestname'] == "" ) ||  ($_REQUEST['requestadd1'] == "" ) ||  
    ($_REQUEST['requestadd2'] == "" ) ||  ($_REQUEST['requestcity'] == "" ) || 
    ($_REQUEST['requeststate'] == "" ) ||  ($_REQUEST['requestzip'] == "" ) ||
    ($_REQUEST['requestemail'] == "" ) ||  ($_REQUEST['requestmobile'] == "" ) ||  
    ($_REQUEST['requestdate'] == "" )
    ){
        $regmsg  = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'> All Fields are Required </div>";
    } else{
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestname'];
        $radd1 = $_REQUEST['requestadd1'];
        $radd2 = $_REQUEST['requestadd2'];
        $rcity = $_REQUEST['requestcity'];
        $rstate = $_REQUEST['requeststate'];
        $rzip = $_REQUEST['requestzip'];
        $remail = $_REQUEST['requestemail'];
        $rmobile = $_REQUEST['requestmobile'];
        $rdate = $_REQUEST['requestdate'];

        $sql ="INSERT INTO submitrequest(request_info,request_desc,request_name,request_add1,request_add2
        ,request_city,request_state,request_zip,request_email,request_mobile,request_date	
        ) VAlUES('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate')";

if($conn ->query($sql) == TRUE)
{
    $genid = mysqli_insert_id($conn);
   $regmsg = '<div class="alert alert-success mt-2 text-center" role="alert" >Register Successfully</div>';
   $_SESSION['myid'] = $genid;
   echo "<script> location.href='successreq.php'</script>";
}
else{
   $regmsg = '<div class="alert alert-danger mt-2 text-center" role="alert" >Unable Register</div>';   
    }
  }
}
?>





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

<title>HomeService-Register</title>
</head>
<body>
<nav class="navbar navbar-dark fied-top bg-dark flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="requestprofile.php"> Home Service</a></nav>
   <div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 ">
            <div class="sidebar sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="requestprofile.php"><i class="fas fa-user"></i>&nbsp;Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="submitreq.php"><i class="fab fa-accessible-icon"></i>&nbsp;Submit Request <ion-icon name="arrow-forward-outline"></ion-icon></a></li>
                    <li class="nav-item"><a class="nav-link" href="service_status.php"><i class="fas fa-align-center"></i>&nbsp;Service Status</a></li>
                    <li class="nav-item"><a class="nav-link" href="changepas.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>          
                </ul>
            </div>
        </nav>
        <div class="col-sm-9 col-md-10 mt-5">
           <form action="" method="POST" class="mx-5">
            <div class="form-group">
                <label for="inputRequest">Request Info</label>
                <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request info" name="requestinfo" required>
            </div>
            <div class="form-group">
                <label for="inputRequestDescription">Description</label>
                <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" required>
            </div>
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="requestname" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="House No.123" name="requestadd1" required>
                </div>

                <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="ABC Colony" name="requestadd2" required>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputcity">City</label>
                <input type="text" class="form-control" id="inputCity" name="requestcity" required>
                </div>

                <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" name="requeststate" required>
                </div>

                <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="number" class="form-control" id="inputZip" name="requestzip" onkeypress="isInputNumber(event)" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="requestemail" required>
                </div>

                <div class="form-group col-md-2">
                <label for="inputMobile">Mobile</label>
                <input type="number" class="form-control" id="inputMobile" name="requestmobile" onkeypress="isInputNumber(event)" required>
                </div>

                <div class="form-group col-md-2">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="requestdate" required>
                </div>
            </div>
            <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
           </form>
           <?php 
            if(isset($regmsg)){echo $regmsg;}
           ?>

        </div>
    </div>
</div>
<script>
    function isInputNumber(evt){
       var ch = String.formCharCode(evt.which);
       if(!(/[0-9]/.test(ch)))
       {
            evt.preventDefault();
       }
    }
</script>  
</body>
</html>