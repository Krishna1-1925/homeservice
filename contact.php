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
    <title>Document</title>
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
        <a class="nav-link" href="contact.php">Contact us </a>
      </li>
    </ul>
  </div>
</nav>
<br><br>

<!-- start contact -->
<div class="container mt-5" id="contact" >
<h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <div class="col-md-8">
        <br>
        <form action="" class="shadow-lg p-4" method="POST"style="background: darkgrey; border-radius:5px;">
        <input type="text" class="form-control" name="name" placeholder="Name"><br>
        <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
        <input type="text" class="form-control" name="email" placeholder="Email"><br>
        <textarea name="message" class="form-control" placeholder="How can we help you ?" id="" cols="30" rows="5"></textarea><br>
        <input type="submit" value="Send" class="btn btn-primary" name="submit">
        <input type="submit" value="Back" class="btn btn-primary" name="submit">
        <br><br>
        </form>
    </div>

    <div class="col-md-4 text-center">
    <strong>HeadQuarter:</strong><br>
        Home Service Pvt Ltd ,<br>
        Maninagar,Ahmedabad<br>
        Gujarat -382745<br>
        Phone : +0000000000<br>
        <a href="#" target="_blank">www.homeservice.com</a><br><br><br>
    
        <strong>Branch:</strong><br>
        Home Service Pvt Ltd ,<br>
        Vatva,Ahmedabad<br>
        Gujarat -382440<br>
        Phone : +1111111111<br>
        <a href="#" target="_blank">www.homeservice.com</a><br><br><br>
    </div>
    </div>
</div>

</body>
</html>