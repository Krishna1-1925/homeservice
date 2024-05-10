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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- bootstrap jquery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <!-- pooper cdn -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <script src="https://kit.fontawesome.com/f8daa07b16.js" crossorigin="anonymous"></script>
    <title>HomeService-Technician</title>
</head>
<body>
<nav class="navbar navbar-dark fied-top bg-dark flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="requestprofile.php">Home Service</a></nav>

   <!-- side bar 1st col -->
   <div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 bg-light sidebar py-5 ">
            <div class="sidebar sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="work.php"><i class="fab fa-accessible-icon"></i>&nbsp;Work Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="req.php"><i class="fas fa-align-center"></i>&nbsp;Request </a></li>
                    <li class="nav-item"><a class="nav-link" href="assets.php"><i class="fas fa-list"></i>&nbsp;Assets</a></li>
                    <li class="nav-item"><a class="nav-link" href="technician.php"><i class="fa-brands fa-hire-a-helper"></i>&nbsp;Technician <ion-icon name="arrow-forward-outline"></ion-icon></a></li>
                    <li class="nav-item"><a class="nav-link" href="rquester.php"><i class="fas fa-user"></i>&nbsp;Rquester</a></li>
                    <li class="nav-item"><a class="nav-link" href="sellreport.php"><i class="fa-solid fa-thumbtack"></i>&nbsp;Sell Report</a></li>
                    <li class="nav-item"><a class="nav-link" href="workreport.php"><i class="fas fa-table"></i>&nbsp;Work Report</a></li>
                    <li class="nav-item"><a class="nav-link" href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>               
                </ul>
            </div>
        </nav>
        
        <!--start 2nd column  -->
     <div class="col-sm-9 col-md-10 mt-5 text-center">
        <p class="bg-dark text-white p-2">List of Technician</p>
    <?php
    $sql ="SELECT * FROM technician_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table">';
        echo '<thead>';

        echo '<tr>';
        echo '<th scope="col">Emp ID</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Mobile</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row =$result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row["empid"].'</td>';
            echo '<td>'.$row["empName"].'</td>';
            echo '<td>'.$row["empCity"].'</td>';
            echo '<td>'.$row["empMobile"].'</td>';
            echo '<td>'.$row["empEmail"].'</td>';

            echo '<td>';
             
            echo '<form action="edittemp.php" class="d-inline" method="POST">';
            echo '<input type="hidden" name="id" value='.$row['empid'].'><button type="submit" 
            class="btn btn-info mr-3 name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';

            echo '<form action=""  method="POST" class="d-inline mt-2" >';
            echo '<input type="hidden" name="id" value='.$row['empid'].'><button class="btn btn-secondary d-inline" name="delete" value="Delete"
            type="submit"><i class="far fa-trash-alt"></i></button>';       
           echo '</form>';
            echo '</td>';


            echo '</tr>';
            
        }
        echo '</tbody>';


        echo '</table>';

    }else{
        echo 'o Results';
    }
    
           
    if(isset($_REQUEST['delete'])){
        $sql ="DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
        if($conn->query($sql)==TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else{
            echo "Unable to Delete";
        }
     }
    ?>
</div>

        </div>

        <div class="float-right"><a href="inserttemp.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>

   </div>  



</body>
</html>