<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow: hidden;
    }
</style>
</head>
<body>
    <div class="container-fluid m-2">
        <h2 class="text-center text-primary m-4">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../Admin area/product images/login.avif" alt="Admin Registration"
                class="img-fluid">
            </div>
            <div class="col-lg-5 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Name" class="form-control"
                         required="required">
                        </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control"
                         required="required">

                   <div>
                    <input type="submit" class="bg-primary-subtle py-1 px-1 border-1 mt-3" name="admin_login" value="Login">
                    <p class="medium fw-bold mt-1 pt-1">Don't have an account ? <a href="admin_registration.php" class="link-danger">
                             Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>