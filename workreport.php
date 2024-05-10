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
    <title>HomeService- Sell Product</title>
</head>
<body>
<nav class="navbar navbar-dark fied-top bg-dark flex-md-nowrap p-0 shadow">
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
        <div class="col-sm-9 col-md-10 mt-5 text-center">
        <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <span> To </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
            </div>
        </div>
        </form>
        </div>

        <?php
        if(isset($_REQUEST['searchsubmit'])){
            $startdate =$_REQUEST['startdate'];
            $enddate =$_REQUEST['enddate'];
        
            $sql ="SELECT * FROM assignwork WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                echo '<p class="bg-dark text-white p-2 mt-5 text-center">  Details</p>';
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">Req ID</th>';
                echo '<th scope="col">Request Info</th>';
                echo '<th scope="col">Name</th>';
                echo '<th scope="col">Address</th>';
                echo '<th scope="col">City</th>';
                echo '<th scope="col">Mobile</th>';
                echo '<th scope="col">Technician</th>';
                echo '<th scope="col">Assigned Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row =$result->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'.$row['request_id'].'</td>';
                    echo '<td>'.$row['request_info'].'</td>';
                    echo '<td>'.$row['request_name'].'</td>';
                    echo '<td>'.$row['request_add2'].'</td>';
                    echo '<td>'.$row['request_city'].'</td>';
                    echo '<td>'.$row['request_mobile'].'</td>';
                    echo '<td>'.$row['assign_tech'].'</td>';
                    echo '<td>'.$row['assign_date'].'</td>';
                }
                echo '<tr>';
                echo '<td>';
                echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()"';
                echo '</tr>';
                echo '</td>';
                echo '</tbody>';
                echo '</table>';
            }
            else{
                echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found</div>"; 
            }
        
        }
        ?>
    </div>
</div>
</body>
</html>