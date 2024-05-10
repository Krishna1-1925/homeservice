<?php
 
include('dbconnect.php');

// session_start();
// if(isset($_SESSION['is_admin_login'])){
//     $aEmail = $_SESSION['aEmail'];
// }
// else{
//     echo "<script>location.href='admin_login.php'</script>";
// }
if(isset($_REQUEST['psubmit']))
{
    if(($_REQUEST['cname'] == "" )||($_REQUEST['cadd'] == "" )||($_REQUEST['pname'] == "" )|| ($_REQUEST['pquantity'] == "" ||
    ($_REQUEST['psellingcost'] == "" )||($_REQUEST['totalcost'] == "" )||($_REQUEST['selldate'] == "" ) )){
             $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds </div>';
        
    }
    else{
            $pid =$_REQUEST['pid'];
            $pava =$_REQUEST['pava']-$_REQUEST['pquantity'];      
            $custname = $_REQUEST['cname'];           
            $custadd = $_REQUEST['cadd'];
            $cpname = $_REQUEST['pname'];
            $cpquantity = $_REQUEST['pquantity'];
            $cpeach = $_REQUEST['psellingcost'];
            $cptotal = $_REQUEST['totalcost'];
            $cpdate = $_REQUEST['selldate'];


            $sql ="INSERT INTO customer_tb(custname,custadd,cpname,cpquantity,cpeach,cptotal,cpdate)
            VALUES('$custname','$custadd','$cpname','$cpquantity','$cpeach','$cptotal','$cpdate')";

            if($conn->query($sql) == TRUE){
           $genid = mysqli_insert_id($conn);
           session_start();
           $_SESSION['myid'] = $genid;
           echo "<script>location.href='productsellsuccess.php'</script>";
        }

        $sqlup = "UPDATE assets_id SET pava = '$pava' WHERE pid = '$pid'"; 
        $conn->query($sqlup);        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <title>HomeService-sell Product</title>
</head>
<body>
<nav class="navbar navbar-dark fied-top bg-danger flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="requestprofile.php">Home Service</a></nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 ">
            <div class="sidebar sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="work.php"><i class="fab fa-accessible-icon"></i>&nbsp;Work Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="req.php"><i class="fas fa-align-center"></i>&nbsp;Request </a></li>
                    <li class="nav-item"><a class="nav-link" href="assets.php"><i class="fas fa-list"></i>&nbsp;Assets</a></li>
                    <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fa-brands fa-hire-a-helper"></i>&nbsp;Technician</a></li>
                    <li class="nav-item"><a class="nav-link" href="rquester.php"><i class="fas fa-user"></i>&nbsp;Rquester</a></li>
                    <li class="nav-item"><a class="nav-link" href="sellreport.php"><i class="fa-solid fa-thumbtack"></i>&nbsp;Sell Report</a></li>
                    <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>&nbsp;Work Report</a></li>
                    <li class="nav-item"><a class="nav-link" href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>               
                </ul>
            </div>
        </nav>
        <div class="col-sm-6 mt-5 mx-3 jumbotron">
            <h3 class="text-center">Customer Bill</h3>
            <?php
                if(isset($_REQUEST['id']))
                {
                    $sql ="SELECT * FROM  assets_id WHERE pid ={$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }            
            ?>


        <form action="<?php $_SELF_PHP ?>" method="POST">
     <div class="form-group">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" name="pid" id="pid" Value="<?php if(isset($row['pid'])) { echo $row['pid'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cname"> Customer Name</label>
            <input type="text" class="form-control" name="cname" id="cname">
        </div>
        <div class="form-group">
            <label for="cadd">Customer Address </label>
            <input type="text" class="form-control" name="cadd" id="cadd">
        </div>       
     <div class="form-group">
            <label for="pname"> Product Name</label>
            <input type="text" class="form-control" name="pname" id="pname" Value="<?php if(isset($row['pname'])) { echo $row['pname'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pava">Available</label>
            <input type="number" class="form-control" name="pava" id="pava" Value="<?php if(isset($row['pava'])) { echo $row['pava'];} ?>" readonly>
        </div>
     

        <div class="form-group">
            <label for="pquantity">Quantity</label>
            <input type="number" class="form-control" name="pquantity" id="pquantity">
        </div>

        <div class="form-group">
            <label for="psellingcost">Price Each </label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost" Value="<?php if(isset($row['psellingcost'])) { echo $row['psellingcost'];} ?>" readonly>
        </div>

        <div class="form-group">
            <label for="totalcost">Total Price</label>
            <input type="number" class="form-control" name="totalcost" id="totalcost">
        </div>
        
        <div class="form-group">
            <label for="inputDate">date</label>
            <input type="date" class="form-control" name="selldate" id="inputDate">
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
            <a href="assets.php" class="btn btn-secondary">Close</a>
        </div>
       <?php if(isset($msg)) {echo $msg;} ?>
     </form>
</div>  
</div>
</body>
</html>  
