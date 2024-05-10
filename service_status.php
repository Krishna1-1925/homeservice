<?php
include('dbconnect.php');

session_start();
if(isset($_SESSION['is_admin_login'])){
    $aEmail = $_SESSION['aEmail'];
}
else{
    echo "<script>location.href='admin_login.php'</script>";
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
<title>HomeService-service status</title>
</head>
<body><nav class="navbar navbar-dark fied-top bg-dark flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="requestprofile.php"> Home Service</a></nav>

   <div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 d-print-none ">
            <div class="sidebar sticky">
                <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="requestprofile.php"><i class="fas fa-user"></i>&nbsp;Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="submitreq.php"><i class="fab fa-accessible-icon"></i>&nbsp;Submit Request</a></li>
                    <li class="nav-item"><a class="nav-link" href="service_status.php"><i class="fas fa-align-center"></i>&nbsp;Service Status <ion-icon name="arrow-forward-outline"></ion-icon></a></li>
                    <li class="nav-item"><a class="nav-link" href="changepas.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>          
                </ul>
            </div>
        </nav>
        <div class="col-sm-6 mt-5 mx-3">
        <form action="" method="POST" class="form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Request ID:</label>
            <input type="number" class="form-control" name="checkid" id="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
        </form>
        
        <?php
        if(isset($_REQUEST['checkid']))
        {
            if($_REQUEST['checkid'] == "")
            {
                $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
            }
            else{
                    $re_id=$_REQUEST['checkid'];
                    $sql ="SELECT * FROM assignwork where request_id =$re_id ";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
if(isset($row['request_id'])  == $re_id){
?>
<h3 class="text-center mt-5">Assigned Work Details</h3>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['request_id'])) {echo $row['request_id'];}  ?></td>
        </tr>
        <tr>
            <td>Request Info</td>
            <td><?php if(isset($row['request_info'])) {echo $row['request_info'];}  ?></td>
        </tr>
        <tr>
            <td>Request Desc</td>
            <td><?php if(isset($row['request_desc'])) {echo $row['request_desc'];}  ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php if(isset($row['request_name'])) {echo $row['request_name'];}  ?></td>
        </tr>
        <tr>
            <td>Address Line 1</td>
            <td><?php if(isset($row['request_add1'])) {echo $row['request_add1'];}  ?></td>
        </tr>
        <tr>
            <td>Address line 2</td>
            <td><?php if(isset($row['request_add2'])) {echo $row['request_add2'];}  ?></td>
        </tr>
        <tr>
            <td>City</td>
            <td><?php if(isset($row['request_city'])) {echo $row['request_city'];}  ?></td>
        </tr>
        <tr>
            <td>State</td>
            <td><?php if(isset($row['request_state'])) {echo $row['request_state'];}  ?></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><?php if(isset($row['request_zip'])) {echo $row['request_zip'];}  ?></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><?php if(isset($row['request_mobile'])) {echo $row['request_mobile'];}  ?></td>
        </tr>
        <tr>
            <td>Technician Name</td>
            <td><?php if(isset($row['assign_tech'])) {echo $row['assign_tech'];}  ?></td>
        </tr>
        <tr>
            <td>Assigned Date</td>
            <td><?php if(isset($row['assign_date'])) {echo $row['assign_date'];}  ?></td>
        </tr>
        <tr>
            <td>Payment</td>
            <td><?php if(isset($row['request_payment'])) {echo $row['request_payment'];}  ?></td>
        </tr>
        <tr>
            <td>Customer Sign</td>
            <td></td>
        </tr>
        <tr>
            <td>Technician Sign</td>
            <td></td>
        </tr>
    </tbody>

</table>
<div class="text-center">
    <form action="" class="mb-3 d-print-none">
        <input class="btn btn-danger" type="submit" value="Print"onClick="window.print()">
        <input class="btn btn-secondary" type="submit" value="Close">

    </form>
</div>
<?php }else{
   echo '<div class="alert alert-info mt-4">Your request is Still Pending</div>';
}
    }
}?>
<?php
if(isset($msg)) {echo $msg;}

?>
</div>
</div>
</div>
</body>
</html>