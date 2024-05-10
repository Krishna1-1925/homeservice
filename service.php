<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<title>Home Service</title>
<style>
    body{
        background: ghostwhite;
    }
</style>
</head>
<body>
    <!-- start navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-5 fixed-top">
  <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt="" style="width:50px;height:50px;">Home- <span style="color:coral">Service</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myMenu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="myMenu">
    <ul class="navbar-nav pl-5 custom-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="service.php">Services </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="login.php">Login </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="contactus.php">Contact us </a>
      </li>
    </ul>
  </div>
</nav>

    <!-- start service section -->

    <div class="container text-center border-bottom " style="margin-top: 80px;" >
      <h2>our services</h2>
      <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="electronic.php"><img src="img/electric-1.jpg" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Electrician</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="plumbing.php"><img src="img/plumber-1.jpg" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Plumbing</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="pest.php"><img src="img/psc.jfif" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Pest-Control</h4> 
            </div>
            <div class="col-sm-4 mb-4">
                <a href="painter.php"><img src="img/hero.jpg" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Painter</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="carpanter.php"><img src="img/carpanter.jpg" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Carpanter</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="cleaning.php"><img src="img/cl1.jpg" alt="" style="width: 200px; height: 150px;"></a>
                <h4 class="mt-4">Cleaning</h4>
            </div>
      </div>
    </div>

    <!-- start footer  -->

    <footer class="container-fluid bg-dark mt-5 text-white">
      <div class="container">
        <div class="row py-3">
          <div class="col md-6">
          <span class="pr-2">Follow Us : </span>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google"></i></a>
          </div>
          <div class="col-md-6 text-right">
                <small>Designed By homeservice &copy; 2022</small>
                <small class="ml-2"><a href="admin_login.php">Admin Login</a></small>

            </div>
        </div>
      </div>
    </footer>
</body>
</html>