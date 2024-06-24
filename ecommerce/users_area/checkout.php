<!-- for connecting file -->
<?php
include('../includes/connect.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce website-Checkout page</title>
    
    <!-- css bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- css file -->
     <link rel="stylesheet" href="style.css">
     <style>
      .logo{
        width: 6%;
        height: 7%;
      }
     </style>
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">


        <!-- first child  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-info">
  <div class="container-fluid">
    <img src="../images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
       
      </ul>
      
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-dark" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-dark " name="search_data_product">
      </form>
    </div>
  </div>
</nav>



<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-body-secondary">
  <ul class="nav-navbar me-auto">
  <?php
         if(!isset( $_SESSION['username'])){
          echo"<li class='nav-item'>
          <a calss='nav-link' href='#'>Welcome Guest</a>
          </li>";
        }else{
          echo"<li class='nav-item'>
          <a calss='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
        }
        if(!isset($_SESSION['username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }

    ?>
       
  </ul>
</nav>


<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">Store</h3>
</div>


<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-12">

    <!-- Products -->

    <div class="row">
      <?php
      if(!isset($_SESSION['username'])){
        include('user_login.php');
      }else{
        include('payment.php');
      }
      ?>
<!-- row end -->
</div> 
<!-- column end -->
  </div>
</div>

  

<!-- last child -->
<!-- include footer -->
<?php 
include("../includes/footer.php");
?>
    </div>
  
    <!-- js bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>

  </body>
</html>