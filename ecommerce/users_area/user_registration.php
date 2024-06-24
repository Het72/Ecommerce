<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-registration</title>
</head>
    <!-- css bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off"
                        required="required" name="user_username">
                    </div>
                    <!-- user email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off"
                        required="required" name="user_email">
                    </div>
                    <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off"
                        required="required" name="user_password">
                    </div>
                    <!-- confirm password -->
                    <div class="form-outline mb-4">
                        <label for="confirm_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm password" 
                        autocomplete="off" required="required" name="confirm_user_password">
                    </div>
                    <!-- user address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter address" autocomplete="off"
                        required="required" name="user_address">
                    </div>
                    <!-- user contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your number" autocomplete="off"
                        required="required" name="user_contact">
                    </div>
                    <div class="mt-3 pt-2">
                        <input type="submit" value="Register" class="text-dark bg-info px-3 py-2 border-0" name="user_register">
                        <p class="medium fw-bold mt-1 pt-1">Already have an account ? <a href="user_login.php"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_contact'];
    $user_ip=getIPAddress();

//select query
$select_query="Select * from user_table where username='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username and Email already exists')</script>";
}else if($user_password!=$confirm_user_password){
    echo "<script>alert('Password don't match')</script>";
}
else{
    //insert query
    $insert_query="insert into user_table (username,user_email,user_password,user_ip,user_address,user_mobile)
    values('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_mobile') ";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute);
 }
 //selecting cart items
 $select_from_cart="Select * from cart where ip_address='$user_ip'";
 $result_cart=mysqli_query($con,$select_from_cart);
 $rows_count=mysqli_num_rows($result_cart);
 if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
 }else{
    echo "<script>window.open('../index.php','_self')</script>";
 }
}
?>