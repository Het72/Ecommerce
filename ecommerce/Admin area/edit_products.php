<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    // echo $edit_id;
    $get_data="Select * from product where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image_1=$row['product_image_1'];
    $product_image_2=$row['product_image_2'];
    $product_price=$row['product_price'];
    
    //fetching category name
    $select_category="Select * from categories where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    // echo $category_title;


    //fetching brand name
    $select_brand="Select * from brands where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
//     echo $brand_title;
}

?>

<div class="contanier mt-5">
    <h2 class="text-center">Edit Products</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title; ?>"
            required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" value="<?php echo $product_description; ?>"
            class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" value="<?php echo $product_keywords; ?>"
            class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
        <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>

                <?php
                 $select_category_all="Select * from categories";
                 $result_category_all=mysqli_query($con,$select_category_all);
                 while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                 }

        ?>
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
        <label for="product_brands" class="form-label">Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php
                $select_brand_all="Select * from brands";
                $result_brand_all=mysqli_query($con,$select_brand_all);
                while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                   $brand_title=$row_brand_all['brand_title'];
                   $brand_id=$row_brand_all['brand_id'];
                   echo "<option value='$brand_id'>$brand_title</option>";
                }

?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image_1" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" name="product_image_1" id="product_image_1"  class="form-control w-80 m-aut0" required="required">
                <img src="./product images/<?php echo $product_image_1; ?>" alt="" class="p_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image_2" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" name="product_image_2" id="product_image_2" class="form-control w-80 m-aut0" required="required">
                <img src="./product images/<?php echo $product_image_2; ?>" alt="" class="p_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price; ?>"
             required="required">
        </div>
        <div class="w-50 m-auto ">
            <input type="submit" name="edit_products" value="Update Product" class="btn btn-secondary px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->
<?php 
if(isset($_POST['edit_products'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    
    $product_image_1=$_FILES['product_image_1']['name'];
    $product_image_2=$_FILES['product_image_2']['name'];

    $temp_image_1=$_FILES['product_image_1']['tmp_name'];
    $temp_image_2=$_FILES['product_image_2']['tmp_name'];


    //checking field empty or not
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands==''
    or $product_image_1=='' or $product_image_2=='' or $product_price==''){
        echo "<script>alert('Please fill all the details and continue')</script>";
    }else{
    move_uploaded_file($temp_image_1,"./product images/$product_image_1");
    move_uploaded_file($temp_image_2,"./product images/$product_image_2");

    //query to update products
    $update_products="Update product Set product_title='$product_title',product_description='$product_description',
    product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brands',
    product_image_1='$product_image_1',product_image_2='$product_image_2',product_price='$product_price',date=NOW()
    where product_id=$edit_id";
    $result_update=mysqli_query($con,$update_products);
    if ($result_update){
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./insert product.php','_self')</script>";
    }
    }

}

?>