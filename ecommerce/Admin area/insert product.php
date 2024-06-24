<?php
include("../includes/connect.php"); 
if(isset($_POST['insert_product'])){
    
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

   //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];

    // accessing image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' 
    or $product_price=='' or $product_image1=='' or $product_image2==''){

        echo"<script>alert('Please fill all the available fields')</script>";
        exit();
     } else{
        move_uploaded_file($temp_image1,"./product images/$product_image1");
        move_uploaded_file($temp_image2,"./product images/$product_image2");

        //insert query
        $insert_product="insert into product (product_title,product_description,product_keywords,category_id,brand_id,
        product_image_1,product_image_2,product_price,date,status) values('$product_title','$description',
        '$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_price',
        NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Successfully inserted the products') </script>";
        }
     }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products admin-Dashboard</title>

     <!-- bootstrap css link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file link -->
    <link rel="stylesheet" href="../style.css" class="css">

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
      
        <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- title -->
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->

           <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="description" id="product_description" class="form-control"
                 placeholder="Enter product description" autocomplete="off" required="required">
            </div>
 
            <!-- keyword -->

            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            
            <div class="form-outline mb-3 w-50 m-auto ">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_query="select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";

                }
             ?>
                    <!-- <option value="">category 1</option>
                    <option value="">category 2</option>
                    <option value="">category 3</option>
                    <option value="">category 4</option>
                    <option value="">category 5</option> -->
                </select>
            </div>

              <!-- Brands -->
            
              <div class="form-outline mb-3 w-50 m-auto ">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a brand</option>

                    <?php
                    $select_query="select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";

                }
             ?>
                    <!-- <option value="">brand 1</option>
                    <option value="">brand 2</option>
                    <option value="">brand 3</option>
                    <option value="">brand 4</option>
                    <option value="">brand 5</option> -->
                </select>
            </div>

              <!-- image 1 -->
            
              <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_image" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" 
                required="required">
            </div>
            <!-- image 2 -->
            
            <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_image" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" 
                required="required">
            </div>
 
            <!-- price  -->
            
              <div class="form-outline mb-3 w-50 m-auto ">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" 
                placeholder="Enter price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-3 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-secondary mb-3 px-2" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>