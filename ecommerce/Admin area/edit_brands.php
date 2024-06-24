<?php
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];
    // echo $edit_brands;

    $get_brands="Select * from brands where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    // echo $brand_title;
}

if(isset($_POST['edit_brands'])){
    $brand_title=$_POST['brand_title'];

    $update_query="Update brands set brand_title='$brand_title' where brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand);
    echo "<script>alert('Brand updated successfully')</script>";
    echo "<script>window.open('./view_brands.php','_self')</script>";

}

?>

<div class="container mt-3">
    <h3 class="text-center">Edit Brand</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-3 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required"
            value="<?php echo $brand_title; ?>">
        </div>
        <input type="submit" name="edit_brands" id="" value="Update brand" class="btn btn-secondary px-2 mb-3">
    </form>
</div>