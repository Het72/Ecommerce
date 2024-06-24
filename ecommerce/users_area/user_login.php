<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_login</title>
     <!-- css bootstrap link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

<style>
body{
    overflow-x: hidden;
}

</style>
    </head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off"
                        required="required" name="user_username">
                    </div>
                    <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off"
                        required="required" name="user_password">
                    </div>
                    <div class="mt-3 pt-2">
                        <input type="submit" value="Login" class="text-dark bg-muted px-3 py-2 border-0" name="user_login">
                        <p class="medium fw-bold mt-1 pt-1">Don't have an account ? <a href="user_registration.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="Select * from user_table where username= '$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

// cart Item 

$select_query_cart="Select * from cart where ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count>0){
    $_SESSION['username']=$user_username;
if(password_verify($user_password, $row_data['user_password'])){ 
    // echo "<script>alert('Login successful')</script>";
    if($row_count==1 and $row_count_cart==0){
        $_SESSION['username']=$user_username;
    echo "<script>alert('Login successful')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
    
    }else{
        $_SESSION['username']=$user_username;
     echo "<script>alert('Login successful')</script>";
     echo "<script>window.open('payment.php','_self')</script>";
    }
    }else{
      echo "<script>alert('Invalid Credentials')</>";
    }
}else{
    echo "<script>alert('Invalid Credentials')</script>";
}
}
?>